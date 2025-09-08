@extends('layouts.app')
@section('title', 'Editar Diagnóstico')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/diagnosticos.css') }}">
@endsection

@section('content')
<div>
    <h2>Editar Diagnóstico</h2>

    {{-- Mensajes de éxito --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

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

    <form action="{{ route('diagnosticos.update', $diagnostico->id) }}" method="POST" class="formulario-paciente">
        @csrf
        @method('PUT')

        <div class="group-control">
            <label for="paciente_id">Paciente</label>
            <select name="paciente_id" id="paciente_id" required>
                <option value="">--Seleccione un paciente--</option>
                @foreach($pacientes as $paciente)
                    <option value="{{ $paciente->id }}" 
                        {{ old('paciente_id', $diagnostico->paciente_id) == $paciente->id ? 'selected' : '' }}>
                        {{ $paciente->nombre }} {{ $paciente->apellido }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="group-control">
            <label for="medico_id">Médico</label>
            <select name="medico_id" id="medico_id" required>
                <option value="">--Seleccione un médico--</option>
                @foreach($medicos as $medico)
                    <option value="{{ $medico->id }}" 
                        {{ old('medico_id', $diagnostico->medico_id) == $medico->id ? 'selected' : '' }}>
                        {{ $medico->nombre }} {{ $medico->apellido }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="group-control">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" id="descripcion" required>{{ old('descripcion', $diagnostico->descripcion) }}</textarea>
        </div>

        <div class="group-control">
            <label for="gravedad">Gravedad</label>
            <select name="gravedad" id="gravedad" required>
                <option value="">--Seleccione gravedad--</option>
                @foreach(['leve','moderada','grave','critica'] as $nivel)
                    <option value="{{ $nivel }}" 
                        {{ old('gravedad', $diagnostico->gravedad) == $nivel ? 'selected' : '' }}>
                        {{ ucfirst($nivel) }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="group-control">
            <label for="tipo_diagnostico">Tipo de Diagnóstico</label>
            <input type="text" name="tipo_diagnostico" id="tipo_diagnostico" 
                value="{{ old('tipo_diagnostico', $diagnostico->tipo_diagnostico) }}" required>
        </div>

        <div class="group-control">
            <label for="recomendaciones">Recomendaciones</label>
            <textarea name="recomendaciones" id="recomendaciones">{{ old('recomendaciones', $diagnostico->recomendaciones) }}</textarea>
        </div>

        <div class="group-control">
            <label for="fecha">Fecha</label>
            <input type="datetime-local" name="fecha" id="fecha" 
                value="{{ old('fecha', \Carbon\Carbon::parse($diagnostico->fecha)->format('Y-m-d\TH:i')) }}" required>
        </div>

        {{-- Botones --}}
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
    <a href="{{ route('diagnosticos.index') }}" class="btn btn-secondary">Cancelar</a>
</div>
@endsection
