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
        <form action="{{ route('patients.store') }}" method="POST">
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
                <label for="fecha_nacimiento">Fecha de nacimiento</label>
                <input id="fecha_nacimiento" name="fecha_nacimiento" type="date" required />
            </div>

            <div>
                <label for="genero">Género</label>
                <select id="genero" name="genero" required>
                    <option value="" disabled selected>Selecciona…</option>
                    <option value="masculino">Masculino</option>
                    <option value="femenino">Femenino</option>
                    <option value="otro">Otro</option>
                    <option value="prefiero_no_decirlo">Prefiero no decirlo</option>
                </select>
            </div>

            <div>
                <label for="telefono">Teléfono</label>
                <input id="telefono" name="telefono" type="tel" pattern="\d{7,15}" inputmode="numeric" required />
            </div>

            <div>
                <label for="direccion">Dirección</label>
                <input id="direccion" name="direccion" type="text" required />
            </div>

            <div>
                <label for="tipo_sangre">Tipo de sangre</label>
                <select id="tipo_sangre" name="tipo_sangre" required>
                    <option disabled selected>Selecciona…</option>
                    <option>A+</option>
                    <option>A-</option>
                    <option>B+</option>
                    <option>B-</option>
                    <option>AB+</option>
                    <option>AB-</option>
                    <option>O+</option>
                    <option>O-</option>
                </select>
            </div>

            <button type="submit">Guardar</button>
        </form>
    </main>

</body>

</html>