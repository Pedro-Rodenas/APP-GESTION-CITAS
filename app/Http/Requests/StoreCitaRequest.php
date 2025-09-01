<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCitaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'fecha'         => 'required|date',
            'motivo'        => 'required|string|max:255',
            'paciente_id'   => 'required|exists:pacientes,id',
            'medico_id'     => 'required|exists:medicos,id',
            'estado'        => 'required|string|in:pendiente,confirmada,atendida,cancelada',
            'observaciones' => 'nullable|string',
            'sala'          => 'nullable|string|max:100',
        ];
    }
}
