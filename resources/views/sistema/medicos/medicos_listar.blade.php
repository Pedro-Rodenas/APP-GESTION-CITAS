@extends('layouts.app')
@section('title', 'Médicos')

@section('content')
<section>
    <h2>Tabla de médicosp</h2>
    <a class="btn" href="{{route('medicos.create')}}">Crear Médico</a>

    @if(session('success'))
        <div style="color: green">{{ session('success') }}</div>
    @endif

    {{-- Formulario de búsqueda --}}
    <form action="{{ route('medicos.search') }}" method="GET" style="margin-bottom: 20px;">
        <input type="text" name="q" value="{{ $term ?? '' }}" placeholder="Buscar médico..." required>
        <button type="submit">Buscar</button>
        <a href="{{ route('medicos.index') }}">Limpiar</a>
    </form>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>especialidad</th>
                <th>Teléfono</th>
                <th>experiencia</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
             @foreach($medicos as $medico)
                <tr>
                    <td>{{$medico->id}}</td>
                    <td>{{$medico->nombre}}</td>
                    <td>{{$medico->especialidad}}</td>
                    <td>{{$medico->telefono}}</td>
                    <td>{{$medico->años_experiencia}}</td>
                    <td>
                        <div style="display: flex; gap: 10px">
                        {{-- Botón Editar --}}
                        <a href="{{ route('medicos.edit', $medico->id) }}">Editar</a>

                        {{-- Botón Eliminar --}}
                        <form action="{{ route('medicos.destroy', $medico->id) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este médico?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="color: red">Eliminar</button>
                        </form>
                    </div>
                    </td>
                </tr>
            @endforeach
            
        </tbody>
    </table>
    
    </thead>
</section>
<!-- Contenido específico de médicos -->
@endsection
