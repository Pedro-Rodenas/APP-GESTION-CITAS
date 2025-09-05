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

    public function store(StoreMedicoRequest $request)
    {
        $medico = Medico::create($request->validated());
        return new MedicoResource($medico);
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
