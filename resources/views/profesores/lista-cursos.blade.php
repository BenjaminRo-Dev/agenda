<!-- Botón para abrir el modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cursosModal">
    Asignar curso
</button>

<!-- Modal -->
<div class="modal fade" id="cursosModal" tabindex="-1" aria-labelledby="cursosModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="cursosModalLabel">Seleccionar curso</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Aquí se mostrará la lista de cursos -->
                <ul>
                    @foreach($cursos as $curso)
                        <div class="list-group">
                            <form action="{{ route('asignarCursoProfesor', ['profesor' => $user->profesor->id,'curso' => $curso->id]) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" onclick="return confirm('Asignar el curso {{$curso->grado}} - {{$curso->paralelo}}?')"
                                    class="list-group-item list-group-item-action">
                                    {{$curso->grado}} {{$curso->paralelo}}
                                </button>
                            </form>
                        </div>
                    @endforeach
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                {{-- <button type="button" class="btn btn-primary">Asignar curso</button> --}}
            </div>
        </div>
    </div>
</div>