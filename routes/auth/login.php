<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignUpController;
use Illuminate\Support\Facades\Route;
// dd('r');
Route::get('login',[LoginController::class, 'showLogin'])->name('login');
Route::post('login',[LoginController::class, 'login'])->name('login.post');
Route::get('register',[SignUpController::class, 'showRegister'])->name('register');
Route::post('register',[SignUpController::class, 'register']);