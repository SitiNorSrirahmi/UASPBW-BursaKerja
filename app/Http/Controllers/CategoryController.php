<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        //return view('admin.categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories',
        ]);

        Category::create($validated);
        //return redirect('/admin/categories')->with('success', 'Kategori berhasil ditambahkan');
    }

}
