<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
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
        $posts = Post::with('user')
            ->get()
            ->each(static function($post) {
                $post->tagList = $post->tags->count() >= 1 ? implode(', ', $post->tags->pluck('name')->toArray()) : 'aucun';
            })
        ;
        return view('pages/posts/index', ['posts' => $posts, 'tags' => $this->listAllTags()]);
    }

    /**
     * @param $postId
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($postId)
    {
        $post = Post::with('tags')->find($postId);
        return view('pages/posts/form', ['post' => $post, 'tags' => $this->listAllTags()]);
    }

    /**
     * Overide postUpdate AbstractController method
     * @param \Illuminate\Database\Eloquent\Model $object
     * @param $request
     *
     * @return void
     */
    public function postUpdate(Model $object, $request)
    {
        $object = parent::postUpdate($object, $request);
        $object->tags()->sync($request['postTags']);
    }

    public function delete()
    {
        //
    }

    public function listAllTags()
    {
        return Tag::select('name', 'id')->pluck('name', 'id')->toArray();
    }

}
