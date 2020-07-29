<?php

namespace App\Http\Controllers;

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
        return view('categories');
    }

    public function category($category)
    {
        return view('category', compact('category'));
    }

    public function product($product = 'iphone')
    {
        return view('product', ['product' => $product]);
    }
}
