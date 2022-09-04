<?php

namespace App\Repositories;

use Exception;
use App\Models\Portfolio as Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class Portfolio extends BaseRepository
{
    protected static $model = Model::class;
    protected static $disk = 'public';

    protected static $rules = [
        'save' => [
            'title' => 'required|unique:portfolios,title,NULL,id,deleted_at,NULL',
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
                $path = 'images/portfolios';

                if (!is_dir($path)) {
                    File::makeDirectory($path, 0777,true);
                }

                $name = uniqid('portfolio-',true) . '.' . $data['image']->getClientOriginalExtension();

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

            $portfolio = parent::save($data);

            if ($portfolio['status'] === 'success') {
                $portfolio['data']->tags()->attach($tags);
            }

            return [
                'status' => 'success',
                'data' => $portfolio
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
                'title' => "required|unique:portfolios,title,{$id},id,deleted_at,NULL",
                'category_id' => 'required',
            ];

            $tags = $data['tag_id'];
            unset($data['tag_id']);

            $portfolio = parent::update($id, $data);

            if ($portfolio['status'] === 'success') {
                $portfolio['data']->tags()->sync($tags);
            }

            return [
                'status' => 'success',
                'data' => $portfolio
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
            $portfolio = parent::delete($id);

            if ($portfolio['status'] === 'success') {
                $portfolio['data']->tags()->detach();
            }
            return [
                'status' => 'success',
                'data' => $portfolio
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
        return parent::search($data,[],'category');
    }


}
