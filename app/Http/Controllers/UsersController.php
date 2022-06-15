<?php

namespace App\Http\Controllers;

use App\Models\User;
use Request;
use Log;

class UsersController extends AbstractController
{
    public function __construct() {
        parent::__construct(User::class);
    }

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

    public function delete()
    {
        //
    }
}
