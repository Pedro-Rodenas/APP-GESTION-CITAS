<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCitaRequest;
use App\Http\Requests\UpdateCitaRequest;
use App\Http\Resources\CitaResource;
use App\Models\Cita;
use Illuminate\Http\Request;

class CitaController extends Controller
{
    public function index()
    {
        return CitaResource::collection(Cita::with(['paciente', 'medico'])->get());
    }

    public function store(StoreCitaRequest $request)
    {
        $cita = Cita::create($request->validated());
        return new CitaResource($cita->load(['paciente', 'medico']));
    }

    public function show(Cita $cita)
    {
        return new CitaResource($cita->load(['paciente', 'medico']));
    }

    public function update(UpdateCitaRequest $request, Cita $cita)
    {
        $cita->update($request->validated());
        return new CitaResource($cita->load(['paciente', 'medico']));
    }

    public function destroy(Cita $cita)
    {
        $cita->delete();
        return response()->noContent();
    }
}
