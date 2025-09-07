@extends('layouts.app')
@section('title', 'Editar Medicamento')

@section('content')
    <h2>Editar Medicamento</h2>

    <form action="{{ route('medicamentos.update', $medicamento->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ $medicamento->nombre }}" required>
        </div>

        <div class="mb-3">
            <label for="dosis" class="form-label">Dosis</label>
            <input type="text" name="dosis" class="form-control" value="{{ $medicamento->dosis }}" required>
        </div>

        <div class="mb-3">
            <label for="frecuencia" class="form-label">Frecuencia</label>
            <input type="text" name="frecuencia" class="form-control" value="{{ $medicamento->frecuencia }}" required>
        </div>

        <div class="mb-3">
            <label for="duracion" class="form-label">Duración</label>
            <input type="text" name="duracion" class="form-control" value="{{ $medicamento->duracion }}" required>
        </div>

        <div class="mb-3">
            <label for="tratamiento_id" class="form-label">Tratamiento</label>
            <select name="tratamiento_id" class="form-select" required>
                @foreach($tratamientos as $tratamiento)
                    <option value="{{ $tratamiento->id }}" {{ $medicamento->tratamiento_id == $tratamiento->id ? 'selected' : '' }}>
                        {{ $tratamiento->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="proveedor" class="form-label">Proveedor</label>
            <input type="text" name="proveedor" class="form-control" value="{{ $medicamento->proveedor }}" required>
        </div>

        <div class="mb-3">
            <label for="efectos_secundarios" class="form-label">Efectos Secundarios</label>
            <textarea name="efectos_secundarios" class="form-control">{{ $medicamento->efectos_secundarios }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
@endsection
