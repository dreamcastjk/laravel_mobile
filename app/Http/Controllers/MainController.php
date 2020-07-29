<?php

namespace App\Http\Controllers;

use App\Category;

/**
 * Class MainController
 * @package App\Http\Controllers
 */
class MainController extends Controller
{
    public function index()
    {
        return view('index');
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

    public function product($product = 'iphone')
    {
        return view('product', ['product' => $product]);
    }
}
