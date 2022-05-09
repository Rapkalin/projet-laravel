<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index ()
    {
        $categories = $this->getCategories();
        return view('pages/categories/index', ['categories' => $categories]);
    }

    public function getCategories()
    {
        return Category::all();
    }
}
