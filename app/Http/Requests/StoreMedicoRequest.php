<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMedicoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre'            => 'required|string|max:100',
            'apellido'          => 'required|string|max:100',
            'especialidad'      => 'required|string|max:100',
            'telefono'          => 'nullable|string|max:20',
            'email'             => 'required|email|max:150|unique:medicos,email',
            'licencia'          => 'required|string|max:50|unique:medicos,licencia',
            'años_experiencia'  => 'required|integer|min:0',
        ];
    }
}
