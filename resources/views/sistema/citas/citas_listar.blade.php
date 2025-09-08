@extends('layouts.app')
@section('title', 'Citas')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/citas.css') }}">
@endsection

@section('content')
<h2>Tabla de Citas</h2>

<!-- Botón agregar cita -->
<a href="{{ route('citas.create') }}" class="btn btn-primary">Agregar Cita</a>

<!-- Tabla de citas -->
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Fecha</th>
            <th>Motivo</th>
            <th>Paciente</th>
            <th>Médico</th>
            <th>Estado</th>
            <th>Observaciones</th>
            <th>Sala</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($citas as $cita)
        <tr>
            <td>{{ $cita->id }}</td>
            <td>{{ $cita->fecha }}</td>
            <td>{{ $cita->motivo }}</td>
            <td>{{ $cita->paciente->nombre }} {{ $cita->paciente->apellido }}</td>
            <td>{{ $cita->medico->nombre }} {{ $cita->medico->apellido }}</td>
            <td>{{ $cita->estado }}</td>
            <td>{{ $cita->observaciones ?? '-' }}</td>
            <td>{{ $cita->sala ?? '-' }}</td>
            <td class="acciones">
                <!-- Botón Editar -->
                <a href="{{ route('citas.edit', $cita->id) }}" class="btn-editar">Editar</a>

                <!-- Botón Eliminar -->
                <form action="{{ route('citas.destroy', $cita->id) }}" method="POST" class="form-inline" onsubmit="return confirm('¿Seguro que deseas eliminar esta cita?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-eliminar">Eliminar</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="9">No hay citas registradas</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection