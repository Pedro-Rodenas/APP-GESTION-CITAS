@extends('layouts.app')
@section('title', 'Diagnósticos')

@section('content')
<section>
    <h2>Tabla de Diagnósticos</h2>
    <a class="btn" href="{{ route('diagnosticos.create') }}">Crear Diagnóstico</a>

    @if(session('success'))
    <div style="color: green">{{ session('success') }}</div>
    @endif

    {{-- Formulario de búsqueda --}}
    <form action="{{ route('diagnosticos.search') }}" method="GET" style="margin-bottom: 20px;">
        <input type="text" name="q" value="{{ $term ?? '' }}" placeholder="Buscar diagnóstico..." required>
        <button type="submit">Buscar</button>
        <a href="{{ route('diagnosticos.index') }}">Limpiar</a>
    </form>

    <table>
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
            @if($diagnosticos->isEmpty())
            <tr>
                <td colspan="9" style="text-align: center; color: red;">
                    No hay diagnósticos registrados
                </td>
            </tr>
            @else
            @foreach($diagnosticos as $diagnostico)
            <tr>
                <td>{{ $diagnostico->id }}</td>
                <td>{{ $diagnostico->paciente->nombre ?? 'Sin paciente' }}</td>
                <td>{{ $diagnostico->medico->nombre ?? 'Sin médico' }}</td>
                <td>{{ $diagnostico->descripcion }}</td>
                <td>{{ $diagnostico->gravedad }}</td>
                <td>{{ $diagnostico->tipo_diagnostico }}</td>
                <td>{{ $diagnostico->fecha }}</td>
                <td>{{ $diagnostico->recomendaciones }}</td>
                <td>
                    <div style="display: flex; gap: 10px;">
                        <a href="{{ route('diagnosticos.edit', $diagnostico->id) }}">Editar</a>

                        <form action="{{ route('diagnosticos.destroy', $diagnostico->id) }}" method="POST"
                            onsubmit="return confirm('¿Seguro que deseas eliminar este diagnóstico?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="color: red">Eliminar</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</section>
@endsection