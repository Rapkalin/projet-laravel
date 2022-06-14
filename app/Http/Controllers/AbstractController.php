<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Request;
use function PHPUnit\Framework\throwException;

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
        $this->model = $this->getModel();
        $object = $this->model::find($objectId);
        $fillables = $this->getModel()::find($objectId)->getFillable();
        $request = Request::post();
        foreach ($request as $key => $value)
        {
            #valider que la donnée est dans le fillable et le parameter
            if(in_array($key, $fillables)) {
                $object->$key = $value;
            }
        }
        $object->save();
        $this->setAssociation($object, $request);
    }

    # Use for the override in the controllers

    /**
     * @param $object
     * @param $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    private function setAssociation($object, $request)
    {
        if ($object === $this->model && $object === 'Post')
        {
            $object->tags()->sync($request['postTags']);
            return redirect('posts')->with('message', "!! The post has been updated !!");
        } elseif ($object === $this->model && $object === 'User')
        {
            return redirect('users')->with('message', "!! The user has been updated !!");
        } else {
            return throw new \Exception('Incorrect or inexistant model');
        }
    }
}
