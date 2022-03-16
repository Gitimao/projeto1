<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::post('login', [User::class, 'store']);
});

Route::middleware('auth')->group(function () {
    
});