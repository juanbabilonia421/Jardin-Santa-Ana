<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        /* --- Barra de navegación personalizada --- */
        .navbar-custom {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 24px;
            background: #4CAF50; /* Color verde */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.06);
            position: relative;
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 12px;
            white-space: nowrap;
        }

        .logo-img {
            border-radius: 50%;
            object-fit: cover;
            display: inline-block;
        }

        .logo-text {
            margin: 0;
            font-weight: 700;
            font-size: 18px;
            color: white;
            line-height: 1;
        }

        .logo-subtext {
            margin: 0;
            font-size: 12px;
            color: rgba(255,255,255,0.9);
            line-height: 1;
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 18px;
            margin: 0;
            padding: 0;
            align-items: center;
        }

        .nav-links li a {
            text-decoration: none;
            color: white;
            font-weight: 500;
            transition: color 0.2s;
        }

        .nav-links li a:hover {
            color: rgba(255,255,255,0.85);
        }

        /* Responsive small screens */
        @media (max-width: 768px) {
            .navbar-custom { padding: 10px 12px; }
            .logo-text { font-size: 16px; }
            .logo-subtext { display: none; }
        }
    </style>
</head>
<body>
    <div id="app">
        <!-- Navbar: usa la clase personalizada "navbar-custom" para no romper Bootstrap -->
        <nav class="navbar navbar-expand-md navbar-light shadow-sm navbar-custom">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                    <div class="logo-container">
                        <!-- Logo principal (solo uno) -->
                        <img alt="Logo Santa Ana" class="logo-img" height="48" src="{{ asset('images/images.jpg') }}" width="48" />

                        <!-- Texto junto al logo -->
                        <div>
                            <div class="logo-text">Jardín Infantil Santa Ana</div>
                            <div class="logo-subtext">Un lugar para crecer y jugar</div>
                        </div>
                    </div>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar (vacío) -->
                    <ul class="navbar-nav me-auto"></ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto nav-links">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">Iniciar sesión</a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Registrarse</a>
                                </li>
                            @endif
                        @else
                            @role('SuperAdmin|Admin|Manager')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.dashboard') }}">{{ __('Admin Panel') }}</a>
                                </li>
                            @endrole

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                   data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar sesión') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
