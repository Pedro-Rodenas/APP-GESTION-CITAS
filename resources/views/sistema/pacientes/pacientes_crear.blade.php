<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Paciente</title>
    <link rel="stylesheet" href="http://127.0.0.1:8000/css/app.css">
</head>

<body>
    <header>
        <h1>Agregar nuevo paciente</h1>
    </header>

    <main>
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
        <form method="POST" action="{{ route('pacientes.store') }}">
            @csrf

            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" required>

            <label for="apellido">Apellido:</label>
            <input type="text" name="apellido" id="apellido" value="{{ old('apellido') }}" required>

            <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
            <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}"
                required>

            <label for="genero">Género:</label>
            <select name="genero" id="genero" required>
                <option value="">Selecciona...</option>
                <option value="Masculino" {{ old('genero') == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                <option value="Femenino" {{ old('genero') == 'Femenino' ? 'selected' : '' }}>Femenino</option>
            </select>

            <label for="telefono">Teléfono:</label>
            <input type="text" name="telefono" id="telefono" value="{{ old('telefono') }}">

            <label for="direccion">Dirección:</label>
            <input type="text" name="direccion" id="direccion" value="{{ old('direccion') }}">

            <label for="tipo_sangre">Tipo de Sangre:</label>
            <input type="text" name="tipo_sangre" id="tipo_sangre" value="{{ old('tipo_sangre') }}">

            <button type="submit">Guardar Paciente</button>
        </form>
    </main>
</body>

</html>