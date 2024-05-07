@extends('home')

@section('title')
    Sucursales
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card w-100 mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Sucusales</h5>
                        <ul>
                            @foreach($sucursales as $sucursal)


                                <li>{{$sucursal->Nombre}}</li>


                            @endforeach
                        </ul>


            </div>
        </div>
    </div>
@endsection
