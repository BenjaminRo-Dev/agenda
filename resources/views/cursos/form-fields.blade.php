<div class="col">

    <div class="mb-3">
        <label for="grado" class="form-label">Grado *</label>
        <select class="form-select" id="grado" name="grado" required>
            <option value="">Seleccione un grado</option>
            @foreach ($grados as $grado)
                <option value="{{ $grado }}">{{ $grado }}</option>
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
                <option value="{{ $paralelo }}">{{ $paralelo }}</option>
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
                <option value="{{ $nivel->id }}">{{ $nivel->nombre }}</option>
            @endforeach
        </select>
        @error('nivel_id')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

</div>