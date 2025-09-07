@extends('layouts.app')
@section('title', 'Editar Tratamiento')

@section('content')
    <h2>Editar Tratamiento</h2>

    <form action="{{ route('tratamientos.update', $tratamiento->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ $tratamiento->nombre }}" required>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" class="form-control" required>{{ $tratamiento->descripcion }}</textarea>
        </div>

        <div class="mb-3">
            <label for="duracion" class="form-label">Duración</label>
            <input type="text" name="duracion" class="form-control" value="{{ $tratamiento->duracion }}" required>
        </div>

        <div class="mb-3">
            <label for="diagnostico_id" class="form-label">Diagnóstico</label>
            <select name="diagnostico_id" class="form-select" required>
                @foreach($diagnosticos as $diagnostico)
                    <option value="{{ $diagnostico->id }}" {{ $tratamiento->diagnostico_id == $diagnostico->id ? 'selected' : '' }}>
                        {{ $diagnostico->descripcion }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="medico_id" class="form-label">Médico</label>
            <select name="medico_id" class="form-select" required>
                @foreach($medicos as $medico)
                    <option value="{{ $medico->id }}" {{ $tratamiento->medico_id == $medico->id ? 'selected' : '' }}>
                        {{ $medico->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <select name="estado" class="form-select" required>
                <option value="activo" {{ $tratamiento->estado == 'activo' ? 'selected' : '' }}>Activo</option>
                <option value="inactivo" {{ $tratamiento->estado == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                <option value="finalizado" {{ $tratamiento->estado == 'finalizado' ? 'selected' : '' }}>Finalizado</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="frecuencia_administracion" class="form-label">Frecuencia de Administración</label>
            <input type="text" name="frecuencia_administracion" class="form-control"
                value="{{ $tratamiento->frecuencia_administracion }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
@endsection