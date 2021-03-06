<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Log;
use Request;


class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->all();
        return view('pages/posts/index', ['posts' => $posts]);
    }

    public function edit($postId)
    {
        $post = Post::with('tags')->find($postId);
        $listAllTags = Tag::select('name', 'id')->pluck('name', 'id')->toArray();
        return view('pages/posts/form', ['post' => $post, 'listAllTags' => $listAllTags]);
    }

    public function update($postId)
    {
        $post = Post::find($postId);
        $request = Request::post();
        $post->title = $request['title'];
        $post->content = $request['content'];
        $post->published = $request['published'];
        $post->save();
        // setAssociation() - use for the override in the controllers
        $post->tags()->sync($request['postTags']);
        return redirect('posts')->with('message', "!! The post has been updated !!");
    }

    public function delete()
    {
        //
    }
}
