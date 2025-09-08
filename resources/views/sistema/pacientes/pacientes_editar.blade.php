@extends('layouts.app')
@section('title', 'Editar Paciente')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/pacientes.css') }}">
@endsection

@section('content')
<h2>Editar Paciente</h2>

<!-- Mostrar errores si hay -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- Formulario -->
<form action="{{ route('pacientes.update', $paciente->id) }}" method="POST" class="formulario-paciente">
    @csrf
    @method('PUT')

    <div class="group-control">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $paciente->nombre) }}" required>
    </div>

    <div class="group-control">
        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" value="{{ old('apellido', $paciente->apellido) }}" required>
    </div>

    <div class="group-control">
        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ old('fecha_nacimiento', $paciente->fecha_nacimiento) }}" required>
    </div>

    <div class="group-control">
        <label for="genero">Género:</label>
        <select name="genero" id="genero" required>
            <option value="">Selecciona...</option>
            <option value="Masculino" {{ old('genero', $paciente->genero) == 'Masculino' ? 'selected' : '' }}>Masculino</option>
            <option value="Femenino" {{ old('genero', $paciente->genero) == 'Femenino' ? 'selected' : '' }}>Femenino</option>
        </select>
    </div>

    <div class="group-control">
        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" value="{{ old('telefono', $paciente->telefono) }}">
    </div>

    <div class="group-control">
        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion" value="{{ old('direccion', $paciente->direccion) }}">
    </div>

    <div class="group-control">
        <label for="tipo_sangre">Tipo de Sangre:</label>
        <input type="text" id="tipo_sangre" name="tipo_sangre" value="{{ old('tipo_sangre', $paciente->tipo_sangre) }}">
    </div>

    <button type="submit" class="btn btn-primary">Actualizar Paciente</button>
</form>

<a href="{{ route('pacientes.index') }}" class="btn btn-secondary">
    <i class="fa fa-arrow-left"></i> Volver a la lista de pacientes
</a>
@endsection
