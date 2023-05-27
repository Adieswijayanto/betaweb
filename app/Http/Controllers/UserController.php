<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function user(){
        $users = User::all();;
        return view('admin.master.user.index' , compact('users'));
    }

    public function tambah(){
        return view('admin.master.user.tambah');
    }

    public function store(Request $request){

        $user = User::create($request->only('name','email') + ['password' => bcrypt($request->password)]);
        return redirect()->route('admin.master.user.index')
            ->with('success', 'User created successfully.');
    }

    public function edit(User $user)
    {
        if (! Gate::allows('user_edit')) {
            return abort(401);
        }
        $roles = Role::get()->pluck('title', 'id');

        return view('admin.users.edit', compact('user', 'roles'));
    }
}