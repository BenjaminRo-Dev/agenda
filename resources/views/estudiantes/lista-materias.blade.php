{{-- Datos del usuario: --}}
<div class="card ml-3 mr-3">
    <div class="card-body">
        <h5 class="card-title"><b>Materias asignadas</b></h5>
        {{-- <a href="{{ route('cursos.create') }}" class="btn btn-primary float-right">Nuevo curso</a> --}}
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Grado</th>
                    <th>Gestion</th>
                    <th>Nivel</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($materias as $materia)
                <tr>
                    <td>{{ $materia->nombre }}</td>
                    <td>{{ $materia->grado }} - {{$materia->paralelo}} </td>
                    <td>{{ $materia->gestion }}</td>
                    <td>{{ $materia->nivel->nombre }}</td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>