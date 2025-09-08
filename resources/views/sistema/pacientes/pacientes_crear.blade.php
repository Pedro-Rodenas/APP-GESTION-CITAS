@extends('layouts.app')
@section('title', 'Crear Paciente')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/pacientes.css') }}">
@endsection

@section('content')
<h2>Agregar nuevo paciente</h2>

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
<form method="POST" action="{{ route('pacientes.store') }}" class="formulario-paciente">
    @csrf

    <div class="group-control">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" required>
    </div>

    <div class="group-control">
        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" id="apellido" value="{{ old('apellido') }}" required>
    </div>

    <div class="group-control">
        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" required>
    </div>

    <div class="group-control">
        <label for="genero">Género:</label>
        <select name="genero" id="genero" required>
            <option value="">Selecciona...</option>
            <option value="Masculino" {{ old('genero') == 'Masculino' ? 'selected' : '' }}>Masculino</option>
            <option value="Femenino" {{ old('genero') == 'Femenino' ? 'selected' : '' }}>Femenino</option>
        </select>
    </div>

    <div class="group-control">
        <label for="telefono">Teléfono:</label>
        <input type="text" name="telefono" id="telefono" value="{{ old('telefono') }}">
    </div>

    <div class="group-control">
        <label for="direccion">Dirección:</label>
        <input type="text" name="direccion" id="direccion" value="{{ old('direccion') }}">
    </div>

    <div class="group-control">
        <label for="tipo_sangre">Tipo de Sangre:</label>
        <input type="text" name="tipo_sangre" id="tipo_sangre" value="{{ old('tipo_sangre') }}">
    </div>

    <button type="submit" class="btn btn-primary">Guardar Paciente</button>
</form>

<a href="{{ route('pacientes.index') }}" class="btn btn-secondary">
    <i class="fas fa-arrow-left"></i> Volver a la lista de pacientes
</a>
@endsection
