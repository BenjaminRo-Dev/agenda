<div class="col">

    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre *</label>
        <input type="text" class="form-control" id="nombre" name="nombre"
                value="{{ old('nombre', $materia->nombre) }}">
        @error('nombre')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="grado" class="form-label">Grado *</label>
        <select class="form-select" id="grado" name="grado" required>
            <option value="">Seleccione un grado</option>
            @foreach ($grados as $grado)
                <option value="{{ $grado }}" {{ old('grado', $materia->grado) == $grado ? 'selected' : '' }}>{{ $grado }}</option>
            @endforeach
        </select>
        @error('grado')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="paralelo" class="form-label">Paralelo *</label>
        <select class="form-select" id="paralelo" name="paralelo" required>
            <option value="">Seleccione un paralelo</option>
            @foreach ($paralelos as $paralelo)
                <option value="{{ $paralelo }}" {{ old('paralelo', $materia->paralelo) == $paralelo ? 'selected' : '' }}>{{ $paralelo }}</option>
            @endforeach
        </select>
        @error('paralelo')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="nivel_id" class="form-label">Nivel *</label>
        <select class="form-select" id="nivel_id" name="nivel_id" required>
            <option value="">Seleccione un nivel</option>
            @foreach ($niveles as $nivel)
                <option value="{{ $nivel->id }}" {{ old('nivel_id', $materia->nivel_id) == $nivel->id ? 'selected' : '' }}>{{ $nivel->nombre }}</option>
            @endforeach
        </select>
        @error('nivel_id')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>

</div>