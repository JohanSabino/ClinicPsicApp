<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Psychologist\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Psychologist\PsychologistController;
use App\Http\Controllers\PatientController;


Route::prefix('psychologist')->group(function () {
    // Login abierto
    Route::post('/login', [AuthenticatedSessionController::class, 'apiLogin']);

    // Rutas protegidas por token
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/logout', [AuthenticatedSessionController::class, 'apiLogout']);
        Route::get('/me', [AuthenticatedSessionController::class, 'apiMe']);

        // CRUD de psicólogos
        Route::get('/all', [PsychologistController::class, 'index']);     // Listar todos
        Route::get('/{id}', [PsychologistController::class, 'show']);     // Ver uno
        Route::post('/', [PsychologistController::class, 'store']);       // Crear
        Route::put('/{id}', [PsychologistController::class, 'update']);   // Actualizar
        Route::patch('/{id}', [PsychologistController::class, 'update']); // Actualizar parcialmente
        Route::delete('/{id}', [PsychologistController::class, 'destroy']);// Eliminar
    });
});

// CRUD de Pacientes (protegido con auth)
Route::prefix('patients')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [PatientController::class, 'index']);           // Listar todos
    Route::get('/{id}', [PatientController::class, 'show']);        // Ver uno
    Route::post('/', [PatientController::class, 'store']);          // Crear
    Route::put('/{id}', [PatientController::class, 'update']);      // Actualizar completo
    Route::patch('/{id}', [PatientController::class, 'update']);    // Actualizar parcial
    Route::delete('/{id}', [PatientController::class, 'destroy']);  // Eliminar
});