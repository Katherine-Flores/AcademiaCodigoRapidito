@extends('adminlte::page')

@section('title', 'Reportes')

@section('content_header')
    <h1>Gestión de Reportes de Alumnos Inscritos</h1>
@stop

@section('content')
    <a href="{{route('exportar')}}">Exportar</a>
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
@stop
