<div class="mb-3">
    <label for="grupo" class="form-label">Enviar a*</label>
    <select name="grupo" id="grupo" class="form-control">
        @foreach ($grupos as $grupo)
            <option value="{{ $grupo }}" {{ old('grupo') == $grupo ? 'selected' : '' }}>
                {{ $grupo }}
            </option>
        @endforeach
    </select>
</div>