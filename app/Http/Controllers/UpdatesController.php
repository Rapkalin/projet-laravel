<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

abstract class UpdatesController extends Controller
{
    public function update($objectId)
    {
        $object = Post::find($objectId);
        $request = Request::post();

        foreach ($parameters as $key => $parameter)
        {
            $object->$parameter = $request[$key];
        }
        $object->save();
        
        // setAssociation() - use for the override in the controllers
        $post->tags()->sync($request['postTags']);
        return redirect('posts')->with('message', "!! The post has been updated !!");
    }
}
