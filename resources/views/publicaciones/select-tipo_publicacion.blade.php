<div class="mb-3">
    <label for="tipo_publicacion_id" class="form-label">Tipo publicacion *</label>
    <select name="tipo_publicacion_id" id="tipo_publicacion_id" class="form-control">
        @foreach ($tipos_publicacion as $tipo_publicacion)
            <option value="{{ $tipo_publicacion->id }}" {{ old('tipo_publicacion_id', $tipo_publicacion->id) == $tipo_publicacion->id ? 'selected' : '' }}>
                {{ $tipo_publicacion->nombre }}
            </option>
        @endforeach
    </select>
</div>