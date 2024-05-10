@extends('home')

@section('title')
    Grados
@endsection

@section('content')
    <div class="card w-75" style="background-color: var(--athens-gray); border: none; margin-left: 12%; height: 400px; box-shadow: 5px 5px 4px 2px rgba(0,0,0,0.25)">
        <div class="card-body p-5">
            <h5 class="card-title text" style="font-size: 3rem; font-weight: bold;">Grados</h5>
            <hr style="height: 4px; background-color: var(--cornflower-blue); color: var(--cornflower-blue);">
            <ul>
                @foreach($grados as $grado)
                    <li
                        class="text" style="list-style-type: none;">{{$grado->Nombre}}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
