<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use function PHPUnit\Framework\throwException;

abstract class AbstractController extends Controller
{

    /**
     * @var Model
     */
    private Model $model;

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
        $object = $this->model::find($objectId);
        $request = Request::post();
        $fillables = $this->fillable;

        foreach ($fillables as $key => $value)
        {
            #valider que la donnée est dans le fillable et le parameter
            if(in_array($value, $fillables)) {
                $object->value = $value;
            }
        }
        $object->save();
        setAssociation($object);
    }

    # Use for the override in the controllers
    /**
     * @param $object
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|void
     * @throws \Exception
     */
    private function setAssociation(Model $object, RedirectResponse $request)
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
