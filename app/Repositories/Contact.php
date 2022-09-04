<?php

namespace App\Repositories;

use App\Models\Contact as Model;

class Contact extends BaseRepository
{
    protected static $model = Model::class;

    protected static $rules = [
        'save' => [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ],
        'update' => []
    ];

    public static function update($id, $data): array
    {
        static::$rules['update'] = [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ];
        return parent::update($id, $data);
    }

    public static function isActive ($data): array
    {
        static::$exactSearchFields = ['is_active'];
        return parent::search($data);
    }
}