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

    <style>
        .form-patient {
  max-width: 400px;
  margin-top: 1rem;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  color: #333;
}

.form-patient__group {
  margin-bottom: 1.25rem;
}

.form-patient__label {
  display: block;
  margin-bottom: 0.35rem;
  font-weight: 500;
  color: #555;
  font-size: 0.9rem;
}

.form-patient__input {
  display: block;
  width: 100%;
  padding: 0.5rem 0.75rem;
  font-size: 1rem;
  line-height: 1.4;
  color: #222;
  background-color: #f9f9f9;
  border: 1px solid #ccc;
  border-radius: 4px;
  transition: border-color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
  font-family: inherit;
  box-sizing: border-box;
}

.form-patient__input:focus {
  border-color: #7a9cf5;
  outline: none;
  box-shadow: 0 0 5px 1px rgba(122, 156, 245, 0.4);
  background-color: #fff;
  color: #111;
}

.form-patient__select {
  appearance: none;
  background-image: url("data:image/svg+xml;charset=US-ASCII,%3Csvg%20width%3D'10'%20height%3D'6'%20viewBox%3D'0%200%2010%206'%20fill%3D'none'%20xmlns%3D'http://www.w3.org/2000/svg'%3E%3Cpath%20d%3D'M1%201L5%205L9%201'%20stroke%3D'%23666'%20stroke-width%3D'1.5'%20stroke-linecap%3D'round'%20stroke-linejoin%3D'round'/%3E%3C/svg%3E");
  background-repeat: no-repeat;
  background-position: right 0.75rem center;
  background-size: 10px 6px;
  padding-right: 2rem;
}

.form-patient__button {
  display: inline-block;
  padding: 0.5rem 1.25rem;
  font-size: 1rem;
  font-weight: 600;
  color: #fff;
  background-color: #7a9cf5;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  transition: background-color 0.25s ease;
  font-family: inherit;
  user-select: none;
}

.form-patient__button:hover,
.form-patient__button:focus {
  background-color: #5d7de0;
  outline: none;
}

    </style>

    <form action="{{ route('patients.store') }}" method="POST" class="form-patient">
        @csrf

        <div class="form-patient__group">
            <label for="nombre" class="form-patient__label">Nombre</label>
            <input id="nombre" name="nombre" type="text" required class="form-patient__input" />
        </div>

        <div class="form-patient__group">
            <label for="apellido" class="form-patient__label">Apellido</label>
            <input id="apellido" name="apellido" type="text" required class="form-patient__input" />
        </div>

        <div class="form-patient__group">
            <label for="fecha_nacimiento" class="form-patient__label">Fecha de nacimiento</label>
            <input id="fecha_nacimiento" name="fecha_nacimiento" type="date" required class="form-patient__input" />
        </div>

        <div class="form-patient__group">
            <label for="genero" class="form-patient__label">Género</label>
            <select id="genero" name="genero" required class="form-patient__input form-patient__select">
            <option value="" disabled selected>Selecciona…</option>
            <option value="masculino">Masculino</option>
            <option value="femenino">Femenino</option>
            <option value="otro">Otro</option>
            <option value="prefiero_no_decirlo">Prefiero no decirlo</option>
            </select>
        </div>

        <div class="form-patient__group">
            <label for="telefono" class="form-patient__label">Teléfono</label>
            <input id="telefono" name="telefono" type="tel" pattern="\d{7,15}" inputmode="numeric" required class="form-patient__input" />
        </div>

        <div class="form-patient__group">
            <label for="direccion" class="form-patient__label">Dirección</label>
            <input id="direccion" name="direccion" type="text" required class="form-patient__input" />
        </div>

        <div class="form-patient__group">
            <label for="tipo_sangre" class="form-patient__label">Tipo de sangre</label>
            <select id="tipo_sangre" name="tipo_sangre" required class="form-patient__input form-patient__select">
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

        <button type="submit" class="form-patient__button">Guardar</button>
    </form>

    </main>

</body>

</html>