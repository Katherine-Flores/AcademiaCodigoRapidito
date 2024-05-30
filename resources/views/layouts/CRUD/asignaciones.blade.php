@extends('adminlte::page')

@section('title', 'Asignaciones-Table')

@section('content_header')
    <h1>Gestión de Asignaciones</h1>
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
        <form action="{{ route('asignacion') }}" method="GET">
            <div class="btn-group">
                <input
                    title="Buscar por: Codigo de catedrático, Nombre del catedrático, Nombre del grado, Nombre del curso, o Nombre de la sucursal"
                    type="text" name="busqueda" class="form-control">
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
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Registrar Asignación</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('asignacion.store')}}" method="POST">
                            @csrf
                            <div class="form-group row mb-3">
                                <label class="col-sm-5 col-form-label">Fecha</label>
                                <div class="col-sm-7">
                                    <input type="date" name="Fecha_Asignacion" class="form-control"
                                           value="{{ now()->toDateString() }}" readonly>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-sm-5 col-form-label">Grado</label>
                                <div class="col-sm-7">
                                    <select name="Id_Grado" id="grado-select" class="form-select">
                                        <option selected>Seleccione un grado</option>
                                        @foreach($grados as $grado)
                                            <option value={{$grado->Id_Grado}}>{{$grado->Nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-sm-5 col-form-label">Curso</label>
                                <div class="col-sm-7">
                                    <select name="Id_Curso" id="curso-select" class="form-select">
                                        <option selected>Seleccione un curso</option>
                                        @foreach($cursos as $curso)
                                            <option value={{$curso->Id_Curso}}>{{$curso->Nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-sm-5 col-form-label">Código de Catedrático</label>
                                <div class="col-sm-7">
                                    <input type="text" list="data" name="Codigo_Catedratico" class="form-control">
                                    <datalist id="data">
                                        @foreach($catedraticos as $catedratico)
                                            <option
                                                value="{{ $catedratico->Codigo_Catedratico }}">{{ $catedratico->Nombre }}</option>
                                        @endforeach
                                    </datalist>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-sm-5 col-form-label">Sucursal</label>
                                <div class="col-sm-7">
                                    <select name="Id_Sucursal" id="" class="form-select">
                                        <option selected>Seleccione una sucursal</option>
                                        @foreach($sucursales as $sucursal)
                                            <option value={{$sucursal->Id_Sucursal}}>{{$sucursal->Nombre}}</option>
                                        @endforeach
                                    </select>
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
            Nueva Asignación
        </button>

        <table class="table table-striped table-bordered table-hover">
            <thead class="bg-primary text-white">
            <tr>
                <th class="align-middle">Id</th>
                <th class="align-middle">Fecha de Asignación</th>
                <th class="align-middle">Grado</th>
                <th class="align-middle">Curso</th>
                <th class="align-middle">Cátedratico</th>
                <th class="align-middle">Sucursal</th>
                <th class="align-middle">Opciones</th>
            </tr>
            </thead>
            <tbody class="table-group-divider">
            @foreach($asignaciones as $asignacion)
                <tr>
                    <td>{{$asignacion->Id_Asignacion}}</td>
                    <td>{{$asignacion->Fecha_Asignacion}}</td>
                    <td>{{$asignacion->grado->Nombre}}</td>
                    <td>{{$asignacion->curso->Nombre}}</td>
                    <td>{{$asignacion->catedratico->Nombre}}</td>
                    <td>{{$asignacion->sucursal->Nombre}}</td>
                    <td>
                        <a href="" class="btn btn-warning"
                           data-bs-toggle="modal" data-bs-target="#modalEditar{{$asignacion->Id_Asignacion}}">
                            <i class='bx bxs-edit'></i>
                        </a>
                        <!-- Formulario de Eliminar -->
                        <form action="{{ route('asignacion.delete', $asignacion->Id_Asignacion) }}" method="POST"
                              style="display:inline;" class="d-inline delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class='bx bxs-trash-alt'></i>
                            </button>
                        </form>
                    </td>

                    <!-- Modal de editar -->
                    <div class="modal fade" id="modalEditar{{$asignacion->Id_Asignacion}}" tabindex="-1"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modificar Asignación</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('asignacion.update', $asignacion->Id_Asignacion) }}"
                                          method="POST">
                                        @csrf
                                        @method('PUT')

                                        <div class="form-group row mb-3">
                                            <label class="col-sm-5 col-form-label">Fecha</label>
                                            <div class="col-sm-7">
                                                <input type="date" name="Fecha_Asignacion" class="form-control"
                                                       value="{{$asignacion->Fecha_Asignacion}}" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-sm-5 col-form-label">Grado</label>
                                            <div class="col-sm-7">
                                                <select name="Id_Grado" id="" class="form-select">
                                                    <option selected>Seleccione un grado</option>
                                                    @foreach($grados as $grado)
                                                        <option
                                                            value="{{$grado->Id_Grado}}" {{$asignacion->Id_Grado == $grado->Id_Grado ? 'selected' : ''}}>{{$grado->Nombre}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-sm-5 col-form-label">Curso</label>
                                            <div class="col-sm-7">
                                                <select name="Id_Curso" id="" class="form-select">
                                                    <option selected>Seleccione un curso</option>
                                                    @foreach($cursos as $curso)
                                                        <option
                                                            value="{{$curso->Id_Curso}}" {{$asignacion->Id_Curso == $curso->Id_Curso ? 'selected' : ''}}>{{$curso->Nombre}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-sm-5 col-form-label">Código de Catedrático</label>
                                            <div class="col-sm-7">
                                                <input type="text" list="data" name="Codigo_Catedratico" class="form-control" value="{{$catedratico->Codigo_Catedratico}}">
                                                <datalist id="data">
                                                    @foreach($catedraticos as $catedratico)
                                                        <option
                                                            value="{{ $catedratico->Codigo_Catedratico }}">{{ $catedratico->Nombre }}</option>
                                                    @endforeach
                                                </datalist>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-sm-5 col-form-label">Sucursal</label>
                                            <div class="col-sm-7">
                                                <select name="Id_Sucursal" id="" class="form-select">
                                                    <option selected>Seleccione una sucursal</option>
                                                    @foreach($sucursales as $sucursal)
                                                        <option
                                                            value="{{$sucursal->Id_Sucursal}}" {{$asignacion->Id_Sucursal == $sucursal->Id_Sucursal ? 'selected' : ''}}>{{$sucursal->Nombre}}</option>
                                                    @endforeach
                                                </select>
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
            {{ $asignaciones->appends(request()->input())->links() }}
        </div>
    </div>
@stop

@section('css')
    {{-- SweetAlert CSS --}}
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
@stop

@section('js')
    {{-- Bootstrap, Popper.js, SweetAlert JS --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
            integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#grado-select').change(function () {
                var gradoId = $(this).val();
                if (gradoId) {
                    $.ajax({
                        url: '/grados/' + gradoId + '/cursos',
                        type: 'GET',
                        dataType: 'json',
                        success: function (data) {
                            $('#curso-select').empty();
                            $('#curso-select').append('<option selected>Seleccione un curso</option>');
                            $.each(data, function (key, value) {
                                $('#curso-select').append('<option value="' + value.Id_Curso + '">' + value.Nombre + '</option>');
                            });
                        }
                    });
                } else {
                    $('#curso-select').empty();
                    $('#curso-select').append('<option selected>Seleccione un curso</option>');
                }
            });
        });
    </script>
@stop
