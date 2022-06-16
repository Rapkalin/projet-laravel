<?php

namespace App\Models;

class Category extends AbstractModel
{
    protected $fillable = [
      'name',
      'slug',
      'description',
    ];

    public function post()
    {
        return $this->hasMany('App\Models\Post');
    }
}
