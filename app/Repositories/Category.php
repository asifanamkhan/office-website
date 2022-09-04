<?php

namespace App\Repositories;

use App\Models\Category as Model;

class Category extends BaseRepository
{
    protected static $model = Model::class;

    protected static $rules = [
        'save' => [
            'name' => 'required|unique:categories,name,NULL,id,deleted_at,NULL',
        ],
        'update' => []
    ];


    public static function update($id, $data): array
    {
        static::$rules['update'] = [
            'name' => "required|unique:categories,name,{$id},id,deleted_at,NULL"
        ];
        return parent::update($id, $data);
    }

    public static function isActive ($data): array
    {
        static::$exactSearchFields = ['is_active'];
        return parent::search($data);
    }

}