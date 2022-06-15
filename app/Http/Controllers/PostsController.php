<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class PostsController extends AbstractController
{
    public function __construct()
    {
        parent::__construct(Post::class);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $posts = Post::with('user')->get();

        // @todo: useless
        foreach($posts as $post) {
            $postAuthors[] = User::find($post->user_id)->name;
        }
        return view('pages/posts/index', ['posts' => $posts, 'postAuthors' => $postAuthors]);
    }

    /**
     * @param $postId
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($postId)
    {
        $post = Post::with('tags')->find($postId);
        $listAllTags = Tag::select('name', 'id')->pluck('name', 'id')->toArray();
        return view('pages/posts/form', ['post' => $post, 'listAllTags' => $listAllTags]);
    }

    /**
     * Overide postUpdate AbstractController method
     * @param \Illuminate\Database\Eloquent\Model $object
     * @param $request
     *
     * @return void
     */
    public function postUpdate(Model $object, $request) {
        $object = parent::postUpdate($object, $request);
        $object->tags()->sync($request['postTags']);
    }

    public function delete()
    {
        //
    }
}
