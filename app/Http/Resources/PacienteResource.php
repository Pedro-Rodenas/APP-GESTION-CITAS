<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PacienteResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'              => $this->id,
            'nombre'          => $this->nombre,
            'apellido'        => $this->apellido,
            'fecha_nacimiento'=> $this->fecha_nacimiento,
            'genero'          => $this->genero,
            'telefono'        => $this->telefono,
            'direccion'       => $this->direccion,
            'tipo_sangre'     => $this->tipo_sangre,
            'created_at'      => $this->created_at,
            'updated_at'      => $this->updated_at,
        ];
    }
}
