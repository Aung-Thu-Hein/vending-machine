<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request)
    {
        $credentials = $request->safe()->only(['email','password']);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if(auth()->user()->role->name === UserRole::ADMIN->value) {
                return redirect()->route('admin.products.index');
            }
            return redirect('/');
        }else {
            return back()->withInput()->with('error', "No credentials match...");
        }
    }

    public function logout()
    {
        if (Auth::guard('web')->check()) {
            Auth::guard('web')->logout();
        }

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/');
    }
}
