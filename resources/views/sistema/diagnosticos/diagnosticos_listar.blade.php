@extends('layouts.app')
@section('title', 'Diagnósticos')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/diagnosticos.css') }}">
@endsection

@section('content')
<section>
    <h2>Tabla de Diagnósticos</h2>

    <a class="btn btn-primary" href="{{ route('diagnosticos.create') }}">Crear Diagnóstico</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Formulario de búsqueda --}}
    <form action="{{ route('diagnosticos.search') }}" method="GET" class="form-busqueda">
        <input type="text" name="q" value="{{ $term ?? '' }}" placeholder="Buscar diagnóstico..." required>
        <button type="submit" class="btn btn-primary btn-buscar-search">Buscar</button>
        <a href="{{ route('diagnosticos.index') }}" class="btn btn-secondary btn-limpiar">Limpiar</a>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Paciente</th>
                <th>Médico</th>
                <th>Descripción</th>
                <th>Gravedad</th>
                <th>Tipo</th>
                <th>Fecha</th>
                <th>Recomendaciones</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($diagnosticos as $diagnostico)
            <tr>
                <td>{{ $diagnostico->id }}</td>
                <td>{{ $diagnostico->paciente->nombre ?? 'Sin paciente' }}</td>
                <td>{{ $diagnostico->medico->nombre ?? 'Sin médico' }}</td>
                <td>{{ $diagnostico->descripcion }}</td>
                <td>{{ $diagnostico->gravedad }}</td>
                <td>{{ $diagnostico->tipo_diagnostico }}</td>
                <td>{{ $diagnostico->fecha }}</td>
                <td>{{ $diagnostico->recomendaciones }}</td>
                <td class="acciones">
                    <a href="{{ route('diagnosticos.edit', $diagnostico->id) }}" class="btn-editar">Editar</a>

                    <form action="{{ route('diagnosticos.destroy', $diagnostico->id) }}" method="POST"
                          onsubmit="return confirm('¿Seguro que deseas eliminar este diagnóstico?');" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-eliminar">Eliminar</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="9" style="text-align: center; color: red;">No hay diagnósticos registrados</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</section>
@endsection
