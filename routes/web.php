<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('', [HomeController::class, 'index']);
Route::get('blogs/{blog}', [HomeController::class, 'show'])->name('blog.show');
