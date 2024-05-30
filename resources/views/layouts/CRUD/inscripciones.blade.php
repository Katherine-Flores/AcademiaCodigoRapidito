@extends('adminlte::page')

@section('title', 'Inscripcion-Table')

@section('content_header')
    <h1>Gestión de Inscripciones</h1>
@stop

@section('content')
    @if(session("correcto"))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: 'success',
                    title: '¡Éxito!',
                    text: '{{ session("correcto") }}',
                    timer: 3000,
                    showConfirmButton: false
                });
            });
        </script>
    @endif

    @if(session("incorrecto"))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: 'error',
                    title: '¡Error!',
                    text: '{{ session("incorrecto") }}',
                    timer: 3000,
                    showConfirmButton: false
                });
            });
        </script>
    @endif

    <div class="d-md-flex justify-content-md-end me-5">
        <form action="{{ route('inscripcion') }}" method="GET">
            <div class="btn-group" style="width: 120%;">
                <input type="text" name="busqueda" class="form-control" placeholder="Código o Nombre del alumno">
                <input type="submit" value="Buscar" class="btn btn-primary">
            </div>
        </form>
    </div>

    <div class="p-5 table-responsive">
        <!-- Modal de registrar-->
        <div class="modal fade" id="modalRegistrar" tabindex="-1" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Registrar Sucursal</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('inscripcion.create')}}" method="POST">
                            @csrf
                            <div class="form-group row mb-3">
                                <label class="col-sm-5 col-form-label">Fecha</label>
                                <div class="col-sm-7">
                                    <input type="date" name="Fecha_Inscripcion" class="form-control"
                                           value="{{ now()->toDateString() }}" readonly>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-sm-5 col-form-label">Código del Alumno</label>
                                <div class="col-sm-7">
                                    <input type="text" name="Codigo_Alumno" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-sm-5 col-form-label">Asignación (ID)</label>
                                <div class="col-sm-7">
                                    <input type="number" name="Id_Asignacion" class="form-control" required>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Registrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <button class="btn btn-success mb-1" data-bs-toggle="modal" data-bs-target="#modalRegistrar">
            Nueva Inscripción
        </button>

        <table class="table table-striped table-bordered table-hover">
            <thead class="bg-primary text-white">
            <tr>
                <th class="align-middle">Id</th>
                <th class="align-middle">Fecha</th>
                <th class="align-middle">Alumno</th>
                <th class="align-middle">Curso</th>
                <th class="align-middle">Grado</th>
                <th class="align-middle">Catedrático</th>
                <th class="align-middle">Sucursal</th>
                <th class="align-middle">Monto</th>
                <th class="align-middle">Opciones</th>
            </tr>
            </thead>
            <tbody class="table-group-divider">
            @foreach($inscripciones as $inscripcion)
                <tr>
                    <td>{{ $inscripcion->Id_Inscripcion }}</td>
                    <td>{{ $inscripcion->Fecha_Inscripcion }}</td>
                    <td>{{ $inscripcion->alumno->Nombre }}</td>
                    <td>{{ $inscripcion->asignacion->curso->Nombre }}</td>
                    <td>{{ $inscripcion->asignacion->grado->Nombre }}</td>
                    <td>{{ $inscripcion->asignacion->catedratico->Nombre}}</td>
                    <td>{{ $inscripcion->asignacion->sucursal->Nombre }}</td>
                    <td>{{ $inscripcion->Monto }}</td>
                    <td>
                        <a href="" class="btn btn-warning"
                           data-bs-toggle="modal" data-bs-target="#modalEditar{{$inscripcion->Id_Inscripcion}}">
                            <i class='bx bxs-edit'></i>
                        </a>
                        <!-- Formulario de Eliminar -->
                        <form action="{{ route('inscripcion.delete', $inscripcion->Id_Inscripcion) }}" method="POST"
                              style="display:inline;" class="d-inline delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class='bx bxs-trash-alt'></i>
                            </button>
                        </form>
                    </td>

                    <!-- Modal de editar -->
                    <div class="modal fade" id="modalEditar{{$inscripcion->Id_Inscripcion}}" tabindex="-1"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modificar Inscripcion</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('inscripcion.update', $inscripcion->Id_Inscripcion) }}"
                                          method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group row mb-3">
                                            <label class="col-sm-5 col-form-label">Fecha</label>
                                            <div class="col-sm-7">
                                                <input type="date" name="Fecha_Inscripcion" class="form-control"
                                                       value="{{ $inscripcion->Fecha_Inscripcion }}" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-sm-5 col-form-label">Código del Alumno</label>
                                            <div class="col-sm-7">
                                                <input type="text" name="Codigo_Alumno" class="form-control"
                                                       value="{{ $inscripcion->Codigo_Alumno }}" required>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-sm-5 col-form-label">Asignación (ID)</label>
                                            <div class="col-sm-7">
                                                <input type="number" name="Id_Asignacion" class="form-control"
                                                       value="{{ $inscripcion->Id_Asignacion }}" required>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                Cerrar
                                            </button>
                                            <button type="submit" class="btn btn-primary">Modificar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $inscripciones->appends(request()->input())->links() }}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel='stylesheet'
          href='https://cdn-uicons.flaticon.com/2.3.0/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sofia+Sans:ital,wght@0,1..1000;1,1..1000&display=swap"
          rel="stylesheet">
    <style>
        * {
            font-family: "Poppins", sans-serif;
        }
    </style>
@stop

@section('js')
    {{-- Bootstrap, Popper.js, SweetAlert JS --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Script para la confirmación de eliminación -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var deleteForms = document.querySelectorAll('.delete-form');
            deleteForms.forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    event.preventDefault(); // Detener el envío del formulario inicialmente
                    Swal.fire({
                        title: '¿Está seguro de que desea eliminar este registro?',
                        text: "Esta acción no se puede deshacer",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Sí, eliminarlo',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit(); // Enviar el formulario si el usuario confirma
                        }
                    });
                });
            });
        });
    </script>
@stop
