<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Request;

abstract class AbstractController extends Controller
{

    /**
     * @var Model
     */
    private $model;

    /**
     * @throws \Exception
     */
    public function __construct()
    {
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
        # 1- I retrieve the model
        $this->model = $this->getModel();

        # 2- I retrieve the instance of the model with its id
        $object = $this->model::find($objectId);

        # 3- I retrieve the fillable of the model and the details of the request
        $fillables = $this->getModel()::find($objectId)->getFillable();
        $request = Request::post();

        # 4- I check if the request exist in the fillable and if so I update the property of the object
        foreach ($request as $key => $value)
        {
            #valider que la donnée est dans le fillable et le parameter
            if(in_array($key, $fillables)) {
                $object->$key = $value;
            }
        }

        # 5- I save the object with the new properties
        $object->save();

        # 6- I set the assocations and return the view
        if ($object instanceof Post)
        {
            $object->tags()->sync($request['postTags']);
        } elseif ($object instanceof User)
        {
            return redirect('users')->with('message', "!! The user has been updated !!");
        } else {
            return throw new \Exception('Incorrect or inexistant model');
        }
    }
}
