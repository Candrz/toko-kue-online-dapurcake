<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products   = Product::get()->load(['category']);
        return view('welcome', compact(['categories', 'products']));
    }
}
