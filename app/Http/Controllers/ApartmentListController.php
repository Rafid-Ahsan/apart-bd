<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use Illuminate\Http\Request;

class ApartmentListController extends Controller
{
    public function index() {
        $apartments = Apartment::paginate(15);

        return view('admin.apartment_list.index', [
            'apartments' => $apartments
        ]);
    }

    public function update_status(Apartment $apartment, Request $request) {
        $apartment->update([
            'status' => $request->status
        ]);

        return redirect('/apartment-list')->with('msg', 'Apartment has been updated');
    }

    public function delete(Request $request) {
        $apartment = Apartment::find($request->id);

        $apartment->delete();

        return redirect('/apartment-list')->with('msg', 'Apartment has been deleted');
    }
}
