<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ClinicHistoriesController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\Psychologist\PsychologistController; // ← FALTABA ESTA
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TherapySessionController;
use App\Http\Controllers\Psychologist\PsychologistDashboardController;

// Home
Route::view('/', 'home')->name('home');

// Language switch (público)
Route::get('/lang/{locale}', function (string $locale) {
    $allowed = ['es', 'en'];

    if (! in_array($locale, $allowed, true)) {
        $locale = config('app.fallback_locale', 'es');
    }

    session(['locale' => $locale]);

    return redirect()->back();
})->name('lang.switch');
// Dashboard (psicólogo)


Route::get('/dashboard', [PsychologistDashboardController::class, 'index'])
    ->middleware(['auth:psychologist', 'verified'])
    ->name('dashboard');

// Rutas protegidas para psicólogos
Route::middleware(['auth:psychologist', 'verified'])->group(function () {
    
    // Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Pacientes
    Route::get('/patients', [PatientController::class, 'indexView'])->name('patients.index');
    Route::get('/patients/create', [PatientController::class, 'create'])->name('patients.create');
    Route::post('/patients', [PatientController::class, 'store'])->name('patients.store');
    Route::get('/patients/{id}', [PatientController::class, 'showView'])->name('patients.show');
    Route::get('/patients/{id}/edit', [PatientController::class, 'edit'])->name('patients.edit');
    Route::put('/patients/{id}', [PatientController::class, 'update'])->name('patients.update');
    Route::delete('/patients/{id}', [PatientController::class, 'destroy'])->name('patients.destroy');

    // Psicólogos
    Route::get('/psychologist/all', [PsychologistController::class, 'all']);

    // Citas
    Route::resource('appointments', AppointmentController::class);
   
    // Obtener número de próxima sesión para un paciente
    Route::get('/patients/{id}/next-session-number', function ($id) {
        return \App\Models\TherapySession::where('patient_id', $id)->count() + 1;
    });
    
    // Sesiones
    Route::resource('sessions', TherapySessionController::class)
        ->names('therapy_sessions');

    // Historias clínicas
    Route::resource('clinic-histories', ClinicHistoriesController::class);

    // Reportes
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');


});

// Rutas del módulo de psicólogos
require __DIR__.'/psychologist.php';

// Rutas de auth estándar (si existen)
require __DIR__.'/auth.php';

// Redirigir siempre el login global al login de psicólogos
Route::get('/login', function () {
    return redirect('/psychologist/login');
})->name('login');