<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diagnostico extends Model
{
    protected $table = 'diagnosticos';

    protected $fillable = [
        'descripcion',
        'fecha',
        'paciente_id',
        'medico_id',
        'gravedad',
        'recomendaciones',
        'tipo_diagnostico',
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'paciente_id');
    }

    public function medico()
    {
        return $this->belongsTo(Medico::class, 'medico_id');
    }

    public function tratamientos()
    {
        return $this->hasMany(Tratamiento::class, 'diagnostico_id');
    }
    public function scopeSearch($query, $term)
    {
        $columns = ['descripcion', 'tipo_diagnostico', 'gravedad'];
        $query->where(function ($q) use ($columns, $term) {
            foreach ($columns as $column) {
                $q->orWhere($column, 'like', "%{$term}%");
            }
        });

        // Buscar en relaciones
        $query->orWhereHas('paciente', function ($q) use ($term) {
            $q->where('nombre', 'like', "%{$term}%")
              ->orWhere('apellido', 'like', "%{$term}%");
        });

        $query->orWhereHas('medico', function ($q) use ($term) {
            $q->where('nombre', 'like', "%{$term}%")
              ->orWhere('apellido', 'like', "%{$term}%");
        });

        return $query;
    }
}
