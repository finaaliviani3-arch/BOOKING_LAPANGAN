<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Customer</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body{
            background:#f4f8fb;
        }

        .navbar{
            background:#0d6efd;
        }

        .navbar-brand,
        .navbar .nav-link,
        .navbar-text{
            color:white !important;
        }

        .hero{
            background:linear-gradient(135deg,#0d6efd,#4dabff);
            color:white;
            border-radius:20px;
            padding:40px;
        }

        .card-menu{
            border:none;
            border-radius:15px;
            transition:.3s;
        }

        .card-menu:hover{
            transform:translateY(-5px);
            box-shadow:0 8px 20px rgba(0,0,0,.1);
        }

        .lapangan img{
            height:180px;
            object-fit:cover;
        }

        footer{
            margin-top:50px;
            padding:20px;
            text-align:center;
            color:#777;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg">
    <div class="container">

        <a class="navbar-brand fw-bold" href="#">
            ⚽ Booking Lapangan
        </a>

        <div class="ms-auto text-white">

            <i class="bi bi-person-circle"></i>

            {{ Auth::user()->name }}

        </div>

    </div>
</nav>

<div class="container mt-4">

    <div class="hero">

        <h2>Halo, {{ Auth::user()->name }} 👋</h2>

        <p>
            Selamat datang di Sistem Booking Lapangan.
            Yuk booking lapangan favoritmu sekarang!
        </p>

        <a href="#" class="btn btn-light">
            Booking Sekarang
        </a>

    </div>

    <div class="row mt-4">

        <div class="col-md-4 mb-3">

            <div class="card card-menu shadow-sm">

                <div class="card-body text-center">

                    <i class="bi bi-calendar-check fs-1 text-primary"></i>

                    <h5 class="mt-3">
                        Booking Saya
                    </h5>

                    <h2>3</h2>

                </div>

            </div>

        </div>

        <div class="col-md-4 mb-3">

            <div class="card card-menu shadow-sm">

                <div class="card-body text-center">

                    <i class="bi bi-clock-history fs-1 text-success"></i>

                    <h5 class="mt-3">
                        Jadwal Hari Ini
                    </h5>

                    <h2>1</h2>

                </div>

            </div>

        </div>

        <div class="col-md-4 mb-3">

            <div class="card card-menu shadow-sm">

                <div class="card-body text-center">

                    <i class="bi bi-receipt fs-1 text-danger"></i>

                    <h5 class="mt-3">
                        Riwayat
                    </h5>

                    <h2>12</h2>

                </div>

            </div>

        </div>

    </div>

    <h3 class="mt-5 mb-4">
        Lapangan Populer
    </h3>

    <div class="row">

        <div class="col-md-4 mb-4">

            <div class="card lapangan shadow">

                <img src="https://images.unsplash.com/photo-1517466787929-bc90951d0974?w=600"
                    class="card-img-top">

                <div class="card-body">

                    <h5>Lapangan Futsal A</h5>

                    <p>
                        ⭐ 4.9
                    </p>

                    <h5 class="text-primary">
                        Rp100.000 / Jam
                    </h5>

                    <a href="#" class="btn btn-primary w-100">
                        Booking
                    </a>

                </div>

            </div>

        </div>

        <div class="col-md-4 mb-4">

            <div class="card lapangan shadow">

                <img src="https://images.unsplash.com/photo-1546519638-68e109498ffc?w=600"
                    class="card-img-top">

                <div class="card-body">

                    <h5>Lapangan Badminton</h5>

                    <p>
                        ⭐ 4.8
                    </p>

                    <h5 class="text-primary">
                        Rp80.000 / Jam
                    </h5>

                    <a href="#" class="btn btn-primary w-100">
                        Booking
                    </a>

                </div>

            </div>

        </div>

        <div class="col-md-4 mb-4">

            <div class="card lapangan shadow">

                <img src="https://images.unsplash.com/photo-1522778119026-d647f0596c20?w=600"
                    class="card-img-top">

                <div class="card-body">

                    <h5>Lapangan Voli</h5>

                    <p>
                        ⭐ 4.7
                    </p>

                    <h5 class="text-primary">
                        Rp90.000 / Jam
                    </h5>

                    <a href="#" class="btn btn-primary w-100">
                        Booking
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

<footer>

    © {{ date('Y') }} Booking Lapangan

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>