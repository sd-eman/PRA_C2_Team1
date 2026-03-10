<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return redirect('/');
    }

    public function show(Category $category)
    {
        $brands = $category->brands()->with('manuals')->get();
        return view('pages.category_brands', compact('category', 'brands'));
    }
}
