<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'posts.index')->name('home');

Route::middleware('guest')->group(function () {
    // Register
    Route::view('/register', 'auth.register')->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    // Login
    Route::view('/login', 'auth.login')->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function() {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');
    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
