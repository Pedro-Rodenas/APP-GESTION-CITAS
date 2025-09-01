<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MedicamentoResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'                 => $this->id,
            'nombre'             => $this->nombre,
            'dosis'              => $this->dosis,
            'frecuencia'         => $this->frecuencia,
            'duracion'           => $this->duracion,
            'proveedor'          => $this->proveedor,
            'efectos_secundarios'=> $this->efectos_secundarios,
            'tratamiento'        => new TratamientoResource($this->whenLoaded('tratamiento')),
            'created_at'         => $this->created_at,
            'updated_at'         => $this->updated_at,
        ];
    }
}
