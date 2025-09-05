<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PacienteController;
use App\Http\Controllers\Api\MedicoController;
use App\Http\Controllers\Api\CitaController;
use App\Http\Controllers\Api\DiagnosticoController;
use App\Http\Controllers\Api\TratamientoController;
use App\Http\Controllers\Api\MedicamentoController;

Route::apiResource('pacientes', PacienteController::class);
Route::apiResource('medicos', MedicoController::class);
Route::apiResource('citas', CitaController::class);
Route::apiResource('diagnosticos', DiagnosticoController::class);
Route::apiResource('tratamientos', TratamientoController::class);
Route::apiResource('medicamentos', MedicamentoController::class);
