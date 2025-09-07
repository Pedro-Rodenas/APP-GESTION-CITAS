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
    public function messages()
    {
        return[
            'nombre.required' => "Por favor digite un nombre",
            'nombre.string' => "No coloques números o simbolos raros",
            'nombre.max' => "El nombre no debe superar los 100 dígitos",
            'apellido.required' => "Por favor dígite un apellido",
            'apellido.string' => "No coloques números o simbolos raros", 
            'apellido.max' => "El apellido no debe superar los 100 dígios",
            'especialidad.required' => "Por favor digite un especialidad",
            'especialidad.string' => "No coloques números o simbolos raros",
            'especialidad.max' => "El especialidad no debe superar los 100 dígitos",
            'telefono.required' => "Por favor digite un telefono",
            'telefono.max' => "El telefono no debe superar los 20 dígitos",
            'email.required' => "Por favor digite un email",
            'email.email' => "Por favor que se aun email valido",
            'email.max' => "El email no debe superar los 150 dígitos",
            'años_experiencia.required' => "Por favor este campo es requerido",
            'años_experiencia.integer' => "Por favor solo digite números",
            'años_experiencia.min' => "No es posible tener años de experiencia en negativos",
        ];
    }
}
