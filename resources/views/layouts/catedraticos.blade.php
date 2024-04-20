@extends('home')

@section('title')
    Catedraticos
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card w-100 mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Catedráticos</h5>
                    </div>
                </div>
                <table class="table table-light table-hover">
                    <thead class="table-primary text-center">
                    <tr>
                        <th class="align-middle">Código</th>
                        <th class="align-middle">Nombre</th>
                        <th class="align-middle">Correo</th>
                        <th class="align-middle">Teléfono</th>
                    </tr>
                    </thead>
                    <tbody class="text-center" id="bodyTable">
                    @foreach($catedraticos as $catedratico)
                        <tr>
                            <td>{{$catedratico->Codigo_Catedratico}}</td>
                            <td>{{$catedratico->Nombre}}</td>
                            <td>{{$catedratico->Correo}}</td>
                            <td>{{$catedratico->Telefono}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
