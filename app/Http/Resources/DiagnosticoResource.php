<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DiagnosticoResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'              => $this->id,
            'descripcion'     => $this->descripcion,
            'fecha'           => $this->fecha,
            'gravedad'        => $this->gravedad,
            'recomendaciones' => $this->recomendaciones,
            'tipo_diagnostico'=> $this->tipo_diagnostico,
            'paciente'        => new PacienteResource($this->whenLoaded('paciente')),
            'medico'          => new MedicoResource($this->whenLoaded('medico')),
            'created_at'      => $this->created_at,
            'updated_at'      => $this->updated_at,
        ];
    }
}
