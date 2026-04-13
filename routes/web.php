<?php

use App\Http\Controllers\ApointmentController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['auth','role:admin|doctor|infirmier|reception'])->group(function () {
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

});

Route::middleware(['auth','role:doctor|reception'])->group(function(){
    Route::resource('appointments', ApointmentController::class);
});

require __DIR__.'/auth/auth.php';
require __DIR__.'/admin/services.php';
require __DIR__.'/admin/users.php';