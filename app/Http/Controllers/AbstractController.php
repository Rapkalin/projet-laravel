<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Request;
use Str;

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
        preg_match('/(post|user)/', Str::lower($modelName), $matches);
        $this->indexName = $matches[0];
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
        # 1- I retrieve the instance of the model with its id
        $object = $this->model::find($objectId);

        # 2- I retrieve the fillable of the model and the details of the request
        $fillables = $this->model::find($objectId)->getFillable(); // @TODO : Create abstract model with getFillable content
        $request = Request::post();

        # 3- I check if the request exist in the fillable and if so I update the property of the object
        foreach ($request as $key => $value) {
            if (in_array($key, $fillables, true)) {
                if($key === 'password') {
                    $request['password'] === null ? $object->password = $object->password : $object->password = $value;
                } elseif ($key != 'password') {
                    $object->$key = $value;
                }
            }
        }

        # 4- I save the object with the new properties
        $object->save();
        $this->postUpdate($object, $request);
        return redirect($this->indexName . 's')->with('message', "!! The $this->indexName has been updated !!");
    }

    /**
     * Overrided in child controller
     * @param \Illuminate\Database\Eloquent\Model $object
     * @param $request
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function postUpdate(Model $object, $request)
    {
        // use for overriding
        return $object;
    }
}
