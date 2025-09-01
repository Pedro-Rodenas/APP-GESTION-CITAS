<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDiagnosticoRequest;
use App\Http\Requests\UpdateDiagnosticoRequest;
use App\Http\Resources\DiagnosticoResource;
use App\Models\Diagnostico;
use Illuminate\Http\Request;

class DiagnosticoController extends Controller
{
    public function index()
    {
        return DiagnosticoResource::collection(Diagnostico::with(['paciente', 'medico'])->get());
    }

    public function store(StoreDiagnosticoRequest $request)
    {
        $diagnostico = Diagnostico::create($request->validated());
        return new DiagnosticoResource($diagnostico->load(['paciente', 'medico']));
    }

    public function show(Diagnostico $diagnostico)
    {
        return new DiagnosticoResource($diagnostico->load(['paciente', 'medico']));
    }

    public function update(UpdateDiagnosticoRequest $request, Diagnostico $diagnostico)
    {
        $diagnostico->update($request->validated());
        return new DiagnosticoResource($diagnostico->load(['paciente', 'medico']));
    }

    public function destroy(Diagnostico $diagnostico)
    {
        $diagnostico->delete();
        return response()->noContent();
    }
}
