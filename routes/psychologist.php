<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Psychologist\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Psychologist\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Psychologist\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Psychologist\Auth\RegisteredPsychologistController;
use App\Http\Controllers\Psychologist\Auth\VerifyEmailController;

/*
|--------------------------------------------------------------------------
| Rutas de Autenticación de Psicólogos
|--------------------------------------------------------------------------
*/

// Rutas de registro y login (solo para invitados)
Route::middleware('guest')->prefix('psychologist')->name('psychologist.')->group(function () {
    Route::get('register', [RegisteredPsychologistController::class, 'create'])
        ->name('register');
    Route::post('register', [RegisteredPsychologistController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

// Rutas protegidas (solo para psicólogos autenticados)
Route::middleware('auth')->prefix('psychologist')->name('psychologist.')->group(function () {
    // Verificación de email
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    // Logout
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});