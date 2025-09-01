<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTratamientoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre'                    => 'required|string|max:100',
            'descripcion'               => 'required|string',
            'duracion'                  => 'required|string|max:100',
            'diagnostico_id'            => 'required|exists:diagnosticos,id',
            'medico_id'                 => 'required|exists:medicos,id',
            'estado'                    => 'required|string|in:activo,inactivo,finalizado',
            'frecuencia_administracion' => 'required|string|max:100',
        ];
    }
}
