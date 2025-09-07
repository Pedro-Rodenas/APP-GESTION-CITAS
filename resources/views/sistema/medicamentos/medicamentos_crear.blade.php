@extends('layouts.app')
@section('title', 'Crear Medicamento')

@section('content')
    <h2>Crear Medicamento</h2>

    <form action="{{ route('medicamentos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="dosis" class="form-label">Dosis</label>
            <input type="text" name="dosis" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="frecuencia" class="form-label">Frecuencia</label>
            <input type="text" name="frecuencia" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="duracion" class="form-label">Duración</label>
            <input type="text" name="duracion" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="tratamiento_id" class="form-label">Tratamiento</label>
            <select name="tratamiento_id" class="form-select" required>
                <option value="">Seleccione un tratamiento</option>
                @foreach($tratamientos as $tratamiento)
                    <option value="{{ $tratamiento->id }}">{{ $tratamiento->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="proveedor" class="form-label">Proveedor</label>
            <input type="text" name="proveedor" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="efectos_secundarios" class="form-label">Efectos Secundarios</label>
            <textarea name="efectos_secundarios" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
@endsection