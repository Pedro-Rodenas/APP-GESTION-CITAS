@extends('layouts.app')
@section('title', 'Crear Cita')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/citas.css') }}">
@endsection

@section('content')
<div>
    <h2>Registrar nueva cita</h2>

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

    <form action="{{ route('citas.store') }}" method="POST" class="formulario-paciente">
        @csrf

        <div class="group-control">
            <label for="fecha">Fecha</label>
            <input type="date" name="fecha" id="fecha" value="{{ old('fecha') }}" required>
        </div>

        <div class="group-control">
            <label for="motivo">Motivo</label>
            <input type="text" name="motivo" id="motivo" value="{{ old('motivo') }}" required>
        </div>

        <div class="group-control">
            <label for="paciente_id">Paciente</label>
            <select name="paciente_id" id="paciente_id" required>
                <option value="">Seleccione un paciente</option>
                @foreach($pacientes as $paciente)
                    <option value="{{ $paciente->id }}">{{ $paciente->nombre }} {{ $paciente->apellido }}</option>
                @endforeach
            </select>
        </div>

        <div class="group-control">
            <label for="medico_id">Médico</label>
            <select name="medico_id" id="medico_id" required>
                <option value="">Seleccione un médico</option>
                @foreach($medicos as $medico)
                    <option value="{{ $medico->id }}">{{ $medico->nombre }} {{ $medico->apellido }}</option>
                @endforeach
            </select>
        </div>

        <div class="group-control">
            <label for="estado">Estado</label>
            <select name="estado" id="estado" required>
                <option value="pendiente">Pendiente</option>
                <option value="confirmada">Confirmada</option>
                <option value="atendida">Atendida</option>
                <option value="cancelada">Cancelada</option>
            </select>
        </div>

        <div class="group-control">
            <label for="observaciones">Observaciones</label>
            <textarea name="observaciones" id="observaciones">{{ old('observaciones') }}</textarea>
        </div>

        <div class="group-control">
            <label for="sala">Sala</label>
            <input type="text" name="sala" id="sala" value="{{ old('sala') }}">
        </div>

        {{-- Botones --}}
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
    <a href="{{ route('citas.index') }}" class="btn btn-secondary">Cancelar</a>
</div>
@endsection
