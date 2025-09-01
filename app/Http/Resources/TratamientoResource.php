<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TratamientoResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'                        => $this->id,
            'nombre'                    => $this->nombre,
            'descripcion'               => $this->descripcion,
            'duracion'                  => $this->duracion,
            'estado'                    => $this->estado,
            'frecuencia_administracion' => $this->frecuencia_administracion,
            'diagnostico'               => new DiagnosticoResource($this->whenLoaded('diagnostico')),
            'medico'                    => new MedicoResource($this->whenLoaded('medico')),
            'created_at'                => $this->created_at,
            'updated_at'                => $this->updated_at,
        ];
    }
}
