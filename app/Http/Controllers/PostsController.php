<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Log;
use Request;

class PostsController extends AbstractController
{
    public function __construct()
    {
        # Dans post controller
        $this->model = Post::class;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function index()
    {
        $posts = Post::with('user')->get();

        // @todo: useless
        foreach($posts as $post) {
            $postAuthors[] = User::find($post->user_id)->name;
        }
        return view('pages/posts/index', ['posts' => $posts, 'postAuthors' => $postAuthors]);
    }

    public function edit($postId)
    {
        $post = Post::with('tags')->find($postId);
        $listAllTags = Tag::select('name', 'id')->pluck('name', 'id')->toArray();
        return view('pages/posts/form', ['post' => $post, 'listAllTags' => $listAllTags]);
    }

    public function update(int $objectId)
    {
        parent::update($objectId); // TODO: Change the autogenerated stub
        return redirect('posts')->with('message', "!! The post has been updated !!");
    }

    /*    public function update($postId)
        {
            $post = Post::find($postId);
            $request = Request::post();
            foreach ($request as $key => $value) {
                dump($request);
                dump("key:", $key);
                dump("value:", $value);
            }
            die("stop");
            $post->title = $request['title'];
            $post->content = $request['content'];
            $post->published = $request['published'];
            $post->save();
            // setAssociation() - use for the override in the controllers
            $post->tags()->sync($request['postTags']);
            return redirect('posts')->with('message', "!! The post has been updated !!");
        }*/

    public function delete()
    {
        //
    }
}
