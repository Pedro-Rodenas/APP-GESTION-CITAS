<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDiagnosticoRequest;
use App\Http\Requests\UpdateDiagnosticoRequest;
use App\Http\Resources\DiagnosticoResource;
use App\Models\Diagnostico;
use App\Models\Medico;
use App\Models\Paciente;
use Illuminate\Http\Request;

class DiagnosticoController extends Controller
{
    // Listar diagnósticos
    public function index(Request $request)
    {
        $diagnosticos = Diagnostico::with(['paciente', 'medico'])->get();

        if ($request->wantsJson()) {
            return DiagnosticoResource::collection($diagnosticos);
        }

        return view('sistema.diagnosticos.diagnosticos_listar', compact('diagnosticos'));
    }

    // Vista crear
    public function create()
    {
        $pacientes = Paciente::all();
        $medicos = Medico::all();
        return view('sistema.diagnosticos.diagnosticos_crear', compact('pacientes', 'medicos'));
    }

    // Guardar
    public function store(StoreDiagnosticoRequest $request)
    {
        $diagnostico = Diagnostico::create($request->validated());

        if ($request->wantsJson()) {
            return response()->json([
                'message' => 'Diagnóstico creado correctamente',
                'diagnostico' => new DiagnosticoResource($diagnostico)
            ], 201);
        }

        return redirect()->route('diagnosticos.index')
            ->with('success', 'Diagnóstico creado correctamente');
    }

    // Vista editar
    public function edit(Diagnostico $diagnostico)
    {
        $pacientes = Paciente::all();
        $medicos = Medico::all();
        return view('sistema.diagnosticos.diagnosticos_editar', compact('diagnostico', 'pacientes', 'medicos'));
    }

    // Actualizar
    public function update(UpdateDiagnosticoRequest $request, Diagnostico $diagnostico)
    {
        $diagnostico->update($request->validated());

        if ($request->wantsJson()) {
            return response()->json([
                'message' => 'Diagnóstico actualizado correctamente',
                'diagnostico' => new DiagnosticoResource($diagnostico)
            ], 200);
        }

        return redirect()->route('diagnosticos.index')
            ->with('success', 'Diagnóstico actualizado correctamente');
    }

    // Eliminar
    public function destroy(Request $request, Diagnostico $diagnostico)
    {
        $diagnostico->delete();

        if ($request->wantsJson()) {
            return response()->json([
                'message' => 'Diagnóstico eliminado correctamente'
            ], 200);
        }

        return redirect()->route('diagnosticos.index')
            ->with('success', 'Diagnóstico eliminado correctamente');
    }

    public function search(Request $request)
    {
        $term = $request->input('q');
        $diagnosticos = Diagnostico::search($term)->get();

        if ($request->wantsJson()) {
            return response()->json($diagnosticos);
        }

        return view('sistema.diagnosticos.diagnosticos_listar', compact('diagnosticos', 'term'));
    }
}
