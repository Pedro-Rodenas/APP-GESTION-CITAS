<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PacienteController;
use App\Http\Controllers\Api\MedicoController;
use App\Http\Controllers\Api\CitaController;
use App\Http\Controllers\Api\DiagnosticoController;
use App\Http\Controllers\Api\TratamientoController;
use App\Http\Controllers\Api\MedicamentoController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('pacientes', PacienteController::class);
Route::apiResource('medicos', MedicoController::class);
Route::apiResource('citas', CitaController::class);
Route::apiResource('diagnosticos', DiagnosticoController::class);
Route::apiResource('tratamientos', TratamientoController::class);
Route::apiResource('medicamentos', MedicamentoController::class);
