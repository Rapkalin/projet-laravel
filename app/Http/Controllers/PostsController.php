<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Log;


class PostsController extends Controller
{
    public function index()
    {
        $posts = $this->getPosts();
        return view('pages/posts/index', ['posts' => $posts]);
    }

    public function getPosts()
    {
        Log::info(
            "Post::all() call",
            [
                "Origin" => __METHOD__,
            ]
        );
        return Post::all();
    }

    public function getTags($post)
    {
        return $post->tags();
    }

    public function edit($postId)
    {
        $post = Post::find($postId);
        $listTags = Tag::all();
        $postTags = [];
        foreach ($post->tags as $tag)
        {
            $postTags[] = $tag->id;
        }

        foreach ($listTags as $tag)
        {
            $tags[] = $tag->name;
        }
        return view('pages/posts/form', ['post' => $post, 'postTags' => $postTags, 'tags' => $tags]);
    }

    public function update($postId)
    {
        $post = Post::find($postId);
        $request = Request::post();
        $post->title = $request['title'];
        $post->content = $request['content'];
        $post->save();
        return redirect('posts')->with('message', "!! The post has been updated !!");
    }

    public function delete()
    {
        //
    }
}
