<?php

namespace App\Http\Controllers;

use App\Models\User;
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
}
