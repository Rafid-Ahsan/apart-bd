<?php

namespace App\Http\Controllers;

use App\Models\Rent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InboxController extends Controller
{
    public function index() {
        $inboxes = Rent
            ::join('users as buyer_users', 'rents.buyer_id', '=', 'buyer_users.id')
            ->join('users as seller_users', 'rents.seller_id', '=', 'seller_users.id')
            ->select('rents.id as id', 'rents.*')
            ->get();

        return view('admin.inbox', [
            'inboxes' => $inboxes
        ]);
    }

    public function update(Request $request) {
        $rent = Rent::where('id', $request->id)->first();

        $rent->update([
            'status' => $request->status
        ]);

        return redirect('/inbox')->with('msg', 'Inbox has been updated');
    }
}
