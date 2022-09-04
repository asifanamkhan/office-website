<?php

namespace App\Repositories;

use App\Models\About as Model;

class About extends BaseRepository
{
    protected static $model = Model::class;

    public static function save($data): array
    {
        try{

            static::$rules['save'] = [
                'title' => 'required|unique:abouts,title,NULL,id,deleted_at,NULL',
            ];

            $about =  parent::save($data);

            if($about['status'] === 'success' && $data['is_active'] == 1){
                Model::query()
                    ->where('id','!=',$about['data']->id)
                    ->where('is_active','=',1)
                    ->update(['is_active' => 0]);
            }

            return [
                'status' => 'success',
                'data' => $about
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
                'title' => "required|unique:abouts,title,{$id},id,deleted_at,NULL"
            ];
            $about =  parent::update($id, $data);
            if($about['status'] === 'success' && $data['is_active'] == 1){
                
                Model::query()
                    ->where('id','!=',$id)
                    ->where('is_active','=',1)
                    ->update(['is_active' => 0]);
            }

            return [
                'status' => 'success',
                'data' => $about
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