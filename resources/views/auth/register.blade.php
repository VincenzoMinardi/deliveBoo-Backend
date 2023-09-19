@extends('layouts.app')

@section('content')
<style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
               -webkit-appearance: none;
                margin: 0;
        }
 
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex flex-row">
                    Registrati
                    <div class="text-danger ms-5" id="inputAlert"></div>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" id="registerForm" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4 row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nome*</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
                                <ul class="text-danger" id="nameAlert"></ul>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">Cognome*</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" autocomplete="lastname">
                                <ul id="lastnameAlert" class="text-danger"></ul>

                                @error('lastname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Indirizzo Mail*</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">
                                <ul></ul>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}*</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                                <ul id="passwordAlert"  class="text-danger"></ul>

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Conferma password*</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                                <ul id="confPassAlert"  class="text-danger"></ul>
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="rest_name" class="col-md-4 col-form-label text-md-right">Nome Attività*</label>

                            <div class="col-md-6">
                                <input id="rest_name" type="text" class="form-control" name="rest_name" value="{{ old('rest_name') }}" >
                                <ul></ul>
                            </div>
                        </div>
                        <div class="mb-4 row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">Indirizzo*</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" >
                                <ul id="addressAlert" class="text-danger"></ul>
                            </div>
                        </div>
                        
                        <div class="mb-4 row">
                            <label for="vat" class="col-md-4 col-form-label text-md-right">P.IVA*</label>

                            <div class="col-md-6">
                                <input id="vat" type="number" class="form-control" name="vat" value="{{ old('vat') }}" >
                                <ul id="pIvaAlert" class="text-danger"></ul>
                            </div>
                        </div>
                        
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" id="img" name="img" accept="img/*">
                            <label class="input-group-text  @error('img') is-invalid @enderror" for="img">Upload</label>
                            @error('img')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        
                        
                        
                        
                        
                        
                        <div class="mb-4 row">
                            <span class="col-md-4 col-form-label text-md-right">Tipologie di ristorante*</span>
                            @foreach ($types as $type)
                            <label for="{{ $type->name }}">{{ $type->name }}</label>
                            <input type="checkbox" name="types[]" id="{{ $type->name }}" value="{{ $type->id }}">
                            @endforeach
                                <ul id="typeAlert"  class="text-danger"></ul>
                            </div>
                            
                            <div class="mb-4 row mb-0">
                                <span for="checkSubmit">Confermo che i dati inseriti sono corretti e che non saranno modificabili in seguito.*</span>
                                <input type="checkbox" name="checkSubmit" id="checkSubmit" onCheck="unlock(btnSub)">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary" id="btnSub" disabled>
                                        Registrati
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    