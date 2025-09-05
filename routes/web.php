<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PageController;

use App\Http\Controllers\Api\PacienteController;
use App\Http\Controllers\Api\CitaController;
use App\Http\Controllers\Api\MedicoControllerController;
use App\Http\Controllers\Api\DiagnosticoController;
use App\Http\Controllers\Api\MedicamentoController;
use App\Http\Controllers\Api\TratamientoController;

// Rutas de autenticación
Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/autentificacion', [LoginController::class, 'verificar'])->name('verificar');

// Dashboard (vista general)
Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Rutas de Gestión del Sistema
|--------------------------------------------------------------------------
| Cada sección del sistema cuenta con su propio controlador, que se encarga
| de consumir la API RESTful y enviar los datos a las vistas correspondientes.
|
| Para un trabajo coordinado y ordenado, se recomienda organizarse por grupos:
| - Pacientes y Citas
| - Doctores y Diagnósticos
| - Medicinas y Tratamientos
|
| Se recomienda trabajar de manera ordenada, utilizando
| siempre el controlador correspondiente a cada sección para mantener
| coherencia, modularidad y facilidad de mantenimiento del sistema.
*/


/* PACIENTES ROUTES */
Route::get('/pacientes', [PacienteController::class, 'index'])->name('pacientes.index');
Route::get('/pacientes/crear', [PacienteController::class, 'create'])->name('pacientes.create');
Route::post('/pacientes', [PacienteController::class, 'store'])->name('pacientes.store');
Route::get('/pacientes/{paciente}', [PacienteController::class, 'show'])->name('pacientes.show');
Route::get('/pacientes/{paciente}/editar', [PacienteController::class, 'edit'])->name('pacientes.edit');
Route::put('/pacientes/{paciente}', [PacienteController::class, 'update'])->name('pacientes.update');
Route::delete('/pacientes/{paciente}', [PacienteController::class, 'destroy'])->name('pacientes.destroy');

/* CITAS ROUTES */


// ----------------------
// Doctores - Diagnósticos
// Controladores:
// - MedicoController
// - DiagnosticoController
// ----------------------


// ----------------------
// Medicinas - Tratamientos
// Controladores:
// - MedicamentoController
// - TratamientoController
// ----------------------
