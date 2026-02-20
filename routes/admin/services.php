<?php

use App\Http\Controllers\PatientController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:admin'])->resource('services', ServiceController::class);
Route::middleware(['auth', 'role:admin|reception'])->resource('patients', PatientController::class);