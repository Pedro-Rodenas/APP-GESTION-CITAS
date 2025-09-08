@extends('layouts.app')
@section('title', 'Editar Médico')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/medicos.css') }}">
@endsection

@section('content')
<h2>Editar Médico</h2>

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
<form action="{{ route('medicos.update', $medico->id) }}" method="POST" class="formulario-paciente">
    @csrf
    @method('PUT')

    <div class="group-control">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $medico->nombre) }}" required>
        @error('nombre')
            <small>{{ $message }}</small>
        @enderror
    </div>

    <div class="group-control">
        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" id="apellido" value="{{ old('apellido', $medico->apellido) }}" required>
        @error('apellido')
            <small>{{ $message }}</small>
        @enderror
    </div>

    <div class="group-control">
        <label for="especialidad">Especialidad:</label>
        <input type="text" name="especialidad" id="especialidad" value="{{ old('especialidad', $medico->especialidad) }}" required>
        @error('especialidad')
            <small>{{ $message }}</small>
        @enderror
    </div>

    <div class="group-control">
        <label for="telefono">Teléfono:</label>
        <input type="text" name="telefono" id="telefono" value="{{ old('telefono', $medico->telefono) }}" required>
        @error('telefono')
            <small>{{ $message }}</small>
        @enderror
    </div>

    <div class="group-control">
        <label for="email">Correo electrónico:</label>
        <input type="email" name="email" id="email" value="{{ old('email', $medico->email) }}" required>
        @error('email')
            <small>{{ $message }}</small>
        @enderror
    </div>

    <div class="group-control">
        <label for="licencia">Licencia:</label>
        <input type="text" name="licencia" id="licencia" value="{{ old('licencia', $medico->licencia) }}" required>
        @error('licencia')
            <small>{{ $message }}</small>
        @enderror
    </div>

    <div class="group-control">
        <label for="años_experiencia">Años de experiencia:</label>
        <input type="number" name="años_experiencia" id="años_experiencia" value="{{ old('años_experiencia', $medico->años_experiencia) }}" required>
        @error('años_experiencia')
            <small>{{ $message }}</small>
        @enderror
    </div>

    <!-- Botones -->
    <button type="submit" class="btn-primary">Actualizar Médico</button>
</form>
<a href="{{ route('medicos.index') }}" class="btn-secondary"><i class="fa fa-arrow-left"></i> Cancelar</a>
@endsection
