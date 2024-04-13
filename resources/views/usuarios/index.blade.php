<x-app-layout>
    <x-slot name="header">
        <a href="{{route('users.create')}}" class="btn btn-primary float-right col-sm-2 ">Nuevo usuario</a>
        <a href="{{route('users.excel')}}" class="btn btn-primary float-right col-sm-2 mr-2">Importar excel</a>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de usuarios') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @livewire('usuarios.lista-usuarios')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
