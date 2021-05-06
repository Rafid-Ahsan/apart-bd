<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Teamcontroller extends Controller
{
    public function index() {
        $users = User::get();
        {{ dd(Auth::user()->roles->pluck('name')); }}

        return view('admin.team.index', [
            'users' => $users
        ]);
    }
}
