<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Auth;

/**
 * Class MainController
 * @package App\Http\Controllers
 */
class MainController extends Controller
{
    public function index()
    {
        $products = Product::paginate(6);
        return view('index', compact('products'));
    }

    public function categories()
    {
        $categories = Category::get();
        return view('categories', compact('categories'));
    }

    public function category($code)
    {
        $category = Category::whereCode($code)->first();
        return view('category', compact('category'));
    }

    public function product(Category $category, Product $product = null)
    {
        return view('product', compact('product'));
    }
}
