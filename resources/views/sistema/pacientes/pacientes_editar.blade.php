@extends('layouts.app')
@section('title', 'Editar Paciente')

@section('content')
    <h2>Editar Paciente</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pacientes.update', $paciente->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $paciente->nombre) }}" required>

        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" value="{{ old('apellido', $paciente->apellido) }}" required>

        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento"
            value="{{ old('fecha_nacimiento', $paciente->fecha_nacimiento) }}" required>

        <label for="genero">Género:</label>
        <input type="text" id="genero" name="genero" value="{{ old('genero', $paciente->genero) }}" required>

        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" value="{{ old('telefono', $paciente->telefono) }}">

        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion" value="{{ old('direccion', $paciente->direccion) }}">

        <label for="tipo_sangre">Tipo de Sangre:</label>
        <input type="text" id="tipo_sangre" name="tipo_sangre" value="{{ old('tipo_sangre', $paciente->tipo_sangre) }}">

        <button type="submit">Actualizar Paciente</button>
    </form>

    <a href="{{ route('pacientes.index') }}">Volver a la lista de pacientes</a>
@endsection