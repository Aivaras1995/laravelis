<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function store(UserRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        if (Auth::user()->role === User::ROLE_ADMIN){
            $user->role = $request->role;
        }
        $user->save();
        return redirect()->route('users.show', $user);
    }

    public function create()
    {
        return view('users.create');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(UserRequest $request, User $user)
    {
        $data = $request->all();
        if ($request->password === null){
            unset($data['password']);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        if (Auth::user()->role === User::ROLE_ADMIN){
            $user->role = $request->role;
        }
        $user->save();
        return redirect()->route('users.show', $user);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
}


