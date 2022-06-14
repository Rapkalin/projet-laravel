<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Request;

abstract class AbstractController extends Controller
{

    /**
     * @var Model
     */
    private Model $model;

    /**
     * @throws \Exception
     */
    public function __construct(string $modelName)
    {
        $this->model = new $modelName();

        if(!$this->model) {
            throw new \Exception("No model loaded");
        }

    }

    /**
     * @param int $objectId
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|void
     */
    public function update(int $objectId)
    {
        # 2- I retrieve the instance of the model with its id
        $object = $this->model::find($objectId);

        # 3- I retrieve the fillable of the model and the details of the request
        $fillables = $this->model::find($objectId)->getFillable(); // @TODO : Create abstract model with getFillable content
        $request = Request::post();

        # 4- I check if the request exist in the fillable and if so I update the property of the object
        foreach ($request as $key => $value) {
            if (in_array($key, $fillables, true)) {
                $object->$key = $value;
            }
        }

        # 5- I save the object with the new properties
        $object->save();

        # 6- I set the assocations and return the view
        if ($object instanceof Post) {
            $object->tags()->sync($request['postTags']);
            return redirect('posts')->with('message', "!! The post has been updated !!");
        } elseif ($object instanceof User) {
            return redirect('users')->with('message', "!! The user has been updated !!");
        } else {
            throw new \Exception('Incorrect or inexistant model');
        }
    }
}
