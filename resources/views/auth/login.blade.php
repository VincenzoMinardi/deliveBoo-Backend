@extends('layouts.app')

@section('content')
<div class="container-fluid mt-4 row">
    <div class="col-1"></div>
    <div class="col-10 justify-content-center">
            <div class="d-flex flex-row p-0 row" style="background: linear-gradient(0deg, #38373C 6.61%, #EE9000 8.16%, #DE8305 14.32%, #C3792E 27.29%, #DA7E01 56.57%, #F19000 75%, #FC9A00 100%);">
                        <img src="{{ Vite::asset('resources/img/jumbo-deliveboo.png') }}" alt="jumbo" id="jumbo" class="col">

                        <div class="d-flex flex-column my-5 col-3">
                            <span class="big-text-login">
                                Dedizione
                            </span>
                            <span class="big-text-login">
                                Buona Cucina
                            </span>
                            <span class="big-text-login">
                                Esperti del settore
                            </span>
                            <span class="slim-text-login mt-5">
                                Quando sei entrato a far parte di questo progetto noi abbiamo dato tutto questo a te.
                            </span>
                            <span class="slim-text-login my-3">
                                Stai facendo un ottimo lavoro, non ti fermare
                            </span>
                            <span class="slim-text-login">
                                Per qualsiasi cosa, noi ci siamo
                            </span>
                        </div>
                    <form method="POST" action="{{ route('login') }}" class="col-4">
                        @csrf

                        <div class="mb-4 d-flex flex-column">
                            <span class="big-text-login pt-5">login</span>
                            <label for="email" class="col-md-4 col-form-label text-md-right label-form">E-Mail Address</label>

                            <div>
                                <input id="email" type="email" placeholder="Il tuo indirizzo email" class="input-form form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus> <!-- input email -->

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 d-flex flex-column">
                            <label for="password" class="col-md-4 col-form-label text-md-right label-form">{{ __('Password') }}</label>

                            <div>
                                <input id="password" type="password" placeholder="La tua password sicura" class="input-form form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <div class="d-flex justify-content-end">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4 row mb-0">
                            <div class="d-flex justify-content-end flex-column">
                                <div class="d-flex justify-content-end">
                                    <button type="reset">
                                        Reset
                                    </button>
                                    <button type="submit" class="button-form">
                                        {{ __('Login') }}
                                    </button>    
                                </div>
                                @if (Route::has('password.request'))
                                <div class="d-flex justify-content-end">
                                    <a class="btn btn-link" href="{{ route('password.request') }}" class="w-auto">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                </div>
                                @endif
                            </div>
                        </div>
                    </form>
            </div>
    </div>
    <div class="col-1"></div>
</div>
@endsection
