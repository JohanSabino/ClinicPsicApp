<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ClinicHistoriesController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

// Home
Route::view('/', 'home')->name('home');

// Dashboard
Route::get('/dashboard', function () {
    return view('psychologist.dashboard.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rutas protegidas
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Pacientes (Vistas)
    Route::get('/patients', [PatientController::class, 'indexView'])->name('patients.index');
    Route::get('/patients/create', [PatientController::class, 'create'])->name('patients.create');
    Route::post('/patients', [PatientController::class, 'store'])->name('patients.store');
    Route::get('/patients/{id}', [PatientController::class, 'showView'])->name('patients.show');
    Route::get('/patients/{id}/edit', [PatientController::class, 'edit'])->name('patients.edit');
    Route::put('/patients/{id}', [PatientController::class, 'update'])->name('patients.update');
    Route::delete('/patients/{id}', [PatientController::class, 'destroy'])->name('patients.destroy');

    // Citas/Agenda (Vistas)
    Route::resource('appointments', AppointmentController::class);

    // Historias clínicas
    Route::resource('clinic-histories', ClinicHistoriesController::class);

    // Reportes
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
});

require __DIR__.'/psychologist.php';