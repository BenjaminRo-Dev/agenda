<x-app-layout>
    <x-slot name="header">
        <a href="{{route('users.create')}}" class="btn btn-primary float-right col-sm-2 ">Nuevo usuario</a>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Importar/Exportar datos excel') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p><b>Nota: </b>Debe ser un documento tipo .csv separado por comas, el formato es:</p>
                    <p class="">nombre | correo | telefono | ci</p>
                    <form action="{{ route('users.import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-2 ms-2 mt-2" >
                            <input type="file" name="file" class="form-control">
                        </div>
                        <button class="btn btn-primary">Importar usuarios</button>
                    </form>
                    {{-- <a href="{{ route('users.export') }}" class="btn btn-success my-2">Exportar usuarios</a> --}}
                </div>
            </div>
            <div class="card mt-3">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Telefono</th>
                            <th>Rol</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->telefono }}</td>
                                <td>{{ $user->role->nombre }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</x-app-layout>