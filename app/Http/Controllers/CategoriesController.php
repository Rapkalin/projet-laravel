<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoriesController extends Controller
{
    public function index()
    {
        return view('pages/categories/index', ['categories' => $this->getCategories()]);
    }

    public function getCategories()
    {
        return Category::all();
    }

    public function edit()
    {
        //
    }

    public function update()
    {
        //
    }

    public function delete()
    {
        //
    }
}
