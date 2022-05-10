<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Request;
use Log;

class UsersController extends Controller
{
    public function index()
    {
        $users = $this->getUsers();
        return view('pages/users/index', ['users' => $users]);
    }

    public function getUsers()
    {
        Log::info(
            "User::all() call",
            [
                "Origin" => __METHOD__,
            ]
        );
        return User::all();
    }

    public function edit($userId)
    {
        $user = User::find($userId);
        return view('pages/users/form', ['user' => $user]);
    }

    public function update($userId)
    {
        $user = User::find($userId);
        $request = Request::post();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->save();
        return redirect('users')->with('message', "!! The user has been updated !!");
    }

    public function delete()
    {
        //
    }
}
