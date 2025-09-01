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

    public function store(Request $request)
    {
        $validated = $request->validate([
            'fecha' => 'required|date',
            'motivo' => 'required|string|max:255',
            'paciente_id' => 'required|exists:pacientes,id',
            'medico_id' => 'required|exists:medicos,id',
            'estado' => 'required|string|in:pendiente,confirmada,atendida,cancelada',
            'observaciones' => 'nullable|string',
            'sala' => 'nullable|string|max:100',
        ]);

        $medico = Cita::create($validated);

        return redirect()->route('appointment.registrar')->with('success', 'Doctor registrado correctamente');
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

    public function create()
    {
        $pacientes = \App\Models\Paciente::all();
        $medicos = \App\Models\Medico::all();
        $estados = ['pendiente', 'confirmada', 'atendida', 'cancelada'];

        return view('appointment.registrar', compact('pacientes', 'medicos', 'estados'));
    }
}
