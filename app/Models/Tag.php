<?php

namespace App\Models;

class Tag extends AbstractModel
{
    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    public function category()
    {
        return $this->belongsToMany('App\Models\Post', 'tag_post');
    }
}
