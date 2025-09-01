<?php

use App\Http\Controllers\Api\CitaController;
use App\Http\Controllers\Api\MedicoController;
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

Route::get('/doctors', function () {
    return view('doctors.registrar');
})->name('doctors.registrar');

Route::get('/appointment', function () {
    return view('appointment.registrar');
})->name('appointment.registrar');

Route::post('/patients', [PacienteController::class, 'store'])->name('patients.store');
Route::post('/doctors', [MedicoController::class, 'store'])->name('doctor.store');
Route::post('/appointment', [CitaController::class, 'store'])->name('appointment.store');
Route::get('/appointment', [CitaController::class, 'create'])->name('appointment.registrar');
Route::post('/appointment', [CitaController::class, 'store'])->name('appointment.store');