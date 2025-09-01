<?php

use App\Http\Controllers\Api\PacienteController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/patients', function () {
    return view('patients.formulario');
})->name('patients.formulario');

Route::post('/patients', [PacienteController::class, 'store'])->name('patients.store');