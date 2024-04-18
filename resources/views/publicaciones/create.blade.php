<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('publicaciones.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @include('publicaciones.form-fields')
                            <button type="submit" class="btn btn-primary">Publicar</button>     
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
