@extends('home')

@section('title')
    Acerca de
@endsection

@section('content')
    <div class="card w-75 h-auto"
         style="background-color: var(--athens-gray); border: none; margin-left: 12%; height: 450px; box-shadow: 5px 5px 4px 2px rgba(0,0,0,0.25)">
        <div class="card-body p-5">
            <h5 class="card-title text title">Misión</h5>
            <hr style="height: 4px; background-color: var(--cornflower-blue); color: var(--cornflower-blue);">
            <p class="text2">Empoderar a individuos de todas las edades y orígenes para que desarrollen habilidades en
                programación y tecnología. Nos comprometemos a ofrecer una educación accesible y de calidad que inspire
                la innovación, fomente la creatividad y prepare a nuestros estudiantes para enfrentar los desafíos del
                mundo digital actual y del futuro.</p>
            <h5 class="card-title text title">Visión</h5>
            <hr style="height: 4px; background-color: var(--cornflower-blue); color: var(--cornflower-blue);">
            <p class="text2">Ser reconocidos como líderes en la formación en tecnología y programación a nivel global.
                Nos esforzamos por crear una comunidad inclusiva y diversa donde cada estudiante tenga la oportunidad de
                alcanzar su máximo potencial. Buscamos ser un catalizador para el cambio positivo, impulsando el
                progreso tecnológico y contribuyendo al desarrollo de una sociedad más equitativa y próspera.</p>
        </div>
    </div>
@endsection
