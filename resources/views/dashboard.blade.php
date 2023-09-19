@extends('layouts.app')

@section('content')
<div class="container">
   

    <div class="d-flex justify-content-around p-3">
      @foreach ($restaurants as $restaurant)
        <div>
            <div>
              Nome attività: {{ $restaurant->rest_name }}
            </div>
            <div>
              P.IVA: {{ $restaurant->vat }}
            </div>
            <div>
              Indirizzo: {{ $restaurant->address}}
            </div>
            <div> Tipologia: 
              @foreach ($types as $type)
                @if(($loop->count == 1))
                  {{$type->name}}
                @else
                  @if($loop->last == false)
                    {{$type->name}},
                  @else
                    {{$type->name}}
                  @endif
                @endif
              @endforeach
            </div>
                 
        </div>
        <img class="w-25" src={{Vite::asset("resources/img/$restaurant->img")}} alt="">
        <img class="w-25" src={{asset("storage/" . $restaurant->img)}} alt="">
      @endforeach
    </div>

    <h1>I Tuoi Piatti</h1>

    {{-- <div class="d-flex">
      <h5>Crea un nuovo piatto</h5>
      <a class="btn btn-primary" href="{{ route('plates.create') }}">Crea</a>  
    </div> --}}

    @if (session('delete_success'))
      @php $plate = session('delete_success') @endphp
      <div class="alert alert-success">
        "{{ $plate->name }}" è stata eliminata con successo!
      </div>
    @endif

    <table class="table">
      <thead>
        <tr>
          <th scope="col">Nome</th>
          <th scope="col">Ingredienti</th>
          <th class="w-auto" scope="col">Prezzo</th>
          <th class="w-auto" scope="col" colspan="5">Visibile</th>   
        </tr>
      </thead>
      <tbody>
        @foreach ($plates as $plate)
          <tr>
            <td>{{$plate->name}}</td>
            <td>{{$plate->ingredients}}</td>
            <td>€ {{number_format($plate->price/100, 2, ',', '')}}</td>
            <td class="text-center">{{$plate->visibility ? 'Sì' : 'No'}}</td>
            <td></td>
            <td>
              <a href="{{ route('plates.update', ['plate' => $plate->id]) }}" method="GET"><i class="mt-2 fa-solid fa-pen"></i></a> 
            </td>
            <td>
             <button type="button" class="btn myModal" data-bs-toggle="modal" data-bs-target="#{{$plate->id}}" data-id="{{ $plate->id }}">
              <i class="fa-solid fa-trash-can" style="color: #f31212;"></i>
            </button>
              
            </td>

            <div class="modal fade" id="{{$plate->id}}" tabindex="-1" aria-labelledby="myInput" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="myInput">Conferma Eliminazione</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                  Vuoi eliminare {{$plate->name}}?
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                  <form method="post" action="{{ route('plates.destroy', ['plate'=> $plate->id]) }}" id="myForm">
                    @method('delete')
                    @csrf
                    <input type="hidden" name="name">
                    <input type="hidden" name="price">
                    <input type="hidden" name="ingredients">
                    <button class="btn btn-danger">Elimina</button>
                  </form>
                </div>

                </div>
              </div>
            </div>
          </tr>
        @endforeach
      </tbody>
    </table>

    <div class="d-flex justify-content-center align-items-center mb-5">
      {{-- <h5>Crea un nuovo piatto</h5> --}}
      <a class="btn btn-primary ps-5 pe-5 rounded-pill" href="{{ route('plates.create') }}">Aggiungi</a>  
    </div>
  </div>
@endsection


