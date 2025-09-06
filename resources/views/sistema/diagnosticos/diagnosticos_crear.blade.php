<div>
    <h1>Crear Diagnóstico</h1>

    @if(session('success'))
        <div style="color: green">{{ session('success') }}</div>
    @endif

    <form action="{{ route('diagnosticos.store') }}" method="POST">
        @csrf

        <div>
            <label for="paciente_id">Paciente</label>
            <select name="paciente_id" id="paciente_id" required>
                <option value="">--Seleccione un paciente--</option>
                @foreach($pacientes as $paciente)
                    <option value="{{ $paciente->id }}" {{ old('paciente_id') == $paciente->id ? 'selected' : '' }}>
                        {{ $paciente->nombre }} {{ $paciente->apellido }}
                    </option>
                @endforeach
            </select>
            @error('paciente_id')
                <span style="color:red">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="medico_id">Médico</label>
            <select name="medico_id" id="medico_id" required>
                <option value="">--Seleccione un médico--</option>
                @foreach($medicos as $medico)
                    <option value="{{ $medico->id }}" {{ old('medico_id') == $medico->id ? 'selected' : '' }}>
                        {{ $medico->nombre }} {{ $medico->apellido }}
                    </option>
                @endforeach
            </select>
            @error('medico_id')
                <span style="color:red">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" id="descripcion" required>{{ old('descripcion') }}</textarea>
            @error('descripcion')
                <span style="color:red">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="gravedad">Gravedad</label>
            <select name="gravedad" id="gravedad" required>
                <option value="">--Seleccione gravedad--</option>
                @foreach(['leve','moderada','grave','critica'] as $nivel)
                    <option value="{{ $nivel }}" {{ old('gravedad') == $nivel ? 'selected' : '' }}>{{ ucfirst($nivel) }}</option>
                @endforeach
            </select>
            @error('gravedad')
                <span style="color:red">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="tipo_diagnostico">Tipo de Diagnóstico</label>
            <input type="text" name="tipo_diagnostico" id="tipo_diagnostico" value="{{ old('tipo_diagnostico') }}" required>
            @error('tipo_diagnostico')
                <span style="color:red">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="recomendaciones">Recomendaciones</label>
            <textarea name="recomendaciones" id="recomendaciones">{{ old('recomendaciones') }}</textarea>
            @error('recomendaciones')
                <span style="color:red">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="fecha">Fecha</label>
            <input type="datetime-local" name="fecha" id="fecha" value="{{ old('fecha') }}" required>
            @error('fecha')
                <span style="color:red">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit">Guardar</button>
        <a href="{{ route('diagnosticos.index') }}">Cancelar</a>
    </form>
</div>
