<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg pb-3">
                {{-- Datos del usuario: --}}
                <div class="card mt-3 ml-3 mr-3">
                    <div class="card-body">
                        <h5 class="card-title"><b>Datos del usuario</b></h5>
                        <div class="row">
                            <div class="col-sm-3 col-md-3">
                                <label for="name" class="form-label">Nombre:</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" readonly>
                            </div>
                            <div class="col-sm-3 col-md-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" readonly>
                            </div>
                            <div class="col-sm-3 col-md-3">
                                <label for="telefono" class="form-label">Telefono:</label>
                                <input type="text" class="form-control" id="telefono" name="telefono" value="{{ $user->telefono }}" readonly>
                            </div>
                            <div class="col-sm-3 col-md-3">
                                <label for="role" class="form-label">Rol:</label>
                                <input type="text" class="form-control" id="role" name="role" value="{{ $user->role->nombre }}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                @if ($user->estudiante)
                    @include('estudiantes.curso-asignado');
                    @include('estudiantes.lista-materias');
                @endif

                @if($user->profesor)
                    {{-- @include('profesores.lista-materias'); --}}
                    @include('profesores.curso-asignado')
                @endif

            </div>
        </div>
    </div>
</x-app-layout>