<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Models\Rent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RentController extends Controller
{
    public function store(Request $request) {
        $request->validate([
            'message' => 'string|required'
        ]);

        $seller_id = Apartment::where("id", $request->apartment_id)->first()->user_id;

        Rent::create([
            'message' => $request->message,
            'seller_id' => $seller_id,
            'buyer_id' => Auth::user()->id,
            'property_id' => $request->apartment_id
        ]);

        return redirect('/')->with('msg', 'Your order is on queue');
    }
}
