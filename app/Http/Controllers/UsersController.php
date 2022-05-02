<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index() {
        $users = User::all();
        return view('pages/users', ['users' => $users]);
    }

    public function getUsers() {
        return "test acces var";
    }
}
