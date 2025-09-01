<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MedicoResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'               => $this->id,
            'nombre'           => $this->nombre,
            'apellido'         => $this->apellido,
            'especialidad'     => $this->especialidad,
            'telefono'         => $this->telefono,
            'email'            => $this->email,
            'licencia'         => $this->licencia,
            'años_experiencia' => $this->años_experiencia,
            'created_at'       => $this->created_at,
            'updated_at'       => $this->updated_at,
        ];
    }
}
