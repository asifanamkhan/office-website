<?php

namespace App\Repositories;

use App\Models\Team as Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class Team extends BaseRepository
{
    protected static $model = Model::class;
    protected static $disk = 'public';

    protected static $rules = [
        'save' => [
            'email' => 'required|email|unique:teams,email,NULL,id,deleted_at,NULL',
            'phone' => 'required|unique:teams,phone,NULL,id,deleted_at,NULL',
            'name' => 'required',
            'designation' => 'required',
        ],
        'update' => []
    ];


    public static function update($id, $data): array
    {
        static::$rules['update'] = [
            'email' => "required|email|unique:teams,email,{$id},id,deleted_at,NULL",
            'phone' => "required|unique:teams,phone,{$id},id,deleted_at,NULL",
            'name' => 'required',
            'designation' => 'required',
        ];
        return parent::update($id, $data);
    }

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
                $path = 'images/teams';

                if (!is_dir($path)) {
                    File::makeDirectory($path, 0777,true);
                }

                $name = uniqid('team-',true) . '.' . $data['image']->getClientOriginalExtension();

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

    public static function isActive ($data): array
    {
        static::$exactSearchFields = ['is_active'];
        return parent::search($data);
    }
}
