<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('dashboard');

route::get('/register', [RegisterController::class, 'show'])->name('register');
route::post('/register', [RegisterController::class, 'store']);

route::get('/login', [LoginController::class, 'show'])->name('login');
route::post('/login', [LoginController::class, 'store']);

route::post('/logout', LogoutController::class)->name("logout");
