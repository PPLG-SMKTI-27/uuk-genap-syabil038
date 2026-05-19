<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        $categories = Category::all();
        return view('products.index', compact('products', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'product_name' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'unit' => 'required',
        ]);

        Product::create([
            'category_id' => $request->category_id,
            'product_name' => $request->product_name,
            'price' => $request->price,
            'stock' => $request->stock,
            'unit' => $request->unit,
        ]);

        return redirect()->route('products.index')
            ->with('success', 'Product berhasil ditambahkan');
    }

    public function destroy($id)
    {
        Product::findOrFail($id)->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product berhasil dihapus');
    }
}
