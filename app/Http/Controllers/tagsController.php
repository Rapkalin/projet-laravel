<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function index ()
    {
        $tags = getTags();
        return view('pages/tags/index', ['tags' => $tags]);
    }

    public function getTags()
    {
        return Tags::all();
    }
}
