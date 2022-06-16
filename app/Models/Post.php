<?php

namespace App\Models;

class Post extends AbstractModel
{
    protected $fillable = [
        'title',
        'slug',
        'image',
        'content',
        'published',
        'feature',
        'user_id',
        'category_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag', 'tag_post');
    }

}
