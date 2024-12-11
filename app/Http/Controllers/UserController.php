<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(5);

        return view('users.index', [
            'users' => $users
        ]);
    }

    public function show()
    {
        return view('users.show');
    }

    public function store(UserCreateRequest $request)
    {
        $user = new User();

        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->role_id = 2;

        $user->save();

        request()->session()->put('auth_user', $user);

        Auth::login($user);

        return redirect('/');
    }
}
