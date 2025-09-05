<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMedicamentoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre'               => 'required|string|max:100',
            'dosis'                => 'required|string|max:100',
            'frecuencia'           => 'required|string|max:100',
            'duracion'             => 'required|string|max:100',
            'tratamiento_id'       => 'required|exists:tratamientos,id',
            'proveedor'            => 'required|string|max:100',
            'efectos_secundarios'  => 'nullable|string',
        ];
    }
}
