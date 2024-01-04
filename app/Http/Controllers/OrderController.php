<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', '=', Auth::user()->id)->get();

        return view('orders', [
            'orders' => $orders
        ]);
    }
}
