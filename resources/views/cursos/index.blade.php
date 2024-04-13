<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cursos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('cursos.create') }}" class="btn btn-primary float-right">Nuevo curso</a>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Grado</th>
                                <th>Paralelo</th>
                                <th>Gestion</th>
                                <th>Nivel</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cursos as $curso)
                                <tr>
                                    <td>{{ $curso->grado }}</td>
                                    <td>{{ $curso->paralelo }}</td>
                                    <td>{{ $curso->gestion }}</td>
                                    <td>{{ $curso->nivel->nombre }}</td>
                                    <td>
                                        {{-- <a href="{{ route('cursos.edit', $curso) }}" class="btn btn-primary">Editar</a> --}}
                                        <a href="{{ route('cursos.show', $curso) }}" class="btn btn-info">Ver</a>
                                        <form action="{{ route('cursos.destroy', $curso) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Eliminar curso {{$curso->nombre}}?')"
                                            class="btn btn-danger">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>