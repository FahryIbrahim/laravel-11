<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Register User
    public function register(Request $request)
    {
        // Validate
        $data = $request->validate([
            'username' => ['required', 'max:255'],
            'email' => ['required', 'max:255', 'email'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        dd('ok');
        // Register

        // Login

        // Redirect
    }
}
