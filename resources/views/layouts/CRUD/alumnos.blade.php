@extends('adminlte::page')

@section('title', 'Alumnos-Table')

@section('content_header')
    <h1>Gestión de Alumnos</h1>
@stop

@section('content')
    @if(session("correcto"))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
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
            document.addEventListener('DOMContentLoaded', function() {
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
        <form action="{{ route('alumno') }}" method="GET">
            <div class="btn-group">
                <input type="text" name="busqueda" class="form-control" placeholder="Código o Nombre">
                <input type="submit" value="Buscar" class="btn btn-primary">
            </div>
        </form>
    </div>

    <div class="p-5 table-responsive">
        <!-- Modal de registrar-->
        <div class="modal fade" id="modalRegistrar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Registrar Alumno</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('alumno.create')}}" method="POST">
                            @csrf
                            <div class="form-group row mb-3">
                                <label class="col-sm-5 col-form-label">Código Alumno</label>
                                <div class="col-sm-7">
                                    <input type="number" name="Codigo_Alumno" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-sm-5 col-form-label">Nombre</label>
                                <div class="col-sm-7">
                                    <input type="text" name="Nombre" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-sm-5 col-form-label">Correo</label>
                                <div class="col-sm-7">
                                    <input type="email" name="Correo" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-sm-5 col-form-label">Teléfono</label>
                                <div class="col-sm-7">
                                    <input type="number" name="Telefono" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-sm-5 col-form-label">Fecha de Nacimiento</label>
                                <div class="col-sm-7">
                                    <input type="date" name="Fecha_Nacimiento" class="form-control">
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
            Nuevo Alumno
        </button>

        <table class="table table-striped table-bordered table-hover">
            <thead class="bg-primary text-white">
            <tr>
                <th class="align-middle">Código Alumno</th>
                <th class="align-middle">Nombre</th>
                <th class="align-middle">Correo</th>
                <th class="align-middle">Teléfono</th>
                <th class="align-middle">Fecha de Nacimiento</th>
                <th class="align-middle">Opciones</th>
            </tr>
            </thead>
            <tbody class="table-group-divider">
            @foreach($alumnos as $alumno)
                <tr>
                    <td>{{$alumno->Codigo_Alumno}}</td>
                    <td>{{$alumno->Nombre}}</td>
                    <td>{{$alumno->Correo}}</td>
                    <td>{{$alumno->Telefono}}</td>
                    <td>{{$alumno->Fecha_Nacimiento}}</td>

                    <td>
                        <a href="" class="btn btn-warning"
                           data-bs-toggle="modal" data-bs-target="#modalEditar{{$alumno->Codigo_Alumno}}">
                            <i class='bx bxs-edit'></i>
                        </a>
                        <!-- Formulario de Eliminar -->
                        <form action="{{ route('alumno.delete', $alumno->Codigo_Alumno) }}" method="POST"
                              style="display:inline;" class="d-inline delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class='bx bxs-trash-alt'></i>
                            </button>
                        </form>
                    </td>

                    <!-- Modal de editar -->
                    <div class="modal fade" id="modalEditar{{$alumno->Codigo_Alumno}}" tabindex="-1"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modificar Alumno</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('alumno.update', $alumno->Codigo_Alumno) }}"
                                          method="POST">
                                        @csrf
                                        @method('PUT')

                                        <div class="form-group row mb-3">
                                            <label class="col-sm-5 col-form-label">Código Alumno</label>
                                            <div class="col-sm-7">
                                                <input type="number" name="Codigo_Alumno" class="form-control"
                                                       value="{{$alumno->Codigo_Alumno}}">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-sm-5 col-form-label">Nombre</label>
                                            <div class="col-sm-7">
                                                <input type="text" name="Nombre" class="form-control"
                                                       value="{{$alumno->Nombre}}">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-sm-5 col-form-label">Correo</label>
                                            <div class="col-sm-7">
                                                <input type="email" name="Correo" class="form-control"
                                                       value="{{$alumno->Correo}}">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-sm-5 col-form-label">Telefono</label>
                                            <div class="col-sm-7">
                                                <input type="number" name="Telefono" class="form-control"
                                                       value="{{$alumno->Telefono}}">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-sm-5 col-form-label">Fecha de Nacimiento</label>
                                            <div class="col-sm-7">
                                                <input type="date" name="Fecha_Nacimiento" class="form-control" value="{{$alumno->Fecha_Nacimiento}}">
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
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
            {{ $alumnos->appends(request()->input())->links() }}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sofia+Sans:ital,wght@0,1..1000;1,1..1000&display=swap" rel="stylesheet">
    <style>
        *{
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
