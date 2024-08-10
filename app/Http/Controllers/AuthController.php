<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Register User
    public function register(Request $request)
    {
        // Validate
        $data = $request->validate([
            'username' => ['required', 'max:255'],
            'email' => ['required', 'max:255', 'email', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        // Register
        $user = User::create($data);
        // Login
        Auth::login($user);
        // Redirect
        return redirect()->route('home');
    }

    // Login User
    public function login(Request $request)
    {
        // Validate
        $data = $request->validate([
            'email' => ['required', 'max:255', 'email'],
            'password' => ['required']
        ]);

        // Attempt
        if(Auth::attempt($data, $request->remember)){
            return redirect()->intended();
        } else {
            return back()->withErrors([
                'failed' => ['The provided credentials do not match our records.']
            ]);
        }
    }
}
