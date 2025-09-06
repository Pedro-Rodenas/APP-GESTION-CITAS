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
    public function index(Request $request)
    {
        $pacientes = Paciente::all();

        if ($request->wantsJson()) {
            return response()->json($pacientes, 200);
        }

        return view('sistema.pacientes.pacientes_listar', compact('pacientes'));
    }

    /* Solo será para visualizar en web */
    public function create()
    {
        return view('sistema.pacientes.pacientes_crear');
    }

    /* Metodo para añadir */
    public function store(StorePacienteRequest $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'fecha_nacimiento' => 'required|date',
            'genero' => 'required|string|max:10',
            'telefono' => 'nullable|string|max:20',
            'direccion' => 'nullable|string|max:255',
            'tipo_sangre' => 'nullable|string|max:5',
        ]);

        $paciente = Paciente::create($validated);

        if ($request->wantsJson()) {
            return response()->json([
                'message' => 'Paciente creado con json',
                'paciente' => $paciente
            ], 201);
        }

        return redirect()->route('pacientes.index')
            ->with('success', 'Paciente creado con web');
    }

    /* Mostrar detalles del paciente */
    public function show(Request $request, $id)
    {
        $paciente = Paciente::find($id);

        if (!$paciente) {
            return $request->wantsJson()
                ? response()->json(['message' => 'Paciente no encontrado'], 404)
                : response('Paciente no encontrado', 404);
        }

        return response()->json($paciente, 200);
    }

    /* Metodo para editar */
    public function edit(Paciente $paciente)
    {
        return view('sistema.pacientes.pacientes_editar', compact('paciente'));
    }

    /* Metodo para actualizar */
    public function update(UpdatePacienteRequest $request, Paciente $paciente)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'fecha_nacimiento' => 'required|date',
            'genero' => 'required|string|max:10',
            'telefono' => 'nullable|string|max:20',
            'direccion' => 'nullable|string|max:255',
            'tipo_sangre' => 'nullable|string|max:5',
        ]);

        $paciente->update($validated);

        if ($request->wantsJson()) {
            return response()->json([
                'message' => 'Paciente actualizado correctamente',
                'paciente' => $paciente
            ], 200);
        }

        return redirect()->route('pacientes.index')
            ->with('success', 'Paciente actualizado correctamente');
    }

    /* Metodo para eliminar */
    public function destroy(Request $request, Paciente $paciente)
    {
        $paciente->delete();

        if ($request->wantsJson()) {
            return response()->json([
                'message' => 'Paciente eliminado correctamente'
            ], 200);
        }

        return redirect()->route('pacientes.index')
            ->with('success', 'Paciente eliminado correctamente');
    }
}
