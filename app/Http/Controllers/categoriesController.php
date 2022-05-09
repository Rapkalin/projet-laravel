<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = $this->getCategories();
        return view('pages/categories/index', ['categories' => $categories]);
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
