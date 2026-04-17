<?php

use App\Http\Controllers\DossierMedicalController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:infirmier|doctor'])->group(function () {
    Route::resource('/dossier', DossierMedicalController::class)->except(['create']);
    Route::get('/dossier/create/{patient}', [DossierMedicalController::class, 'create'])->name('dossier.create');
});