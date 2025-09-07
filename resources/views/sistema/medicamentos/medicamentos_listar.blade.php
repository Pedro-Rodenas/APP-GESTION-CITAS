@extends('layouts.app')
@section('title', 'Medicamentos')

@section('content')
    <h2>Tabla de Medicamentos</h2>

    <a href="{{ route('medicamentos.create') }}" class="btn btn-primary mb-3">Nuevo Medicamento</a>

    <table class="table table-striped">
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
            @foreach ($medicamentos as $medicamento)
                <tr>
                    <td>{{ $medicamento->id }}</td>
                    <td>{{ $medicamento->nombre }}</td>
                    <td>{{ $medicamento->dosis }}</td>
                    <td>{{ $medicamento->frecuencia }}</td>
                    <td>{{ $medicamento->duracion }}</td>
                    <td>{{ $medicamento->tratamiento->nombre ?? 'N/A' }}</td>
                    <td>{{ $medicamento->proveedor }}</td>
                    <td>{{ $medicamento->efectos_secundarios ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('medicamentos.edit', $medicamento->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('medicamentos.destroy', $medicamento->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('¿Eliminar este medicamento?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection