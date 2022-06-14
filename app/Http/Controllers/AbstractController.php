<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Request;

abstract class AbstractController extends Controller
{

    /**
     * @var Model
     */
    private Model $model;
    private string $indexName;

    /**
     * @throws \Exception
     */
    public function __construct(string $modelName)
    {
        # $this->indexName = regex($modelName); // @TODO : do the regex with Str Façades for plurial modelName and all lowerCase (singular here and plural in route)
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
        $this->postUpdate($object, $request);
        return redirect('posts')->with('message', "!! The {{post}} has been updated !!");
    }

    public function postUpdate(Model $object, $request)
    {
        // use for overriding
        return $object;
    }
}
