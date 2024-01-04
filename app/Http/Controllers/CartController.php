<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function store(int $productId)
    {
        $existingCart = 
            Cart::where('user_id', '=', Auth::user()->id)
                ->where('product_id', '=', $productId)
                ->first();

        if ($existingCart) {
            if ($existingCart->quantity + 1 <= $existingCart->product->quantity) {
                $existingCart->quantity ++;
                $existingCart->save();
            }
        } else {
            $cart = Cart::create([
                'product_id' => $productId,
                'user_id' => Auth::user()->id,
                'quantity' => 1
            ]);    
        } 
       
        return redirect('/button2')->with('added', true);
    }

    public function show()
    {
        $carts = Cart::where('user_id', '=', Auth::user()->id)->get();
        return view('cart', [
            'carts' => $carts
        ]);
    }
    
    public function increase($productId)
    {
        $cart = Cart::where('user_id', '=', Auth::user()->id)
            ->where('product_id', '=', $productId)
            ->first();

        if ($cart) {
            if ($cart->product->quantity >= $cart->quantity + 1) {
                $cart->quantity ++;
                $cart->save();
            }
        }   

        return redirect('/view-cart');
    }

    public function decrease($productId)
    {
        $cart = Cart::where('user_id', '=', Auth::user()->id)
            ->where('product_id', '=', $productId)
            ->first();

        if ($cart) {
            if ($cart->quantity == 1) {
                $cart->delete();
            } else {
                $cart->quantity --;
                $cart->save();
            }
        }   

        return redirect('/view-cart');
    }

    public function checkout()
    {
        $carts = Cart::where('user_id', '=', Auth::user()->id)->get();
        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->status = 'new';
        $order->address = 'Bla bla';
        $order->order_date = now();
        $order->save();

        foreach ($carts as $cart) {
            $orderDetail = new OrderDetail();
            $orderDetail->order_id = $order->id;
            $orderDetail->product_id = $cart->product_id;
            $orderDetail->quantity = $cart->quantity;
            $orderDetail->price = $cart->product->price;
            $orderDetail->save();
            $cart->delete();
        }
    }
}
