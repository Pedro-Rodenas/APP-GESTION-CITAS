@extends('layouts.app')
@section('title', 'Editar Medicamento')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/medicamentos.css') }}">
@endsection

@section('content')
<div>
    <h2>Editar Medicamento</h2>

    {{-- Mensajes de error --}}
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('medicamentos.update', $medicamento->id) }}" method="POST" class="formulario-paciente">
        @csrf
        @method('PUT')

        <div class="group-control">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $medicamento->nombre) }}" required>
        </div>

        <div class="group-control">
            <label for="dosis">Dosis</label>
            <input type="text" name="dosis" id="dosis" value="{{ old('dosis', $medicamento->dosis) }}" required>
        </div>

        <div class="group-control">
            <label for="frecuencia">Frecuencia</label>
            <input type="text" name="frecuencia" id="frecuencia" value="{{ old('frecuencia', $medicamento->frecuencia) }}" required>
        </div>

        <div class="group-control">
            <label for="duracion">Duración</label>
            <input type="text" name="duracion" id="duracion" value="{{ old('duracion', $medicamento->duracion) }}" required>
        </div>

        <div class="group-control">
            <label for="tratamiento_id">Tratamiento</label>
            <select name="tratamiento_id" id="tratamiento_id" required>
                @foreach($tratamientos as $tratamiento)
                <option value="{{ $tratamiento->id }}" 
                    {{ old('tratamiento_id', $medicamento->tratamiento_id) == $tratamiento->id ? 'selected' : '' }}>
                    {{ $tratamiento->nombre }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="group-control">
            <label for="proveedor">Proveedor</label>
            <input type="text" name="proveedor" id="proveedor" value="{{ old('proveedor', $medicamento->proveedor) }}" required>
        </div>

        <div class="group-control">
            <label for="efectos_secundarios">Efectos Secundarios</label>
            <textarea name="efectos_secundarios" id="efectos_secundarios">{{ old('efectos_secundarios', $medicamento->efectos_secundarios) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>

    <a href="{{ route('medicamentos.index') }}" class="btn btn-secondary mt-3">
        <i class="fas fa-arrow-left"></i> Volver
    </a>
</div>
@endsection
