@extends('layouts.app')
@section('title', 'Crear Tratamiento')

@section('content')
    <h2>Crear Tratamiento</h2>

    <form action="{{ route('tratamientos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label for="duracion" class="form-label">Duración</label>
            <input type="text" name="duracion" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="diagnostico_id" class="form-label">Diagnóstico</label>
            <select name="diagnostico_id" class="form-select" required>
                <option value="">Seleccione un diagnóstico</option>
                @foreach($diagnosticos as $diagnostico)
                    <option value="{{ $diagnostico->id }}">{{ $diagnostico->descripcion }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="medico_id" class="form-label">Médico</label>
            <select name="medico_id" class="form-select" required>
                <option value="">Seleccione un médico</option>
                @foreach($medicos as $medico)
                    <option value="{{ $medico->id }}">{{ $medico->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <select name="estado" class="form-select" required>
                <option value="activo">Activo</option>
                <option value="inactivo">Inactivo</option>
                <option value="finalizado">Finalizado</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="frecuencia_administracion" class="form-label">Frecuencia de Administración</label>
            <input type="text" name="frecuencia_administracion" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
@endsection