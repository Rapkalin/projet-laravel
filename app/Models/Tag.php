<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    public function category() {
        return $this->belongsToMany('App/Models/Post', 'tag_posts');
    }

    protected $fillable = [
        'name',
        'slug',
        'description',
    ];
}
