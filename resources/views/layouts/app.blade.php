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
            @media (max-width: 768px) {
                .navbar-collapse.show {
                    background-color: #ffffff;
                    padding: 1rem;
                    border-radius: 0 0 10px 10px;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                    transition: all 0.3s ease;
                }

                .navbar-collapse .nav-link {
                    color: #333;
                }
            }
            @media (max-width: 768px) {
                .navbar-collapse {
                    transition: max-height 0.4s ease-in-out;
                    overflow: hidden;
                }
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
            color: #2c4964 !important;
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
        /* Hover untuk link navbar */
            .navbar .nav-link:hover {
                color: #2c4964 !important; /* warna biru gelap saat hover */
            }

            /* Hover untuk brand (nama Asrama Perguruan Islam) */
            .navbar .navbar-brand:hover {
                color: #2c4964 !important;
                transition: color 0.3s ease;
            }

            .btn-custom {
            background-color: #2c4964;
            color: white;
            border: none;
        }

            .btn-custom:hover {
                background-color: #1f3348;
                color: white;
            }

            .btn-outline-custom {
                border: 2px solid #2c4964;
                color: #2c4964;
                background-color: transparent;
            }

            .btn-outline-custom:hover {
                background-color: #2c4964;
                color: white;
            }
            .btn-custom, .btn-outline-custom {
            min-width: 100px;         
            padding: 10px 20px;      
            font-size: 16px;          
            text-align: center;       
            border-radius: 8px;       
            font-weight: 600;         
        }
            .navbar .nav-link.active,
            .navbar .nav-link:focus,
            .navbar .nav-link:hover {
                border-bottom: 2px solid #2c4964 !important; /* ganti jadi biru tua */
                color: #2c4964 !important; /* warna teks saat aktif/hover */
            }
            .navbar {
                border-bottom: 2px solid #2c4964 !important; /* biru gelap */
            }
            .custom-button {
                background-color: #2c4964;
                color: #fff;
                border: none;
                padding: 8px 20px;
                border-radius: 5px;
                transition: background-color 0.3s ease;
            }

            .custom-button:hover {
                background-color: #1d3548;
                color: #fff;
            }
    </style>
    
</head>

<body>
    <div id="app">
        <!-- Navbar -->
       <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm fixed-top">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ url('/#awal') }}">
            {{ config('app.name', 'Asrama Perguruan Islam') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav me-auto"></ul>
            <ul class="navbar-nav ms-auto align-items-center">
    @if (!Request::is('admin*') && !Request::is('registrations*') && !Request::is('user*') && !Request::is('login') && !Request::is('register'))
        <li><a class="nav-link scrollto" href="#awal">Beranda</a></li>
        <li><a class="nav-link scrollto" href="#about">Tentang</a></li>
        <li><a class="nav-link scrollto" href="#portfolio">Gallery</a></li>
        <li><a class="nav-link scrollto" href="#guru">Guru</a></li>
        <li><a class="nav-link scrollto" href="#alur">Pendaftaran</a></li>
        <li><a class="nav-link scrollto" href="#contact">Kontak</a></li>

        
    @endif

    @guest
        @if (Route::has('login'))
            <li class="nav-item ms-2">
                <a class="btn btn-custom  px-3" href="{{ route('login') }}">Login</a>
            </li>
        @endif
        @if (Route::has('register'))
            <li class="nav-item ms-2">
                <a class="btn btn-outline-custom  px-3" href="{{ route('register') }}">Register</a>
            </li>
        @endif
    @else
        {{-- Tidak menampilkan apapun --}}
    @endguest
</ul>
<div class="d-md-none text-end mt-3">
        <button class="btn btn-outline-secondary btn-sm me-3" id="closeNavbarBtn">
            <i class="fa fa-times"></i> Tutup
        </button>
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
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const closeBtn = document.getElementById('closeNavbarBtn');
        const navbarCollapse = document.getElementById('navbarContent');

        if (closeBtn) {
            closeBtn.addEventListener('click', function () {
                const bsCollapse = bootstrap.Collapse.getInstance(navbarCollapse);
                if (bsCollapse) {
                    bsCollapse.hide();
                }
            });
        }
    });
</script>



</body>
</html>
