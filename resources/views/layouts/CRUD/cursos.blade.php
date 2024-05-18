<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
            integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
            crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
    <!-- Estilos Propios -->
    <link rel='stylesheet'
          href='https://cdn-uicons.flaticon.com/2.3.0/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sofia+Sans:ital,wght@0,1..1000;1,1..1000&display=swap"
          rel="stylesheet">
    <title>Document</title>
</head>
<body>
<h1 class="text-center p-3">Cursos</h1>

@if(session("correcto"))
    <div class="alert alert-success">{{session("correcto")}}</div>
@endif

@if(session("incorrecto"))
    <div class="alert alert-danger">{{session("incorrecto")}}</div>
@endif

<div class="d-md-flex justify-content-md-end me-5">
    <form action="{{ route('curso') }}" method="GET">
        <div class="btn-group">
            <input type="text" name="busqueda" class="form-control">
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Registrar Curso</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('cursos.create')}}" method="POST">
                        @csrf
                        <div class="form-group row mb-3">
                            <label class="col-sm-5 col-form-label">Nombre</label>
                            <div class="col-sm-7">
                                <input type="text" name="Nombre" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label class="col-sm-5 col-form-label">Duración</label>
                            <div class="col-sm-7">
                                <input type="number" maxlength="2" name="Duracion" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label class="col-sm-5 col-form-label">Grado</label>
                            <div class="col-sm-7">
                                <select name="Id_Grado" id="" class="form-select">
                                    <option selected>Seleccione el grado</option>
                                    @foreach($grados as $grado)
                                        <option value={{$grado->Id_Grado}}>{{$grado->Nombre}}</option>
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
        Nuevo Curso
    </button>

    <table class="table table-striped table-bordered table-hover">
        <thead class="bg-primary text-white">
        <tr>
            <th class="align-middle">Id</th>
            <th class="align-middle">Nombre</th>
            <th class="align-middle">Duracion</th>
            <th class="align-middle">Grado</th>
            <th class="align-middle">Opciones</th>
        </tr>
        </thead>
        <tbody class="table-group-divider">
        @foreach($cursos as $curso)
            <tr>
                <td>{{$curso->Id_Curso}}</td>
                <td>{{$curso->Nombre}}</td>
                <td>{{$curso->Duracion}}</td>
                <td>{{$curso->grado->Nombre}}</td>
                <td>
                    <a href="" class="btn btn-warning"
                       data-bs-toggle="modal" data-bs-target="#modalEditar{{$curso->Id_Curso}}">
                        <i class='bx bxs-edit'></i>
                    </a>
                    <!-- Formulario de Eliminar -->
                    <form action="{{ route('cursos.delete', $curso->Id_Curso) }}" method="POST"
                          style="display:inline;" class="d-inline delete-form">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class='bx bxs-trash-alt'></i>
                        </button>
                    </form>
                </td>

                <!-- Modal de editar -->
                <div class="modal fade" id="modalEditar{{$curso->Id_Curso}}" tabindex="-1"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modificar Curso</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('cursos.update', $curso->Id_Curso) }}"
                                      method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group row mb-3">
                                        <label class="col-sm-5 col-form-label">Nombre</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="Nombre" class="form-control" value="{{$curso->Nombre}}">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-sm-5 col-form-label">Duración</label>
                                        <div class="col-sm-7">
                                            <input type="number" maxlength="2" name="Duracion" class="form-control" value="{{$curso->Duracion}}">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-sm-5 col-form-label">Grado</label>
                                        <div class="col-sm-7">
                                            <select name="Id_Grado" id="" class="form-select">
                                                <option selected>Seleccione el grado</option>
                                                @foreach($grados as $grado)
                                                    <option value="{{$grado->Id_Grado}}" {{$curso->Id_Grado == $grado->Id_Grado ? 'selected' : ''}}>{{$grado->Nombre}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar
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
</div>

<!-- Script para la confirmación de eliminación -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var deleteForms = document.querySelectorAll('.delete-form');
        deleteForms.forEach(function (form) {
            form.addEventListener('submit', function (event) {
                var confirmation = confirm('¿Está seguro de que desea eliminar este curso?');
                if (!confirmation) {
                    event.preventDefault();
                }
            });
        });
    });
</script>
</body>
</html>
