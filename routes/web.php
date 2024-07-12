<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('web.register');
Route::get('login', [AuthController::class, 'showLoginForm'])->name('web.login');
Route::get('logout', [AuthController::class, 'showLogoutForm'])->name('web.logout');
