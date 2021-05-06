<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show(User $user) {
        return view('profile.index', [
            'user' => $user
        ]);
    }

    public function update(User $user, Request $request) {
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'mobile_number' => 'required|string',
            'description' => 'required|string',
            'skype' => 'required|string',
            'email' => 'required|string',
        ]);

        $user->update([
            'first_name' =>  $request->first_name,
            'last_name' =>  $request->last_name,
            'mobile_number' => $request->mobile_number,
            'description' =>  $request->description,
            'skype' => $request->skype,
            'email' =>  $request->email
        ]);

        return redirect('profile/'. $user->id)->with('msg', 'Profile Updated');
    }
}
