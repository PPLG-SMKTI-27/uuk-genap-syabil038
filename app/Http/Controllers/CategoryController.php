<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        Category::create([
            'category_name' => $request->category_name,
            'description' => $request->description,
        ]);

        return redirect()->back();
    }

    public function destroy($id)
    {
        Category::findOrFail($id)->delete();

        return redirect()->back();
    }
}
