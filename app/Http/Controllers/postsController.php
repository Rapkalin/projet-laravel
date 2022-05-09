<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostsController extends Controller
{
    public function index()
    {
        $posts = $this->getPosts();
        return view('pages/posts/index', ['posts' => $posts]);
    }

    public function getPosts()
    {
        return Post::all();
    }
}
