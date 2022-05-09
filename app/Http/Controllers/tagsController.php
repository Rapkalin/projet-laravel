<?php

namespace App\Http\Controllers;

use App\Models\Tag;

class TagsController extends Controller
{
    public function index()
    {
        $tags = getTags();
        return view('pages/tags/index', ['tags' => $tags]);
    }

    public function getTags()
    {
        return Tags::all();
    }
}
