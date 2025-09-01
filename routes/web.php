<?php

use App\Http\Controllers\Api\CitaController;
use App\Http\Controllers\Api\MedicoController;
use App\Http\Controllers\Api\PacienteController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;  // Importa Request para inyección

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', function (Request $request) {
    $nombre = $request->get('nombre');
    $password = $request->get('password');

    if ($nombre == "pedro" && $password == "123") {
        return view('sistem.dashboard');
    } else {
        return redirect()->route('login')->with('error', 'Usuario o contraseña incorrectos');
    }
})->name('verificar');

/* RUTAS PARA PACIENTES */
Route::get('/patients', [PacienteController::class, 'index'])->name('patients.index');

Route::post('/patients', [PacienteController::class, 'store'])->name('patients.store');


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
