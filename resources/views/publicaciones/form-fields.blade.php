<div class="col">
    <div class="form-floating mb-3">
        <input type="text" name="titulo" class="form-control" placeholder="Título" id="titulo" titulo="titulo" required
                value="{{ old('titulo', $publicacion->titulo) }}" required>
        <label for="titulo" class="form-label">Titulo *</label>
        @error('titulo')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-floating mb-3">
        <textarea class="form-control" style="height: 100px" name="detalle" placeholder="Comentario" id="floatingTextarea"
            required>{{ old('detalle', $publicacion->detalle) }}</textarea>
        <label for="floatingTextarea">Contenido *</label> 
        @error('detalle')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="card" >
        <div class="card-body" >
            <div class="mb-3">
                <label for="formFileMultiple" class="form-label">Archivos</label>
                <input class="form-control" name="file[]" type="file" id="formFileMultiple" multiple
                accept="image/*, .pdf, .mp4">
                @error('file')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
    {{-- Seleccionar fecha de actividad: --}}
    <div class="form-floating card mt-3">
        <div class="card-body">
            <input type="date" name="fecha_actividad" class="form-control" placeholder="Fecha de actividad" id="fecha_actividad" required
                    value="{{ old('fecha_actividad', $publicacion->fecha_actividad) }}" required>
            <label for="fecha_actividad" class="form-label">Fecha de actividad *</label>
            @error('fecha_actividad')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <br>
    @include('publicaciones.select-tipo_publicacion')
    @include('publicaciones.select-grupo')
</div>