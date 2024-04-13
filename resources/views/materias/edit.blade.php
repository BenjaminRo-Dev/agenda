<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar materia') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container p-6 text-gray-900">
                    <form action="{{ route('materias.update', $materia)}}" method="POST">
                        @csrf @method('PUT')
                        @include('materias.form-fields')     
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
