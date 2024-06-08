@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    @role('administrador')
    <div class="container">
        <div class="row g-0">
            <div class="col-lg-4">
                <a href="{{route('alumno.invoke')}}" class="card m-3 p-3 flex-row align-items-center justify-content-between overflow-auto">
                    <div class="card-comment">
                        <div class="number">{{ $data['alumnosCount'] }}</div>
                        <div class="card-name">Alumnos Registrados</div>
                    </div>
                    <div class="icon-box">
                        <i class="fas fa-user"></i>
                    </div>
                </a>
            </div>
            <div class="col-lg-4">
                <a href="{{route('catedraticos.invoke')}}" class="card m-3 p-3 flex-row align-items-center justify-content-between overflow-auto">
                    <div class="card-comment">
                        <div class="number">{{ $data['catedraticosCount'] }}</div>
                        <div class="card-name">Catedráticos</div>
                    </div>
                    <div class="icon-box">
                        <i class="fas fa-chalkboard"></i>
                    </div>
                </a>
            </div>
            <div class="col-lg-4">
                <a href="{{route('inscripcion')}}" class="card m-3 p-3 flex-row align-items-center justify-content-between overflow-auto">
                    <div class="card-comment">
                        <div class="number">{{ $data['inscripcionCount'] }}</div>
                        <div class="card-name">Inscripciones</div>
                    </div>
                    <div class="icon-box">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                </a>
            </div>
            <div class="col-lg-4">
                <a href="{{route('sucursal')}}" class="card m-3 p-3 flex-row align-items-center justify-content-between overflow-auto">
                    <div class="card-comment">
                        <div class="number">{{ $data['sucursalesCount'] }}</div>
                        <div class="card-name">Sucursales</div>
                    </div>
                    <div class="icon-box">
                        <i class="fas fa-school"></i>
                    </div>
                </a>
            </div>
            <div class="col-lg-2">
                <a href="{{route('grado')}}" class="card m-3 p-3 flex-row align-items-center justify-content-between overflow-auto">
                    <div class="card-comment">
                        <div class="number">{{ $data['gradosCount'] }}</div>
                        <div class="card-name">Grados</div>
                    </div>
                    <div class="icon-box">
                        <i class="fas fa-award"></i>
                    </div>
                </a>
            </div>
            <div class="col-lg-2">
                <a href="{{route('curso')}}" class="card m-3 p-3 flex-row align-items-center justify-content-between overflow-auto">
                    <div class="card-comment">
                        <div class="number">{{ $data['cursosCount'] }}</div>
                        <div class="card-name">Cursos</div>
                    </div>
                    <div class="icon-box">
                        <i class="fas fa-book"></i>
                    </div>
                </a>
            </div>
            <div class="col-lg-4">
                <!-- Gráfico Circular -->
                <div class="card m-3 p-3">
                    <h3 class="card-name">Alumnos Inscritos</h3>
                    <canvas id="alumnosInscritosChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    @endrole

    @role('catedratico')
    <div class="container">
        <div class="row g-0">
            <div class="col-lg-4">
                <div class="card m-3 p-3">
                    <h3 class="card-name">Bienvenido Catedratico</h3>
                </div>
            </div>
        </div>
    </div>
    @endrole

    @role('alumno')
    <div class="container">
        <div class="row g-0">
            <div class="col-lg-4">
                <div class="card m-3 p-3">
                    <h3 class="card-name">Bienvenido Alumno</h3>
                </div>
            </div>
        </div>
    </div>
    @endrole

    @role('visitante')
    <div class="container">
        <div class="row g-0">
            <div class="col-lg-4">
                <div class="card m-3 p-3">
                    <h3 class="card-name">Bienvenido Visitante</h3>
                </div>
            </div>
        </div>
    </div>
    @endrole
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
        :root {
            --cornflower-blue: #6D71F9;
            --maya-blue: #54C1FB;
            --midnight-blue: #272848;
            --dark-blue: #202142;
            --athens-gray: #EFF0F8;
            --crystal-white: rgba(255, 255, 255, 30%);
        }
        *{
            font-family: "Poppins", sans-serif;
        }
        .card{
            text-decoration: none;
        }
        .number{
            font-size: 2rem;
            font-weight: bold;
            color: var(--cornflower-blue);
        }
        .card-name{
            color: var(--dark-blue);
            font-weight: bolder;
        }
        .icon-box i{
           font-size: 2.5rem;
            color: var(--cornflower-blue);
        }
    </style>
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Alumnos inscritos vs no inscritos
            var ctx1 = document.getElementById('alumnosInscritosChart').getContext('2d');
            new Chart(ctx1, {
                type: 'doughnut',
                data: {
                    labels: ['Inscritos', 'No Inscritos'],
                    datasets: [{
                        data: [{{ $data['alumnosInscritosCount'] }}, {{ $data['alumnosCount'] - $data['alumnosInscritosCount'] }}],
                        backgroundColor: ['#54C1FB', '#EFF0F8'],
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                    }
                }
            });
        });
    </script>
@stop
