<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMedicoRequest;
use App\Http\Requests\UpdateMedicoRequest;
use App\Http\Resources\MedicoResource;
use App\Models\Medico;
use Illuminate\Http\Request;

class MedicoController extends Controller
{
    public function index()
    {
        return MedicoResource::collection(Medico::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'especialidad' => 'required|string|max:100',
            'telefono' => 'nullable|string|max:20',
            'email' => 'required|email|max:150|unique:medicos,email',
            'licencia' => 'required|string|max:50|unique:medicos,licencia',
            'años_experiencia' => 'required|integer|min:0',
        ]);

        $medico = Medico::create($validated);

        return redirect()->route('doctors.regstrar')->with('success', 'Doctor registrado correctamente');
    }

    public function show(Medico $medico)
    {
        return new MedicoResource($medico);
    }

    public function update(UpdateMedicoRequest $request, Medico $medico)
    {
        $medico->update($request->validated());
        return new MedicoResource($medico);
    }

    public function destroy(Medico $medico)
    {
        $medico->delete();
        return response()->noContent();
    }
}
