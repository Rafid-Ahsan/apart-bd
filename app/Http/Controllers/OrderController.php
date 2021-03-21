<?php

namespace App\Http\Controllers;

use App\Models\Order;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request) {
        $request->validate([
            'message' => 'required|max:255|string'
        ]);

        $order = New Order();
        $order->user_id = $request->user_id;
        $order->apartment_id = $request->apartment_id;
        $order->message = $request->message;

        $order->save();

        return redirect('/')->with('msg', 'Your order has been sent. Agent will call you');
    }
}
