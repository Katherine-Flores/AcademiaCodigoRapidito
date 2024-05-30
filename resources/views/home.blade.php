<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academia Codigo Rapidito - @yield('title')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Estilos Propios -->
    <link rel='stylesheet'
          href='https://cdn-uicons.flaticon.com/2.3.0/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sofia+Sans:ital,wght@0,1..1000;1,1..1000&display=swap"
          rel="stylesheet">
    <style>
        :root {
            --cornflower-blue: #6D71F9;
            --maya-blue: #54C1FB;
            --midnight-blue: #272848;
            --dark-blue: #202142;
            --athens-gray: #EFF0F8;
            --crystal-white: rgba(255, 255, 255, 30%);
        }

        body {
            background-color: white;
        }

        .title{
            font-size: 3rem !important;
            font-weight: bold;
        }

        .text-ui {
            font-family: 'Sofia Sans', sans-serif;
        }

        .text {
            font-family: "Poppins", sans-serif;
            font-size: large;
            color: var(--dark-blue);
        }

        .text2 {
            font-family: "Poppins", sans-serif;
            font-size: medium;
            color: var(--dark-blue);
        }

        .btn-link {
            margin-left: 3px;
            border-radius: 25px;
            padding: 10px;
            text-decoration: none;
            color: var(--dark-blue);
        }

        .btn-link:hover, .btn-link.active {
            background-color: var(--cornflower-blue);
            color: var(--athens-gray);
        }

        .absolute {
            width: 100%;
            height: 90vh;
            position: absolute;
            inset: 0;
            overflow: hidden;
        }

        .bg-shape1 {
            left: 1180px;
            top: 37px;
            width: 250px;
            height: 250px;
            border-radius: 9999px;
            position: relative;
            background-color: var(--cornflower-blue);
            z-index: -1;
        }

        .bg-shape2 {
            left: 950px;
            top: 50px;
            width: 80px;
            height: 80px;
            border-radius: 9999px;
            position: relative;
            background-color: var(--maya-blue);
            z-index: -1;
        }

        .bg-shape3 {
            left: -200px;
            top: 154px;
            width: 480px;
            height: 40px;
            position: relative;
            transform: rotate(-8deg);
            background-color: var(--maya-blue);
            z-index: -1;
        }

        .bg-shape4 {
            left: -350px;
            top: 175px;
            width: 480px;
            height: 40px;
            position: relative;
            transform: rotate(-8deg);
            background-color: var(--athens-gray);
            z-index: -1;
        }

        .bg-shape5 {
            left: 1090px;
            top: -100px;
            width: 250px;
            height: 40px;
            position: relative;
            transform: rotate(-8deg);
            background-color: var(--athens-gray);
            z-index: -1;
        }

        .bg-shape6 {
            left: 950px;
            top: -100px;
            width: 500px;
            height: 40px;
            position: relative;
            transform: rotate(-8deg);
            background-color: var(--cornflower-blue);
            z-index: -1;
        }

        .bg-shape7 {
            left: 1250px;
            top: -121px;
            width: 200px;
            height: 40px;
            position: relative;
            transform: rotate(-8deg);
            background-color: var(--maya-blue);
            z-index: -1;
        }

        .bg-shape8 {
            left: -100px;
            top: -565px;
            width: 1500px;
            height: 500px;
            position: relative;
            transform: rotate(-8deg);
            background-color: var(--crystal-white);
            z-index: -1;
        }

        .bg-blur {
            filter: blur(50px);
        }

        .contenido {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            margin-bottom: 100px;
            min-height: 400px;
        }

        .footer {
            background-color: var(--midnight-blue);
            color: var(--athens-gray);
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            min-height: 70px;
        }

        .footer div {
            display: flex;
            align-items: center;
            text-align: center;
        }

        .footer .app-links img {
            width: auto;
            height: 40px;
        }

        @media (max-width: 768px) {
            .footer {
                flex-direction: column;
            }

            .footer div {
                justify-content: center;
                margin-bottom: 10px;
            }

            .footer .app-links img {
                margin: 5px;
            }

            .nav-item{
                margin-top: 10px;
                margin-bottom: 10px;
            }

            .btn-link{
                padding: 5px;
            }

            .contenido {
                margin-bottom: 160px;
                flex-direction: column;
            }

            .title{
                font-size: 1.6rem !important;
            }

            .text {
                font-size: medium;
            }

            .text2 {
                font-size: small;
            }
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-white text-ui z-1">
    <div class="container-fluid">
        <i class='fi fi-sr-graduation-cap ms-5 me-3' style="font-size: 35px; color: var(--cornflower-blue)"></i>
        <a class="navbar-brand me-3" href="/" style="font-weight: bold;">Código Rapidito</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a href="{{route('sucursal.invoke')}}"
                       class="btn-link {{ Request::is('sucursales') ? 'active' : '' }}">Sucursales</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('grados.invoke')}}" class="btn-link {{ Request::is('grados') ? 'active' : '' }}">Grados</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('cursos.invoke')}}" class="btn-link {{ Request::is('cursos') ? 'active' : '' }}">Cursos</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('acerca-de')}}" class="btn-link {{ Request::is('acerca-de') ? 'active' : '' }}">Acerca
                        de</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

<!-- Fondo -->
<div class="absolute">
    <div class="absolute justify-content-center">
        <div class="bg-shape1 bg-blur"></div>
        <div class="bg-shape2 bg-blur"></div>
        <div class="bg-shape3"></div>
        <div class="bg-shape4"></div>
        <div class="bg-shape5"></div>
        <div class="bg-shape6"></div>
        <div class="bg-shape7"></div>
        <div class="bg-shape8 bg-blur"></div>
    </div>
</div>

<div class="container mt-5 mb-15 contenido">
    @yield('content')
</div>

<footer class="fixed-bottom footer text-ui">
    <div class="container-fluid d-flex flex-column flex-md-row justify-content-between align-items-center">
        <div class="d-flex  justify-content-center align-items-center">
            <i class="fi fi-sr-graduation-cap ms-5 me-3" style="font-size: 25px; color: var(--cornflower-blue)"></i>
            <p class="mb-0">© 2024 Academia Código Rapidito. All rights reserved.</p>
        </div>
    </div>
</footer>

<!-- Bootstrap JS Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous">
</script>

</body>
</html>
