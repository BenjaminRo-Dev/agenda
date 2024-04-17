<div class="card mt-3 ml-3 mr-3">
    <div class="card-body">
        <h5 class="card-title"><b>Curso gestión {{date('Y')}}</b></h5>
        @if ($curso)
            <h6 class="card-subtitle text-body-secondary">{{$curso->grado}} {{$curso->paralelo}} </h6>
        @else
            <h6 class="card-subtitle text-body-secondary">No tiene curso asignado</h6>
            @include('estudiantes.lista-cursos')
        @endif
    </div>
</div>