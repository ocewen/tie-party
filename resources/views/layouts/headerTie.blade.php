<!DOCTYPE html>
<html lang="es">
    <head lang="{{ app()->getLocale() }}">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Tie-party</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
        <link href="{{ URL::asset('css/reset.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ URL::asset('css/responsive.css') }}" rel="stylesheet" type="text/css">
        <link rel="icon" href="{{ asset('images/logo-TP2.ico') }}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="{{ asset('js/ajax.js') }}" defer></script>
    </head>
    <body class="home">
        <header>
            @guest 
                <a href="/">
                    <div id="logo">
                        <img src="{{URL::asset('/images/public_images/logo.png')}}" alt="Tie-Party Logo">
                        <h1>Tie-Party</h1>
                    </div>
                </a>
            @else  
                <a href="/fiesta/user">
                    <div id="logo">
                        <img src="{{URL::asset('/images/public_images/logo.png')}}" alt="Tie-Party Logo">
                        <h1>Tie-Party</h1>
                    </div>
                </a>
            @endif
            <i class="fa fa-bars"></i>
            <nav>
                <ul class="nav-links">
                    <li class="nav-link"><a href="/">Home</a></li>
                    <li class="nav-link"><a href="/quienes">Quienes somos</a></li>
                    <li class="nav-link"><a href="/contacto">Contacto</a></li>
                    <!-- Boton login -->
                    <li class="nav-link">
                        <a href="#" id="login-nav">
                            @guest 
                            	Login
                            @else  
                            	{{Auth::user()->nombre}}
                            @endif 
                        </a>
                    </li>
                    <!-- Fin boton login -->
                </ul>
            </nav>
            <!-- Modal Login -->
           @include('layouts.modalLogin')
            <!-- Fin Modal Login -->
        </header>