<?php

use App\Http\Controllers\Psychologist\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Psychologist\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Psychologist\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Psychologist\Auth\RegisteredPsychologistController;
use App\Http\Controllers\Psychologist\Auth\VerifyEmailController;

Route::get('/psychologist/dashboard', function () {
    return view('psychologist.dashboard.dashboard');
})->middleware(['auth:psychologist', 'verified'])->name('psychologist.dashboard');

Route::middleware(['guest'])->group(function () {
    Route::get('/psychologist', [RegisteredPsychologistController::class, 'create'])
        ->name('psychologist.create');

    Route::post('/psychologist', [RegisteredPsychologistController::class, 'store'])
        ->name('psychologist.store');

    Route::get('/psychologist/login', [AuthenticatedSessionController::class, 'create'])
        ->name('psychologist.login');

    Route::post('/psychologist/login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware(['auth:psychologist'])->prefix('/psychologist')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('psychologist.verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('psychologist.verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('psychologist.verification.send');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('psychologist.logout');

});
