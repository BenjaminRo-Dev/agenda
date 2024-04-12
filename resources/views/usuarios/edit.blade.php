<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar usuario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container p-6 text-gray-900">
                    <form action="{{ route('users.update', $user)}}" method="POST">
                        @csrf @method('PUT')
                        @include('usuarios.form-fields')  
                        <button type="submit" class="btn btn-primary">Guardar</button>     
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
