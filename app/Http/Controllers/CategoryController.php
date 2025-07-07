<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    public function index($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $products = Product::with(['category'])->where('category_id',
            $category->id)->get();
        return view('categories.index', compact(['products',
            'category']));
    }
}
