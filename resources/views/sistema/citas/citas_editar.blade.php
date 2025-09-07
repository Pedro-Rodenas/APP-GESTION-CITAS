@extends('layouts.app')
@section('title', 'Editar Cita')

@section('content')
    <h2>Editar cita</h2>

    <form action="{{ route('citas.update', $cita->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" value="{{ old('fecha', $cita->fecha) }}" required><br>

        <label for="motivo">Motivo:</label>
        <input type="text" name="motivo" value="{{ old('motivo', $cita->motivo) }}" required><br>

        <label for="paciente_id">Paciente:</label>
        <select name="paciente_id" required>
            @foreach($pacientes as $paciente)
                <option value="{{ $paciente->id }}" {{ $paciente->id == $cita->paciente_id ? 'selected' : '' }}>
                    {{ $paciente->nombre }} {{ $paciente->apellido }}
                </option>
            @endforeach
        </select><br>

        <label for="medico_id">Médico:</label>
        <select name="medico_id" required>
            @foreach($medicos as $medico)
                <option value="{{ $medico->id }}" {{ $medico->id == $cita->medico_id ? 'selected' : '' }}>
                    {{ $medico->nombre }} {{ $medico->apellido }}
                </option>
            @endforeach
        </select><br>

        <label for="estado">Estado:</label>
        <select name="estado" required>
            <option value="pendiente" {{ $cita->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
            <option value="confirmada" {{ $cita->estado == 'confirmada' ? 'selected' : '' }}>Confirmada</option>
            <option value="atendida" {{ $cita->estado == 'atendida' ? 'selected' : '' }}>Atendida</option>
            <option value="cancelada" {{ $cita->estado == 'cancelada' ? 'selected' : '' }}>Cancelada</option>
        </select><br>

        <label for="observaciones">Observaciones:</label>
        <textarea name="observaciones">{{ old('observaciones', $cita->observaciones) }}</textarea><br>

        <label for="sala">Sala:</label>
        <input type="text" name="sala" value="{{ old('sala', $cita->sala) }}"><br>

        <button type="submit">Actualizar</button>
    </form>
@endsection