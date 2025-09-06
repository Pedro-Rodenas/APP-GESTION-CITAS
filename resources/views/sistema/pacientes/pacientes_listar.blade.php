@extends('layouts.app')
@section('title', 'Pacientes')

@section('content')
    <h2>Tabla de pacientes</h2>

    <a href="{{ route('pacientes.create') }}" class="btn btn-primary">Agregar Paciente</a>

    <table border="1" cellpadding="8" cellspacing="0" class="table">
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
                    <td>
                        <a href="{{ route('pacientes.edit', $paciente->id) }}">Editar</a>
                        <form action="{{ route('pacientes.destroy', $paciente->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('¿Seguro que deseas eliminar?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9">Sin registrosz</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection