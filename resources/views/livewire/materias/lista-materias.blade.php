<div class="container text-center" >

    <div class="container" >
        <div class="row mb-3">
            <div class="col-sm-3 col-md-3" >
                <input wire:model="buscar" wire:keydown.enter="buscarMaterias"
                type="search"
                class="form-control"
                placeholder="Materia">
            </div>
            <div class="d-grid col-sm-2 col-md-2 mx-auto" >
                <button wire:click= "buscarMaterias"
                    class="btn btn-secondary"
                    type="button">
                    Buscar
                </button>
            </div>
            <div class="col-sm-7"></div>
        </div>
        
    </div>
    
    <div class="col-md-12" >
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Grado</th>
                    <th>Gestion</th>
                    <th>Nivel</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($materias as $fila => $materia)
                    <tr>
                        <td>{{ $materia->nombre }}</td>
                        <td>{{ $materia->grado }} - {{$materia->paralelo}}</td>
                        <td>{{ $materia->gestion }}</td>
                        <td>{{ $materia->nivel->nombre }}</td>
                        <td>
                            <a href="{{ route('materias.show', $materia) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('materias.edit', $materia) }}" class="btn btn-primary">Editar</a>
                            <form action="{{ route('materias.destroy', $materia) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Eliminar materia {{$materia->nombre}}?')"
                                class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $materias->links() }}

</div>
