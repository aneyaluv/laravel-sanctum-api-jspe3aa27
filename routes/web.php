<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\CommentController;
use Illuminate\Support\Facades\Route;

Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('web.register');
Route::get('login', [AuthController::class, 'showLoginForm'])->name('web.login');
Route::post('login', [AuthController::class, 'login'])->name('web.login');
Route::post('logout', [AuthController::class, 'logout'])->name('web.logout');

Route::middleware(['web', 'auth'])->group(function () {
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

    Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
});
