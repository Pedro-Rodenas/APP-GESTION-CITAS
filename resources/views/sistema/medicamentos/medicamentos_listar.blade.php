@extends('layouts.app')
@section('title', 'Medicamentos')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/medicamentos.css') }}">
@endsection

@section('content')
<div>
    <h2>Tabla de Medicamentos</h2>

    <a href="{{ route('medicamentos.create') }}" class="btn btn-primary mb-3">
         Nuevo Medicamento
    </a>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Dosis</th>
                <th>Frecuencia</th>
                <th>Duración</th>
                <th>Tratamiento</th>
                <th>Proveedor</th>
                <th>Efectos Secundarios</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($medicamentos as $medicamento)
            <tr>
                <td>{{ $medicamento->id }}</td>
                <td>{{ $medicamento->nombre }}</td>
                <td>{{ $medicamento->dosis }}</td>
                <td>{{ $medicamento->frecuencia }}</td>
                <td>{{ $medicamento->duracion }}</td>
                <td>{{ $medicamento->tratamiento->nombre ?? 'N/A' }}</td>
                <td>{{ $medicamento->proveedor }}</td>
                <td>{{ $medicamento->efectos_secundarios ?? 'N/A' }}</td>
                <td class="acciones">
                    <a href="{{ route('medicamentos.edit', $medicamento->id) }}" class="btn-editar">
                        Editar
                    </a>
                    <form action="{{ route('medicamentos.destroy', $medicamento->id) }}" method="POST" class="form-inline" onsubmit="return confirm('¿Eliminar este medicamento?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-eliminar">Eliminar</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="9" style="text-align:center; color:red;">
                    No hay medicamentos registrados
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
