<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    {{-- Fonts --}}
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    {{-- Usando Vite --}}
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-sm navbar-light shadow-sm justify-content-center py-4">
            <div class="container p-0">
                <div class="navbar-brand m-0 p-0">
                    <img src="{{ Vite::asset('resources/img/coloratofinale_360.png') }}" alt="logo_sito">
                </div>
                {{-- Logo --}}

                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    
                    {{-- Right Side Of Navbar --}}
                    <ul class="navbar-nav ml-auto">
                        {{-- Authentication Links --}}
                        @guest
                            @if (!Route::is('login') && !Route::is('register'))
                            <li class="nav-item">
                                    <x-b-nav text="Registrati" :routeUrl="route('register')"/>
                                </li>
                                <li class="nav-item">
                                    <x-b-nav text="Accedi" :routeUrl="route('login')"/>
                                </li>
                            @endif
                            @if (Route::is('login'))
                                <li class="nav-item">
                                    <x-b-nav text="Registrati" :routeUrl="route('register')"/>
                                </li>
                            @endif
                            @if (Route::is('register'))
                                <li class="nav-item">
                                    <x-b-nav text="Accedi" :routeUrl="route('login')"/>
                                </li>
                            @endif
                        @endguest
                        @auth
                            @if (Route::is('myfoods'))
                                <li class="nav-item">
                                    <x-b-nav text="Ordini" :routeUrl="route('myorders')"/>
                                </li>
                            @elseif (Route::is('myorders'))
                                <li class="nav-item">
                                    <x-b-nav text="Piatti" :routeUrl="route('myfoods')"/>
                                </li>
                            @endif
                            <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('dashboard') }}">{{__('Dashboard')}}</a>
                                {{-- <a class="dropdown-item" href="{{ url('profile') }}">{{__('Profile')}}</a> --}}
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endauth

                        <a href="http://localhost:5174"><button class="btnStyle">Homepage</button></a>
                        {{-- @if (!Route::has(''))
                        <li class="nav-item">
                            <x-b-nav text="Homepage" :routeUrl="http://localhost:5174"/>
                        </li>
                        @endif --}}
                    </ul>
                </div>
            </div>
        </nav>

        <main class="">
            @yield('content')
        </main>
    </div>
</body>

</html>



{{-- componente bottone :message=""
    @guest
        @if (Route::has('register'))
        bottone Accedi
        @if (Route::has('login'))
        bottone Iscriviti
        @endif
    @endguest

    @auth
        @if (Route::has('MyFoods'))
        bottone Ordini
        @if (Route::has('MyOrders'))
        bottone Piatti
        @endif
    @endauth

    bottone homepage
--}}