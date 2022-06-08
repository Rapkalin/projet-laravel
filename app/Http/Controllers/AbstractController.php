<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

abstract class AbstractController extends Controller
{
    public function update($model, int $objectId)
    {
        $object = $model::find($objectId);
        $request = Request::post();

        foreach ($request as $key => $value)
        {
            if($key != regex("retirer _") && !is_array($value)) {
                $object->$key = $request[$key];
            }
        }
        $object->save();

        // setAssociation() - use for the override in the controllers
        if ($object === Post::Model)
        {
            $object->tags()->sync($request['postTags']);
            return redirect('posts')->with('message', "!! The post has been updated !!");
        } elseif ($object === User::Model)
        {
            return redirect('users')->with('message', "!! The user has been updated !!");
        }
    }
}


/*
 * Posts Controller
 */
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


/*
 * User Controller
 */
public function update($userId)
{
    $user = User::find($userId);
    $request = Request::post();
    $user->name = $request['name'];
    $user->email = $request['email'];
    $user->save();
    return redirect('users')->with('message', "!! The user has been updated !!");
}
