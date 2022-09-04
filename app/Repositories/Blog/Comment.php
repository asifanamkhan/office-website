<?php

namespace App\Repositories\Blog;

use App\Models\Blog\Comment as Model;
use App\Repositories\BaseRepository;

class Comment extends BaseRepository
{
    protected static $model = Model::class;

    protected static $rules = [
        'save' => [
            'comment' => 'required',
            'post_id' => 'required',
        ],
        'update' => []
    ];


    public static function update($id, $data): array
    {
        static::$rules['update'] = [
            'comment' => 'required',
            'post_id' => 'required',
        ];
        return parent::update($id, $data);
    }
}