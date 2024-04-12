<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registrar nuevo usuario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container p-6 text-gray-900">
                    
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf
                        @include('usuarios.form-fields')
                        <div class="mb-3">
                            <label for="role_id" class="form-label">Rol de usuario *</label>
                            <select name="role_id" id="role_id" class="form-control">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}" {{ old('role_id', $user->role_id) == $role->id ? 'selected' : '' }}>
                                        {{ $role->id }} - {{ $role->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>     
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
