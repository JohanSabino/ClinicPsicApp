<?php

use App\Http\Controllers\ProfileController;
<<<<<<< HEAD
=======
use App\Http\Controllers\PatientController;
>>>>>>> origin/master
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
<<<<<<< HEAD
=======
    
    // Rutas para gestión de pacientes
    Route::resource('patients', PatientController::class);
>>>>>>> origin/master
});

require __DIR__.'/auth.php';
require __DIR__.'/psychologist.php';
