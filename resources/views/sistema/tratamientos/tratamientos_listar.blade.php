@extends('layouts.app')
@section('title', 'Tratamientos')

@section('content')
    <h2>Tabla de Tratamientos</h2>

    <a href="{{ route('tratamientos.create') }}" class="btn btn-primary mb-3">Nuevo Tratamiento</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Diagnóstico</th>
                <th>Médico</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tratamientos as $tratamiento)
                <tr>
                    <td>{{ $tratamiento->id }}</td>
                    <td>{{ $tratamiento->nombre }}</td>
                    <td>{{ $tratamiento->diagnostico->descripcion ?? 'N/A' }}</td>
                    <td>{{ $tratamiento->medico->nombre ?? 'N/A' }}</td>
                    <td>{{ ucfirst($tratamiento->estado) }}</td>
                    <td>
                        <a href="{{ route('tratamientos.edit', $tratamiento->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('tratamientos.destroy', $tratamiento->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('¿Eliminar este tratamiento?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection