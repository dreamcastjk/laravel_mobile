<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\ProductsFilterRequest;
use App\Product;

/**
 * Class MainController
 * @package App\Http\Controllers
 */
class MainController extends Controller
{
    public function index(ProductsFilterRequest $request)
    {
        $products_query = Product::with('categories');

        if ($request->filled('price_from')) {
            $products_query->where('price', '>=', $request->price_from);
        }

        if ($request->filled('price_to')) {
            $products_query->where('price', '<=', $request->price_to);
        }

        foreach (Product::$label_fields as $field) {
            if ($request->has($field)) {
                $products_query->where($field, 1);
            }
        }

        $products = $products_query->paginate(6)->withPath('?'.$request->getQueryString());
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
