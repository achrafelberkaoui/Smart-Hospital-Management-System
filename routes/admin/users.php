<?php

use App\Http\Controllers\LogController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:admin'])->group(function(){
    Route::resource('users', UserController::class);
    Route::get('logs', [LogController::class, 'index'])->name('logs.index');

});
