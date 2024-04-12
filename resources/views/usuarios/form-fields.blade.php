<div class="col">
    <div class="mb-3">
        <label for="name" class="form-label">Nombre *</label>
        <input type="text" class="form-control" id="name" name="name"
                value="{{ old('name', $user->name) }}">
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="telefono" class="form-label">Telefono</label>
        <input type="number" class="form-control" id="telefono" name="telefono"
                value="{{ old('telefono', $user->telefono) }}">
        @error('telefono')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email *</label>
        <input type="email" class="form-control" id="email" name="email" required
                value="{{ old('email', $user->email) }}">
        @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Contraseña *</label>
        <input type="password" class="form-control" id="password" name="password" required>
        @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

</div>