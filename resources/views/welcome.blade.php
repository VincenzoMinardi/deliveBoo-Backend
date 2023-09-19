@extends('layouts.app')
@section('content')

<div class="jumbotron p-5 mb-4 rounded-3 d-flex">
    <div class="container py-5">
        <h1 class="display-5 fw-bold">
           Ciao ristoratore,
        </h1>

        <h2>
            benvenuto sulla pagina di amministrazione di DeliveBoo!
        </h2>

        <p class="col-md-8 fs-4">Questa pagina ti permetterà di svolgere varie funzioni tra cui quella di modificare il menù del tuo ristorante.</p>

    </div>
    <img src="{{ Vite::asset('resources/img/jumbo-deliveboo.png') }}" alt="jumbo" id="jumbo" class="col">
</div>

@endsection