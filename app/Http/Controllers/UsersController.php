<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = $this->getUsers();
        return view('pages/users/index', ['users' => $users]);
    }

    public function getUsers()
    {
        return User::all();
    }
}

