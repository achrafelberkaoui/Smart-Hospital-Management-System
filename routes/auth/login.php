<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
// dd('r');
Route::get('login',[LoginController::class, 'showLogin'])->name('login');
Route::post('login',[LoginController::class, 'login']);