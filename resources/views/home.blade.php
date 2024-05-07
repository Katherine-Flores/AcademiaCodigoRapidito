<!doctype html>
<html lang="es">
<head>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<!-- Estilos Propios -->
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sofia+Sans:ital,wght@0,1..1000;1,1..1000&display=swap" rel="stylesheet">
    <title>Academia Codigo Rapidito - @yield('title')</title>

    <style>
        :root{
            --cornflower-blue: #6D71F9;
            --maya-blue: #54C1FB;
            --midnight-blue: #272848;
            --dark-blue: #202142;
            --athens-gray: #EFF0F8;
            --crystal-white: rgba(255,255,255,30%);
        }
        body{
            background-color: white;
        }
        .text-ui{
            font-family: 'Sofia Sans', sans-serif;
        }
        .text{
            font-family: "Poppins", sans-serif;
            font-size: large;
            color: var(--dark-blue);
        }
        .btn-link{
            padding: 10px;
            text-decoration: none;
            color: var(--dark-blue);
        }
        .btn-link:hover, .btn-link:active{
            background-color: var(--cornflower-blue);
            border-radius: 25px;
            color: var(--athens-gray);
        }
        .absolute{
            width: 100%;
            height: 90vh;
            position: absolute;
            inset: 0;
            overflow: hidden;
        }
        .bg-shape1{
            left: 1180px;
            top: 37px;
            width: 250px;
            height: 250px;
            border-radius: 9999px;
            position: relative;
            background-color: var(--cornflower-blue);
        }
        .bg-shape2{
            left: 950px;
            top: 50px;
            width: 80px;
            height: 80px;
            border-radius: 9999px;
            position: relative;
            background-color: var(--maya-blue);
        }
        .bg-shape3{
            left: -200px;
            top: 154px;
            width: 480px;
            height: 40px;
            position: relative;
            transform: rotate(-8deg);
            background-color: var(--maya-blue);
        }
        .bg-shape4{
            left: -350px;
            top: 175px;
            width: 480px;
            height: 40px;
            position: relative;
            transform: rotate(-8deg);
            background-color: var(--athens-gray);
        }
        .bg-shape5{
            left: 1090px;
            top: -100px;
            width: 250px;
            height: 40px;
            position: relative;
            transform: rotate(-8deg);
            background-color: var(--athens-gray);
            z-index: -1;
        }
        .bg-shape6{
            left: 950px;
            top: -100px;
            width: 500px;
            height: 40px;
            position: relative;
            transform: rotate(-8deg);
            background-color: var(--cornflower-blue);
            z-index: -1;
        }
        .bg-shape7{
            left: 1250px;
            top: -121px;
            width: 200px;
            height: 40px;
            position: relative;
            transform: rotate(-8deg);
            background-color: var(--maya-blue);
            z-index: -1;
        }
        .bg-shape8{
            left: -100px;
            top: -565px;
            width: 1500px;
            height: 500px;
            position: relative;
            transform: rotate(-8deg);
            background-color: var(--crystal-white);
            z-index: -1;
        }
        .bg-blur{
            filter: blur(50px);
        }
        .contenido{
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }
        .footer{
            background-color: var(--midnight-blue);
            height: 60px;
            color: var(--athens-gray);
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-content: center;
        }
        .footer div{
            display: inline-flex;
            flex-direction: row;
            text-align: center;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-white text-ui z-1">
    <div class="container-fluid">
        <i class='fi fi-sr-graduation-cap ms-5 me-3' style="font-size: 35px; color: var(--cornflower-blue)"></i>
        <a class="navbar-brand me-3" href="#" style="font-weight: bold;">Código Rapidito</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="me-3">
                    <a href="#" class="btn-link">Sucursales</a>
                </li>
                <li class="me-3">
                    <a href="#" class="btn-link">Grados</a>
                </li>
                <li class="me-3">
                    <a href="#" class="btn-link">Cursos</a>
                </li>
                <li class="me-3">
                    <a href="#" class="btn-link">Acerca de</a>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
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
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
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
<div class="container mt-5 contenido">
    @yield('content')
</div>

<footer class="align-items-center text-center fixed-bottom footer text-ui">
    <div>
        <i class="fi fi-sr-graduation-cap ms-5 me-3" style="font-size: 25px; color: var(--cornflower-blue)"></i>
        <p class="text-lg-start">© 2024 Academia Código Rapidito. All rights reserved.</p>
    </div>
    <div>
        <p class="me-3">Descarga la App</p>
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/eb/Download_on_the_App_Store_Badge_ESMX_RGB_blk.svg/1280px-Download_on_the_App_Store_Badge_ESMX_RGB_blk.svg.png" style="width: auto; height: 40px;">
        <img src="https://www.ayuntamientoparla.es/ficheros/app-cie/google%20play.png/download" style="width: auto; height: 40px;" class="ms-3 me-5">
    </div>
</footer>
</body>
</html>
