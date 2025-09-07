@extends('layouts.app')
@section('title', 'Crear Cita')

@section('content')
    <h2>Registrar nueva cita</h2>

    <form action="{{ route('citas.store') }}" method="POST">
        @csrf

        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" value="{{ old('fecha') }}" required><br>

        <label for="motivo">Motivo:</label>
        <input type="text" name="motivo" value="{{ old('motivo') }}" required><br>

        <label for="paciente_id">Paciente:</label>
        <select name="paciente_id" required>
            <option value="">Seleccione un paciente</option>
            @foreach($pacientes as $paciente)
                <option value="{{ $paciente->id }}">{{ $paciente->nombre }} {{ $paciente->apellido }}</option>
            @endforeach
        </select><br>

        <label for="medico_id">Médico:</label>
        <select name="medico_id" required>
            <option value="">Seleccione un médico</option>
            @foreach($medicos as $medico)
                <option value="{{ $medico->id }}">{{ $medico->nombre }} {{ $medico->apellido }}</option>
            @endforeach
        </select><br>

        <label for="estado">Estado:</label>
        <select name="estado" required>
            <option value="pendiente">Pendiente</option>
            <option value="confirmada">Confirmada</option>
            <option value="atendida">Atendida</option>
            <option value="cancelada">Cancelada</option>
        </select><br>

        <label for="observaciones">Observaciones:</label>
        <textarea name="observaciones">{{ old('observaciones') }}</textarea><br>

        <label for="sala">Sala:</label>
        <input type="text" name="sala" value="{{ old('sala') }}"><br>

        <button type="submit">Guardar</button>
    </form>
@endsection