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

Route::get('/patients', function () {
    return view('patients.formulario');
})->name('patients.formulario');

Route::post('/patients', [PacienteController::class, 'store'])->name('patients.store');

/* RUTAS PARA PACIENTES */
Route::get('/dashboard/pacientes', function () {
    // Simulamos traer los datos
    $pacientes = [
        [
            'id' => 1,
            'nombre' => 'Pedro',
            'apellido' => 'Perez',
            'especialidad' => 'Cardiologia',
            'telefono' => '123456789'
        ],
        [
            'id' => 2,
            'nombre' => 'Ana',
            'apellido' => 'Gomez',
            'especialidad' => 'Neurología',
            'telefono' => '987654321'
        ],
        [
            'id' => 3,
            'nombre' => 'Luis',
            'apellido' => 'Martínez',
            'especialidad' => 'Pediatría',
            'telefono' => '555123456'
        ]
    ];

    return view('pacientes.index', compact('pacientes'));
})->name('pacientes');
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
