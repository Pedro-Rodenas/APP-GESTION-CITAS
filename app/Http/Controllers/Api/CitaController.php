<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCitaRequest;
use App\Http\Requests\UpdateCitaRequest;
use App\Http\Resources\CitaResource;
use App\Models\Cita;
use App\Models\Medico;
use App\Models\Paciente;
use Illuminate\Http\Request;

class CitaController extends Controller
{
    public function index(Request $request)
    {
        $citas = Cita::with(['paciente', 'medico'])->get();

        if ($request->wantsJson()) {
            return response()->json($citas, 200);
        }

        return view('sistema.citas.citas_listar', compact('citas'));
    }

    /* Muestra el formulario */
    public function create()
    {
        $pacientes = Paciente::all();
        $medicos = Medico::all();

        return view('sistema.citas.citas_crear', compact('pacientes', 'medicos'));
    }

    /* Para guardar una cita */
    public function store(StoreCitaRequest $request)
    {
        $cita = Cita::create($request->validated());

        if ($request->wantsJson()) {
            return response()->json($cita->load(['paciente', 'medico']), 201);
        }

        return redirect()->route('citas.index')->with('success', 'Cita creada correctamente');
    }

    /* Mostrar detalles de una cita */
    public function show(Request $request, $id)
    {
        $cita = Cita::with(['paciente', 'medico'])->find($id);

        if (!$cita) {
            return $request->wantsJson()
                ? response()->json(['message' => 'Cita no encontrada'], 404)
                : redirect()->route('citas.index')->with('error', 'Cita no encontrada');
        }

        if ($request->wantsJson()) {
            return response()->json($cita, 200);
        }

        return view('sistema.citas.citas_ver', compact('cita'));
    }

    /* Mostrar formulario de edición */
    public function edit($id)
    {
        $cita = Cita::findOrFail($id);
        $pacientes = Paciente::all();
        $medicos = Medico::all();

        return view('sistema.citas.citas_editar', compact('cita', 'pacientes', 'medicos'));
    }

    /* Actualizar cita */
    public function update(UpdateCitaRequest $request, $id)
    {
        $cita = Cita::findOrFail($id);
        $cita->update($request->validated());

        if ($request->wantsJson()) {
            return response()->json($cita->load(['paciente', 'medico']), 200);
        }

        return redirect()->route('citas.index')->with('success', 'Cita actualizada correctamente');
    }

    /* Eliminar cita */
    public function destroy(Request $request, $id)
    {
        $cita = Cita::findOrFail($id);
        $cita->delete();

        if ($request->wantsJson()) {
            return response()->json(['message' => 'Cita eliminada'], 200);
        }

        return redirect()->route('citas.index')->with('success', 'Cita eliminada correctamente');
    }
}
