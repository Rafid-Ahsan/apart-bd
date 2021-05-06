<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class Teamcontroller extends Controller
{
    public function index() {
        $users = User::get();
        $roles = Role::get();

        return view('admin.team.index', [
            'users' => $users,
            'roles' => $roles
        ]);
    }

    public function update(User $user, Request $request) {
        $user->assignRole($request->role);

        return redirect('/team')->with('msg', 'Team updated Succesfully');
    }

    public function delete(User $user, Request $request) {
        if($request->all != []) {
            $role = $user->roles->pluck('name')->first();
            $user->removeRole($role);

            return redirect('/team')->with('msg', 'Team updated Succesfully');
        }   else {
            return redirect('/team')->with('msg', 'That user has no role');
        }

    }
}
