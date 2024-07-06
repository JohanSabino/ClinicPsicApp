<?php

use App\Http\Controllers\Psychologist\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Psychologist\Auth\VerifyEmailController;
use App\Http\Controllers\Psychologist\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Psychologist\Auth\RegisteredPsychologistController;

Route::get('/psychologist/dashboard', function () {
    return view('psychologist.dashboard.dashboard');
})->middleware(['auth:psychologist', 'verified'])->name('psychologist.dashboard');

Route::controller(RegisteredPsychologistController::class)->group(function () {
    Route::get('/psychologist', 'create')->name('psychologist.create');
    Route::post('/psychologist', 'store')->name('psychologist.store');
});

Route::middleware(['auth:psychologist'])->prefix('/psychologist')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('psychologist.verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');
});
