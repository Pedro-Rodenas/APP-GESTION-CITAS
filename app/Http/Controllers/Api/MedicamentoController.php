<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMedicamentoRequest;
use App\Http\Requests\UpdateMedicamentoRequest;
use App\Http\Resources\MedicamentoResource;
use App\Models\Medicamento;
use Illuminate\Http\Request;

class MedicamentoController extends Controller
{
    public function index()
    {
        return MedicamentoResource::collection(Medicamento::with('tratamiento')->get());
    }

    public function store(StoreMedicamentoRequest $request)
    {
        $medicamento = Medicamento::create($request->validated());
        return new MedicamentoResource($medicamento->load('tratamiento'));
    }

    public function show(Medicamento $medicamento)
    {
        return new MedicamentoResource($medicamento->load('tratamiento'));
    }

    public function update(UpdateMedicamentoRequest $request, Medicamento $medicamento)
    {
        $medicamento->update($request->validated());
        return new MedicamentoResource($medicamento->load('tratamiento'));
    }

    public function destroy(Medicamento $medicamento)
    {
        $medicamento->delete();
        return response()->noContent();
    }
}
