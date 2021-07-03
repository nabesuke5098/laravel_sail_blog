<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\Mypage\UserLoginController;
use Illuminate\Support\Facades\Route;

Route::get('', [HomeController::class, 'index']);
Route::get('blogs/{blog}', [HomeController::class, 'show'])->name('blog.show');

Route::get('signup', [SignupController::class, 'index']);
Route::post('signup', [SignupController::class, 'store']);

Route::get('mypage/login', [UserLoginController::class, 'index'])->name('login');
Route::post('mypage/login', [UserLoginController::class, 'login']);