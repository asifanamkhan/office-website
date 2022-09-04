<?php

namespace App\Repositories\Blog;

use App\Repositories\BaseRepository;
use Exception;
use App\Models\Blog\Post as Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class Post extends BaseRepository
{
    protected static $model = Model::class;
    protected static $disk = 'public';

    protected static $rules = [
        'save' => [
            'slug' => 'required|unique:posts,slug,NULL,id,deleted_at,NULL',
            'title' => 'required',
            'category_id' => 'required',
        ],
        'update' => []
    ];


    /**
     * Upload Image.
     *
     * @param   array
     *
     * @return array
     *
     */
    public static function image($data): array
    {

        try {
            // Check validation.
            $validator = Validator::make($data, [
                'image'=> 'mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
            // If validation failed then return the error.
            if ($validator->fails()) {
                return [
                    'status' => 'error',
                    'data' => $validator->errors()->toArray(),
                ];
            }

            // Upload image
            if ($data['image']) {
                $path = 'images/posts';

                if (!is_dir($path)) {
                    File::makeDirectory($path, 0777,true);
                }

                $name = uniqid('post-',true) . '.' . $data['image']->getClientOriginalExtension();

                Storage::disk(static::$disk)->put("{$path}/{$name}", File::get($data['image']));

            }

            return [
                'status' => 'success',
                'data' => $name
            ];

        } catch (\Exception $ex) {
            return [
                'status' => 'error',
                'data' => $ex->getMessage()
            ];
        }

    }


    public static function save ($data): array
    {
        try{
            $tags = $data['tag_id'];
            unset($data['tag_id']);

            $Post = parent::save($data);

            if ($Post['status'] === 'success') {
                $Post['data']->tags()->attach($tags);
            }

            return [
                'status' => 'success',
                'data' => $Post
            ];
        }
        catch (\Exception $ex){
            return [
                'status' => 'error',
                'data' => $ex->getMessage()
            ];
        }

    }

    public static function update($id, $data): array
    {

        try{
            static::$rules['update'] = [
                'slug' => "required|unique:posts,slug,{$id},id,deleted_at,NULL",
                'title' => 'required',
                'category_id' => 'required',
            ];

            $tags = $data['tag_id'];
            unset($data['tag_id']);

            $Post = parent::update($id, $data);

            if ($Post['status'] === 'success') {
                $Post['data']->tags()->sync($tags);
            }

            return [
                'status' => 'success',
                'data' => $Post
            ];
        }
        catch (\Exception $ex){
            return [
                'status' => 'error',
                'data' => $ex->getMessage()
            ];
        }
    }

    public static function delete($id): array
    {
        try{
            $Post = parent::delete($id);

            if ($Post['status'] === 'success') {
                $Post['data']->tags()->detach();
            }
            return [
                'status' => 'success',
                'data' => $Post
            ];
        }
        catch (\Exception $ex){
            return [
                'status' => 'error',
                'data' => $ex->getMessage()
            ];
        }

    }

    public static function isActive ($data): array
    {
        static::$exactSearchFields = ['is_active'];
        return parent::search($data);
    }


}
