<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Asrama Perguruan Islam') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <style>
        /* Tambahkan CSS untuk mengatur spacing */
        body {
            padding-top: 76px; /* Sesuaikan dengan tinggi navbar */
        }

        .navbar {
            height: 76px; /* Tetapkan tinggi navbar */
        }

        /* Tambahan styling untuk navbar */
        .navbar-brand {
            font-size: 1.4rem;
        }

        .nav-link {
            padding: 0.5rem 1rem !important;
            transition: color 0.3s ease;
        }

        .nav-link:hover {
            color: #0d6efd !important;
        }

        /* Pastikan dropdown tidak tertutup */
        .dropdown-menu {
            margin-top: 0.5rem;
        }

        /* Responsif padding untuk layar kecil */
        @media (max-width: 768px) {
            body {
                padding-top: 62px;
            }
            
            .navbar {
                height: 62px;
            }
        }
    </style>
</head>

<body>
    <div id="app">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm fixed-top">
            <div class="container">
                <a class="navbar-brand fw-bold" href="{{ url('/') }}">
                    {{ config('app.name', 'Asrama Perguruan Islam') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
        
                <div class="collapse navbar-collapse" id="navbarContent">
                    <ul class="navbar-nav me-auto"></ul>
                    <ul class="navbar-nav ms-auto align-items-center">
                        <li><a class="nav-link scrollto" href="#awal">Home</a></li>
                        <li><a class="nav-link scrollto" href="#about">About</a></li>
                        <li><a class="nav-link scrollto" href="#jadwal">Jadwal</a></li>
                        <li><a class="nav-link scrollto" href="#portfolio">Portofolio</a></li>
                        <li><a class="nav-link scrollto" href="#guru">Guru</a></li>
                        <li><a class="nav-link scrollto" href="#contact">Contact Us</a></li>
                        
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item ms-2">
                                    <a class="btn btn-primary px-3" href="{{ route('login') }}">Login</a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item ms-2">
                                    <a class="btn btn-outline-primary px-3" href="{{ route('register') }}">Register</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown ms-2">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle btn btn-secondary px-3" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        

        <!-- Main Content -->
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Add required scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
