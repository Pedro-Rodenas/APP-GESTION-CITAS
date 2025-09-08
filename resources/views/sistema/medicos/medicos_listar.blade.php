@extends('layouts.app')
@section('title', 'Médicos')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/medicos.css') }}">
@endsection

@section('content')
<section class="medicos-section">
    <h2>Tabla de Médicos</h2>

    <a href="{{ route('medicos.create') }}" class="btn btn-primary">Crear Médico</a>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Formulario de búsqueda --}}
    <form action="{{ route('medicos.search') }}" method="GET" class="form-busqueda">
        <input type="text" name="q" value="{{ $term ?? '' }}" placeholder="Buscar médico..." required>
        <button type="submit" class="btn btn-primary btn-buscar-search">Buscar</button>
        <a href="{{ route('medicos.index') }}" class="btn btn-secondary btn-limpiar">Limpiar</a>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Especialidad</th>
                <th>Teléfono</th>
                <th>Experiencia</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($medicos as $medico)
            <tr>
                <td>{{ $medico->id }}</td>
                <td>{{ $medico->nombre }}</td>
                <td>{{ $medico->especialidad }}</td>
                <td>{{ $medico->telefono }}</td>
                <td>{{ $medico->años_experiencia }}</td>
                <td class="acciones">
                    <a href="{{ route('medicos.edit', $medico->id) }}" class="btn btn-editar">Editar</a>

                    <form action="{{ route('medicos.destroy', $medico->id) }}" method="POST" class="form-inline" onsubmit="return confirm('¿Seguro que deseas eliminar este médico?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-eliminar">Eliminar</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6">No hay médicos registrados.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</section>
@endsection