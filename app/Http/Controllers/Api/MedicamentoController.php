<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMedicamentoRequest;
use App\Http\Requests\UpdateMedicamentoRequest;
use App\Models\Medicamento;
use App\Models\Tratamiento;
use Illuminate\Http\Request;

class MedicamentoController extends Controller
{
    /* Listar medicamentos */
    public function index(Request $request)
    {
        $medicamentos = Medicamento::with('tratamiento')->get();

        if ($request->wantsJson()) {
            return response()->json($medicamentos, 200);
        }

        return view('sistema.medicamentos.medicamentos_listar', compact('medicamentos'));
    }

    /* Mostrar formulario de creación */
    public function create()
    {
        $tratamientos = Tratamiento::all();
        return view('sistema.medicamentos.medicamentos_crear', compact('tratamientos'));
    }

    /* Guardar nuevo medicamento */
    public function store(StoreMedicamentoRequest $request)
    {
        $medicamento = Medicamento::create($request->validated());

        if ($request->wantsJson()) {
            return response()->json($medicamento->load('tratamiento'), 201);
        }

        return redirect()->route('medicamentos.index')->with('success', 'Medicamento creado correctamente');
    }

    /* Mostrar un medicamento */
    public function show(Request $request, $id)
    {
        $medicamento = Medicamento::with('tratamiento')->find($id);

        if (!$medicamento) {
            return $request->wantsJson()
                ? response()->json(['message' => 'Medicamento no encontrado'], 404)
                : response('Medicamento no encontrado', 404);
        }

        return $request->wantsJson()
            ? response()->json($medicamento, 200)
            : view('sistema.medicamentos.medicamentos_show', compact('medicamento'));
    }

    /* Mostrar formulario de edición */
    public function edit($id)
    {
        $medicamento = Medicamento::findOrFail($id);
        $tratamientos = Tratamiento::all();

        return view('sistema.medicamentos.medicamentos_editar', compact('medicamento', 'tratamientos'));
    }

    /* Actualizar medicamento */
    public function update(UpdateMedicamentoRequest $request, $id)
    {
        $medicamento = Medicamento::findOrFail($id);
        $medicamento->update($request->validated());

        if ($request->wantsJson()) {
            return response()->json($medicamento->load('tratamiento'), 200);
        }

        return redirect()->route('medicamentos.index')->with('success', 'Medicamento actualizado correctamente');
    }

    /* Eliminar medicamento */
    public function destroy(Request $request, $id)
    {
        $medicamento = Medicamento::findOrFail($id);
        $medicamento->delete();

        if ($request->wantsJson()) {
            return response()->json(['message' => 'Medicamento eliminado correctamente'], 200);
        }

        return redirect()->route('medicamentos.index')->with('success', 'Medicamento eliminado correctamente');
    }
}
