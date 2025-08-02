<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asrama Perguruan Islam</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --main-blue:#2c4964;
        }

        .hero {
            background-color: var(--main-blue);
            color: white;
        }

        .navbar {
            background-color: var(--main-blue);
        }

        .navbar-brand, .nav-link {
            font-weight: 600;
            color: white !important;
        }

        .nav-link:hover,
        .nav-link.active {
            text-decoration: underline;
        }

        .btn-outline-light {
            color: white;
            border-color: white;
        }

        .btn-outline-light:hover {
            background-color: white;
            color: var(--main-blue);
        }

        .btn-light {
            background-color: white;
            color: var(--main-blue);
            border: 2px solid white;
        }

        .btn-light:hover {
            background-color: #e6e6e6;
            color: var(--main-blue);
        }

        footer {
            background-color: var(--main-blue);
            color: #fff;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Asrama PI</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tentang">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#program">Program</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#kontak">Kontak</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-light ms-3" href="{{ route('login') }}">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero text-center py-5">
        <div class="container">
            <h1 class="display-4">Selamat Datang di Asrama Perguruan Islam</h1>
            <p class="lead">Menciptakan generasi Qur'ani dan berakhlakul karimah</p>
            <a href="#pendaftaran" class="btn btn-light mt-3">Daftar Sekarang</a>
        </div>
    </section>

    <!-- Konten Lainnya -->
    <section id="tentang" class="py-5">
        <div class="container">
            <h2>Tentang Kami</h2>
            <p>Asrama Perguruan Islam adalah tempat yang berkomitmen untuk membina generasi muda melalui pendidikan berbasis Islam...</p>
        </div>
    </section>

    <section id="program" class="py-5 bg-light">
        <div class="container">
            <h2>Program Kami</h2>
            <p>Berbagai program unggulan seperti hafalan Quran, kegiatan keagamaan, pembinaan akhlak, dan banyak lagi...</p>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center p-3">
        <p>&copy; 2025 Asrama Perguruan Islam. All Rights Reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
