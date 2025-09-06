@extends('layouts.app')
@section('title', 'Citas')

@section('content')
    <h2>Tabla de citas</h2>

    <a href="{{ route('citas.create') }}" class="btn btn-primary">Agregar Cita</a>

    <table border="1" cellpadding="8" cellspacing="0" class="table">
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
                    <td>
                        <a href="{{ route('citas.edit', $cita->id) }}">Editar</a>
                        <form action="{{ route('citas.destroy', $cita->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                onclick="return confirm('¿Seguro que deseas eliminar esta cita?')">Eliminar</button>
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