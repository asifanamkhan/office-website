<?php

namespace App\Repositories;

use App\Models\Newsletter as Model;

class Newsletter extends BaseRepository
{
    protected static $model = Model::class;

    protected static $rules = [
        'save' => [
            'email' => 'required|email|unique:newsletters,email,NULL,id,deleted_at,NULL',
        ],
        'update' => []
    ];


    public static function update($id, $data): array
    {
        static::$rules['update'] = [
            'email' => "required|email|unique:newsletters,email,{$id},id,deleted_at,NULL"
        ];
        return parent::update($id, $data);
    }
}