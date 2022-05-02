<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function user() {
        return $this->belongsTo('App/Models/User');
    }

    public function category() {
        return $this->belongsTo('App/Models/Category');
    }

    public function tags() {
        return $this->belongsToMany('App/Models/Tags', 'tag_posts');
    }

    protected $fillable = [
        'title',
        'slug',
        'image',
        'content',
        'published',
        'featured',
        'user_id',
        'category_id',
    ];
}
