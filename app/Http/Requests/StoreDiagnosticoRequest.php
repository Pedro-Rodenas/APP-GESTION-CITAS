<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDiagnosticoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'descripcion'       => 'required|string',
            'fecha'             => 'required|date',
            'paciente_id'       => 'required|exists:pacientes,id',
            'medico_id'         => 'required|exists:medicos,id',
            'gravedad'          => 'required|string|in:leve,moderada,grave,critica',
            'recomendaciones'   => 'nullable|string',
            'tipo_diagnostico'  => 'required|string|max:100',
        ];
    }
}
