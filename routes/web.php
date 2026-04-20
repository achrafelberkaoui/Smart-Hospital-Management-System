<?php

use App\Http\Controllers\ApointmentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ObservationController;
use App\Http\Controllers\PatientController;
use App\Models\Observation;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['auth','role:admin|doctor|infirmier|reception'])->group(function () {
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
Route::middleware(['auth','role:infirmier'])->group(function () {
Route::get('/infirmier/observations', [ObservationController::class, 'observations'])->name('infirmier.observations');
Route::post('/observations', [ObservationController::class, 'store'])->name('observations.store');
});

Route::middleware(['auth','role:doctor|reception'])->group(function(){
    Route::resource('appointments', ApointmentController::class);
});
Route::get('doctor/planning', [ApointmentController::class, 'planning'])->middleware(['auth', 'role:doctor'])->name('doctor.planning');

Route::middleware(['auth', 'role:reception|doctor|infirmier'])->resource('patients', PatientController::class);

require __DIR__.'/auth/auth.php';
require __DIR__.'/doctor/dossierMedi.php';
require __DIR__.'/admin/services.php';
require __DIR__.'/admin/users.php';