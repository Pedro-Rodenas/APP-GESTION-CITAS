@extends('layouts.app')
@section('title', 'Crear Tratamiento')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/tratamientos.css') }}">
@endsection

@section('content')
<div>
    <h2>Crear Tratamiento</h2>

    {{-- Mensajes de error --}}
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('tratamientos.store') }}" method="POST" class="formulario-paciente">
        @csrf

        <div class="group-control">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" required>
        </div>

        <div class="group-control">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" id="descripcion" required>{{ old('descripcion') }}</textarea>
        </div>

        <div class="group-control">
            <label for="duracion">Duración</label>
            <input type="text" name="duracion" id="duracion" value="{{ old('duracion') }}" required>
        </div>

        <div class="group-control">
            <label for="diagnostico_id">Diagnóstico</label>
            <select name="diagnostico_id" id="diagnostico_id" required>
                <option value="">Seleccione un diagnóstico</option>
                @foreach($diagnosticos as $diagnostico)
                <option value="{{ $diagnostico->id }}" {{ old('diagnostico_id') == $diagnostico->id ? 'selected' : '' }}>
                    {{ $diagnostico->descripcion }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="group-control">
            <label for="medico_id">Médico</label>
            <select name="medico_id" id="medico_id" required>
                <option value="">Seleccione un médico</option>
                @foreach($medicos as $medico)
                <option value="{{ $medico->id }}" {{ old('medico_id') == $medico->id ? 'selected' : '' }}>
                    {{ $medico->nombre }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="group-control">
            <label for="estado">Estado</label>
            <select name="estado" id="estado" required>
                <option value="activo" {{ old('estado') == 'activo' ? 'selected' : '' }}>Activo</option>
                <option value="inactivo" {{ old('estado') == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                <option value="finalizado" {{ old('estado') == 'finalizado' ? 'selected' : '' }}>Finalizado</option>
            </select>
        </div>

        <div class="group-control">
            <label for="frecuencia_administracion">Frecuencia de Administración</label>
            <input type="text" name="frecuencia_administracion" id="frecuencia_administracion"
                value="{{ old('frecuencia_administracion') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
    <a href="{{ route('tratamientos.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Volver a la lista de pacientes
    </a>
</div>
@endsection