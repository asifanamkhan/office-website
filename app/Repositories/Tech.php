<?php

namespace App\Repositories;

use App\Models\Tech as Model;

class Tech extends BaseRepository
{
    protected static $model = Model::class;

    protected static $rules = [
        'save' => [
            'name' => 'required|unique:teches,name,NULL,id,deleted_at,NULL',
            'skill_level' => 'required|numeric|between:0,100',
        ],
        'update' => []
    ];


    public static function update($id, $data): array
    {
        static::$rules['update'] = [
            'name' => "required|unique:teches,name,{$id},id,deleted_at,NULL",
            'skill_level' => "required|numeric|between:0,99.99"
        ];
        return parent::update($id, $data);
    }

    public static function isActive ($data): array
    {
        static::$exactSearchFields = ['is_active'];
        return parent::search($data);
    }

}