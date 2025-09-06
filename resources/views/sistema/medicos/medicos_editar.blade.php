<div>
    <h1>Editar Médico</h1>
    {{-- Mensajes de error --}}

    <form action="{{ route('medicos.update', $medico->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" 
                   value="{{ old('nombre', $medico->nombre) }}" required>
            @error('nombre')
            <small>{{ $message }}</small>
            @enderror
        </div>

        <div>
            <label for="apellido" class="form-label">Apellido</label>
            <input type="text" name="apellido" id="apellido" 
                   value="{{ old('apellido', $medico->apellido) }}" required>
            @error('apellido')
            <small>{{ $message }}</small>
            @enderror
        </div>

        <div>
            <label for="especialidad" class="form-label">Especialidad</label>
            <input type="text" name="especialidad" id="especialidad" 
                   value="{{ old('especialidad', $medico->especialidad) }}" required>
            @error('especialidad')
            <small>{{ $message }}</small>
            @enderror
        </div>

        <div>
            <label for="telefono">Teléfono</label>
            <input type="text" name="telefono" id="telefono" 
                   value="{{ old('telefono', $medico->telefono) }}" required>
            @error('telefono')
            <span style="color:red">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="email" name="email" id="email" 
                   value="{{ old('email', $medico->email) }}" required>
            @error('email')
            <small>{{ $message }}</small>
            @enderror
        </div>

        <div>
            <label for="licencia" class="form-label">Licencia</label>
            <input type="text" name="licencia" id="licencia" 
                   value="{{ old('licencia', $medico->licencia) }}" required>
            @error('licencia')
            <small>{{ $message }}</small>
            @enderror
        </div>

        <div>
            <label for="experiencia" class="form-label">Años de experiencia</label>
            <input type="number" name="años_experiencia" id="años_experiencia" 
                   value="{{ old('años_experiencia', $medico->años_experiencia) }}" required>
            @error('experiencia')
            <small>{{ $message }}</small>
            @enderror
        </div>

        {{-- Botones --}}
        <button type="submit">Actualizar</button>
        <a href="{{ route('medicos.index') }}">Cancelar</a>
    </form>
</div>
