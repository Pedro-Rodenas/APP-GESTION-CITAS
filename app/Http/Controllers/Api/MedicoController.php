<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMedicoRequest;
use App\Http\Requests\UpdateMedicoRequest;
use App\Http\Resources\MedicoResource;
use App\Models\Medico;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\String_;

class MedicoController extends Controller
{
    public function index(Request $request)
    {
        $medicos = Medico::all();
        if (request()->wantsJson()) {
            return MedicoResource::collection($medicos);
        }
        return view('sistema.medicos.medicos_listar', compact('medicos'));
    }


    public function store(StoreMedicoRequest $request)
    {
        $medico = Medico::create($request->validated());
        if ($request->wantsJson()) {
            return response()->json([
                "message" => "Médico creado con Json",
                "medico" => new MedicoResource($medico)
            ]);
        }
        return redirect()
            ->route('medicos.index')
            ->with('success', 'Médico creado correctament');
    }
    
    public function create()
    {

        return view('sistema.medicos.medicos_crear');
    }

    public function search(Request $request)
    {
        $term = $request->input('q');
        $medicos = Medico::search($term)->get();

        if ($request->wantsJson()) {
            return MedicoResource::collection($medicos);
        }

        return view('sistema.medicos.medicos_listar', compact('medicos', 'term'));
    }


    public function update(UpdateMedicoRequest $request, Medico $medico)
    {
        $medico->update($request->validated());
        if ($request->wantsJson()) {
            return response()->json([
                "message" => "Médico Actualizado desde Json",
                "medico_update" => new MedicoResource($medico)
            ]);
        }
        return redirect()
            ->route('medicos.index')
            ->with("success", "Médico actualizado correctamente");
    }

    public function edit(Medico $medico)
    {
        return view('sistema.medicos.medicos_editar', compact('medico'));
    }


    public function destroy(Request $request, Medico $medico)
    {
        $medico->delete();
        if ($request->wantsJson()) {
            return response()->json([
                'message' => 'Médico eliminado correctamente'
            ], 200);
        }
        return redirect()
            ->route('medicos.index')
            ->with('success', 'Médico eliminado correctamente');
    }
}
