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
        <form action="{{ route('appointment.store') }}" method="POST">
            @csrf

            <div>
                <label for="fecha">Fecha</label>
                <input id="fecha" name="fecha" type="date" required />
            </div>

            <div>
                <label for="motivo">Motivo</label>
                <textarea name="motivo" id="motivo" width="100%"></textarea>
            </div>

            <!-- Pacientes -->
            <div>
                <label for="paciente_id">Paciente</label>
                <select name="paciente_id" id="paciente_id" required>
                    <option value="">-- Selecciona un paciente --</option>
                    @foreach($pacientes as $paciente)
                        <option value="{{ $paciente->id }}">{{ $paciente->nombre }} {{ $paciente->apellido }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Médicos -->
            <div>
                <label for="medico_id">Médico</label>
                <select name="medico_id" id="medico_id" required>
                    <option value="">-- Selecciona un médico --</option>
                    @foreach($medicos as $medico)
                        <option value="{{ $medico->id }}">{{ $medico->nombre }} {{ $medico->apellido }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Estado -->
            <div>
                <label for="estado">Estado</label>
                <select name="estado" id="estado" required>
                    <option value="">-- Selecciona un estado --</option>
                    @foreach($estados as $estado)
                        <option value="{{ strtolower($estado) }}">{{ $estado }}</option>
                    @endforeach
                </select>
            </div>


            <div>
                <label for="obesrvaciones">Obesrvaciones</label>
                <textarea name="obesrvaciones" id="obesrvaciones" width="100%"></textarea>
            </div>

            <div>
                <label for="sala">Sala</label>
                <input type="text" id="sala" name="sala">
            </div>

            <button type="submit">Guardar</button>
        </form>
    </main>

</body>

</html>