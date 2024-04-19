@php
    use Illuminate\Support\Str;
@endphp

<div class="container text-center" >

    <div class="container" >
        <div class="row mb-3">
            <div class="col-sm-3 col-md-3" >
                <input wire:model="buscar" wire:keydown.enter="buscarPublicaciones"
                type="search"
                class="form-control"
                placeholder="publicacion">
            </div>
            <div class="d-grid col-sm-2 col-md-2 mx-auto" >
                <button wire:click= "buscarPublicaciones"
                    class="btn btn-secondary"
                    type="button">
                    Buscar
                </button>
            </div>
            <div class="col-sm-7"></div>
        </div>
        
    </div>
    
    <div class="table-responsive col-md-12" >
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th class="col-md-2">Titulo</th>
                    <th class="col-md-2">Detalle</th>
                    <th>Fecha de actividad</th>
                    <th>Fecha de publicacion</th>
                    <th>Usuario</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($publicaciones as $fila => $publicacion)
                    <tr>
                        <td class="col-md-2">{{ $publicacion->titulo }}</td>
                        <td class="col-md-2" >{{ Str::limit($publicacion->detalle, 100) }}</td>
                        <td>{{ Carbon\Carbon::parse($publicacion->fecha_actividad)->format('d-m-Y') }}</td>
                        <td>{{ Carbon\Carbon::parse($publicacion->fecha_publicacion)->format('d-m-Y') }}</td>
                        <td>{{ $publicacion->user->name }}</td>
                        <td>
                            <div class="d-flex" >
                                <a href="{{ route('publicaciones.show', $publicacion) }}" class="btn btn-info"><i class="bi bi-eye"></i></a>
                                <a href="{{ route('publicaciones.edit', $publicacion) }}" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                                <form action="{{ route('publicaciones.destroy', $publicacion) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Eliminar publicacion {{$publicacion->titulo}}?')"
                                    class="btn btn-danger"><i class="bi bi-trash3-fill"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $publicaciones->links() }}

</div>
