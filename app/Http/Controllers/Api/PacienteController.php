<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePacienteRequest;
use App\Http\Requests\UpdatePacienteRequest;
use App\Http\Resources\PacienteResource;
use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    public function index()
    {
        $pacientes = Paciente::all();
        return view('patients.index', compact('pacientes'));
    }

public function store(Request $request)
{
    $validated = $request->validate([
        'nombre' => 'required|string|max:255',
        'apellido' => 'required|string|max:255',
        'fecha_nacimiento' => 'required|date',
        'genero' => 'required|string',
        'telefono' => 'required|string|max:15',
        'direccion' => 'required|string|max:255',
        'tipo_sangre' => 'required|string|max:3',
    ]);

    $paciente = Paciente::create($validated);

    return redirect()->route('patients.formulario')->with('success', 'Paciente registrado correctamente ✅');
}

    public function show(Paciente $paciente)
    {
        return new PacienteResource($paciente);
    }

    public function update(UpdatePacienteRequest $request, Paciente $paciente)
    {
        $paciente->update($request->validated());
        return new PacienteResource($paciente);
    }

    public function destroy(Paciente $paciente)
    {
        $paciente->delete();
        return response()->noContent();
    }
}
