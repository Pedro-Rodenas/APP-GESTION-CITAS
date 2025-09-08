@extends('layouts.app')
@section('title', 'Pacientes')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/pacientes.css') }}">
@endsection

@section('content')
<h2>Tabla de pacientes</h2>

<a href="{{ route('pacientes.create') }}" class="btn btn-primary">Agregar Paciente</a>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Fecha Nacimiento</th>
            <th>Género</th>
            <th>Teléfono</th>
            <th>Dirección</th>
            <th>Tipo Sangre</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($pacientes as $paciente)
        <tr>
            <td>{{ $paciente->id }}</td>
            <td>{{ $paciente->nombre }}</td>
            <td>{{ $paciente->apellido }}</td>
            <td>{{ $paciente->fecha_nacimiento }}</td>
            <td>{{ $paciente->genero }}</td>
            <td>{{ $paciente->telefono ?? '-' }}</td>
            <td>{{ $paciente->direccion ?? '-' }}</td>
            <td>{{ $paciente->tipo_sangre ?? '-' }}</td>
            <td class="acciones">
                <a href="{{ route('pacientes.edit', $paciente->id) }}" class="btn-editar">Editar</a>

                <form action="{{ route('pacientes.destroy', $paciente->id) }}" method="POST" class="form-inline" onsubmit="return confirm('¿Seguro que deseas eliminar?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-eliminar">Eliminar</button>
                </form>
            </td>

        </tr>
        @empty
        <tr>
            <td colspan="9">Sin registros</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection