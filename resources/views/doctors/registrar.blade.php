<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nombre - | Pacietne</title>
</head>

<body>
    <header>
        <h1>Registrar Pacientes</h1>
    </header>
    <main>
        <form action="{{ route('doctor.store') }}" method="POST">
            @csrf

            <div>
                <label for="nombre">Nombre</label>
                <input id="nombre" name="nombre" type="text" required />
            </div>

            <div>
                <label for="apellido">Apellido</label>
                <input id="apellido" name="apellido" type="text" required />
            </div>

            <div>
                <label for="especialidad">Especialidad</label>
                <input id="especialidad" name="especialidad" type="text" required />
            </div>

            <div>
                <label for="telefono">Teléfono</label>
                <input id="telefono" name="telefono" type="text" required />
            </div>

            <div>
                <label for="email">Correo</label>
                <input type="text" id="email" name="email">
            </div>

            <div>
                <label for="licencia">Licencia</label>
                <input type="text" id="licencia" name="licencia">
            </div>

            <div>
                <label for="años_experiencia">Años de Experiencia</label>
                <input type="number" id="años_experiencia" name="años_experiencia">
            </div>

            <button type="submit">Guardar</button>
        </form>
    </main>

</body>

</html>