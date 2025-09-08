@extends('layouts.app')
@section('title', 'Editar Cita')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/citas.css') }}">
@endsection

@section('content')
<div>
    <h2>Editar cita</h2>

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

    <form action="{{ route('citas.update', $cita->id) }}" method="POST" class="formulario-paciente">
        @csrf
        @method('PUT')

        <div class="group-control">
            <label for="fecha">Fecha</label>
            <input type="date" name="fecha" id="fecha" value="{{ old('fecha', $cita->fecha) }}" required>
        </div>

        <div class="group-control">
            <label for="motivo">Motivo</label>
            <input type="text" name="motivo" id="motivo" value="{{ old('motivo', $cita->motivo) }}" required>
        </div>

        <div class="group-control">
            <label for="paciente_id">Paciente</label>
            <select name="paciente_id" id="paciente_id" required>
                @foreach($pacientes as $paciente)
                    <option value="{{ $paciente->id }}" {{ $paciente->id == $cita->paciente_id ? 'selected' : '' }}>
                        {{ $paciente->nombre }} {{ $paciente->apellido }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="group-control">
            <label for="medico_id">Médico</label>
            <select name="medico_id" id="medico_id" required>
                @foreach($medicos as $medico)
                    <option value="{{ $medico->id }}" {{ $medico->id == $cita->medico_id ? 'selected' : '' }}>
                        {{ $medico->nombre }} {{ $medico->apellido }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="group-control">
            <label for="estado">Estado</label>
            <select name="estado" id="estado" required>
                <option value="pendiente" {{ $cita->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                <option value="confirmada" {{ $cita->estado == 'confirmada' ? 'selected' : '' }}>Confirmada</option>
                <option value="atendida" {{ $cita->estado == 'atendida' ? 'selected' : '' }}>Atendida</option>
                <option value="cancelada" {{ $cita->estado == 'cancelada' ? 'selected' : '' }}>Cancelada</option>
            </select>
        </div>

        <div class="group-control">
            <label for="observaciones">Observaciones</label>
            <textarea name="observaciones" id="observaciones">{{ old('observaciones', $cita->observaciones) }}</textarea>
        </div>

        <div class="group-control">
            <label for="sala">Sala</label>
            <input type="text" name="sala" id="sala" value="{{ old('sala', $cita->sala) }}">
        </div>

        {{-- Botones --}}
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>

    <a href="{{ route('citas.index') }}" class="btn btn-secondary">Cancelar</a>
</div>
@endsection
