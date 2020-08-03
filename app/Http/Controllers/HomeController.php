<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $orders = Order::all();
        return view('auth.orders.index', compact('orders'));
    }
}
