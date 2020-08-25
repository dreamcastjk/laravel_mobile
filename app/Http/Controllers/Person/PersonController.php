<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use App\Order;
use Auth;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $orders = Auth::user()->orders()->whereStatus(1)->get();
        return view('auth.orders.index', compact('orders'));
    }

    /**
     * @param Order $order
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    function show(Order $order)
    {
        if (!Auth::user()->order->contains($order)) {
            return back();
        }
        return view('auth.orders.show', compact('order'));
    }
}
