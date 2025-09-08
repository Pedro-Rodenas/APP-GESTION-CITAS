@extends('layouts.app')
@section('title', 'Tratamientos')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/tratamientos.css') }}">
@endsection

@section('content')
<div>
    <h2>Tabla de Tratamientos</h2>

    <a href="{{ route('tratamientos.create') }}" class="btn btn-primary mb-3">Nuevo Tratamiento</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

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
            @forelse ($tratamientos as $tratamiento)
                <tr>
                    <td>{{ $tratamiento->id }}</td>
                    <td>{{ $tratamiento->nombre }}</td>
                    <td>{{ $tratamiento->diagnostico->descripcion ?? 'N/A' }}</td>
                    <td>{{ $tratamiento->medico->nombre ?? 'N/A' }}</td>
                    <td>{{ ucfirst($tratamiento->estado) }}</td>
                    <td class="acciones">
                        <a href="{{ route('tratamientos.edit', $tratamiento->id) }}" class="btn-editar">Editar</a>
                        <form action="{{ route('tratamientos.destroy', $tratamiento->id) }}" method="POST" class="form-inline" onsubmit="return confirm('¿Eliminar este tratamiento?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-eliminar">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align:center; color:red;">No hay tratamientos registrados</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
