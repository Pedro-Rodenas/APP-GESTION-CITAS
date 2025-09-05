<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CitaResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'            => $this->id,
            'fecha'         => $this->fecha,
            'motivo'        => $this->motivo,
            'estado'        => $this->estado,
            'observaciones' => $this->observaciones,
            'sala'          => $this->sala,
            'paciente'      => new PacienteResource($this->whenLoaded('paciente')),
            'medico'        => new MedicoResource($this->whenLoaded('medico')),
            'created_at'    => $this->created_at,
            'updated_at'    => $this->updated_at,
        ];
    }
}
