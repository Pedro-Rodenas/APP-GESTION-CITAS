<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTratamientoRequest;
use App\Http\Requests\UpdateTratamientoRequest;
use App\Models\Tratamiento;
use App\Models\Diagnostico;
use App\Models\Medico;
use Illuminate\Http\Request;

class TratamientoController extends Controller
{
    /* Listar tratamientos */
    public function index(Request $request)
    {
        $tratamientos = Tratamiento::with(['diagnostico', 'medico'])->get();

        if ($request->wantsJson()) {
            return response()->json($tratamientos, 200);
        }

        return view('sistema.tratamientos.tratamientos_listar', compact('tratamientos'));
    }

    /* Mostrar formulario de creación */
    public function create()
    {
        $diagnosticos = Diagnostico::all();
        $medicos = Medico::all();

        return view('sistema.tratamientos.tratamientos_crear', compact('diagnosticos', 'medicos'));
    }

    /* Guardar nuevo tratamiento */
    public function store(StoreTratamientoRequest $request)
    {
        $tratamiento = Tratamiento::create($request->validated());

        if ($request->wantsJson()) {
            return response()->json($tratamiento->load(['diagnostico', 'medico']), 201);
        }

        return redirect()->route('tratamientos.index')->with('success', 'Tratamiento creado correctamente');
    }

    /* Mostrar un tratamiento */
    public function show(Request $request, $id)
    {
        $tratamiento = Tratamiento::with(['diagnostico', 'medico'])->find($id);

        if (!$tratamiento) {
            return $request->wantsJson()
                ? response()->json(['message' => 'Tratamiento no encontrado'], 404)
                : response('Tratamiento no encontrado', 404);
        }

        return $request->wantsJson()
            ? response()->json($tratamiento, 200)
            : view('sistema.tratamientos.tratamientos_show', compact('tratamiento'));
    }

    /* Mostrar formulario de edición */
    public function edit($id)
    {
        $tratamiento = Tratamiento::findOrFail($id);
        $diagnosticos = Diagnostico::all();
        $medicos = Medico::all();

        return view('sistema.tratamientos.tratamientos_editar', compact('tratamiento', 'diagnosticos', 'medicos'));
    }

    /* Actualizar tratamiento */
    public function update(UpdateTratamientoRequest $request, $id)
    {
        $tratamiento = Tratamiento::findOrFail($id);
        $tratamiento->update($request->validated());

        if ($request->wantsJson()) {
            return response()->json($tratamiento->load(['diagnostico', 'medico']), 200);
        }

        return redirect()->route('tratamientos.index')->with('success', 'Tratamiento actualizado correctamente');
    }

    /* Eliminar tratamiento */
    public function destroy(Request $request, $id)
    {
        $tratamiento = Tratamiento::findOrFail($id);
        $tratamiento->delete();

        if ($request->wantsJson()) {
            return response()->json(['message' => 'Tratamiento eliminado correctamente'], 200);
        }

        return redirect()->route('tratamientos.index')->with('success', 'Tratamiento eliminado correctamente');
    }
}
