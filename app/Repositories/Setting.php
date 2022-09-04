<?php

namespace App\Repositories;

use App\Models\Setting as Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class Setting extends BaseRepository
{
    protected static $model = Model::class;
    protected static $disk = 'public';

    public static function save($data): array
    {
        try{

            static::$rules['save'] = [
                'email_1' => 'required',
                'phone_1' => 'required',
                'name' => 'required|unique:settings,name,NULL,id,deleted_at,NULL',
            ];
            $setting =  parent::save($data);

            if($setting['status'] === 'success' && $data['is_active'] == 1){

                Model::query()
                    ->where('id','!=',$setting['data']->id)
                    ->where('is_active','=',1)
                    ->update(['is_active' => 0]);
            }

            return [
                'status' => 'success',
                'data' => $setting
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
                'email_1' => "required",
                'phone_1' => "required",
                'name' => "required|unique:settings,name,{$id},id,deleted_at,NULL",
            ];
            
            $setting =  parent::update($id, $data);
            if($setting['status'] === 'success' && $data['is_active'] == 1){

                Model::query()
                    ->where('id','!=',$id)
                    ->where('is_active','=',1)
                    ->update(['is_active' => 0]);
            }

            return [
                'status' => 'success',
                'data' => $setting
            ];

        }
        catch (\Exception $ex){
            return [
                'status' => 'error',
                'data' => $ex->getMessage()
            ];
        }


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
                $path = 'images/settings';

                if (!is_dir($path)) {
                    File::makeDirectory($path, 0777,true);
                }

                $name = uniqid('setting-',true) . '.' . $data['image']->getClientOriginalExtension();

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
