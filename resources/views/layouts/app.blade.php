<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center gap-2" href="{{ url('/') }}">
                    <span class="d-inline-flex align-items-center justify-content-center" style="width:38px;height:38px;border-radius:14px;background:linear-gradient(135deg,#0d6efd,#198754);color:#fff;font-weight:800;">F</span>
                    <span class="fw-bold">{{ config('app.name', 'Laravel') }}</span>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link fw-semibold" href="{{ url('/') }}">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-semibold" href="{{ url('/user/lapangans') }}">Cari Lapangan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-semibold" href="{{ url('/user/bookings/riwayat') }}">Jadwal Saya</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-semibold" href="{{ url('/user/lapangans') }}">Sewaan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-semibold" href="{{ url('/#kontak') }}">Kontak</a>
                        </li>

                    </ul>

                    <ul class="navbar-nav ms-auto align-items-lg-center mb-2 mb-lg-0">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link fw-semibold" href="{{ route('login') }}">Login</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="btn btn-success btn-sm fw-semibold ms-lg-2" href="{{ route('register') }}">Daftar</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle fw-semibold" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>


                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
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

        <footer class="mt-5 border-top" style="background: linear-gradient(180deg, rgba(13,110,253,.06), rgba(0,0,0,.0));">
            <div class="container py-5">
                <div class="row g-4">
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="d-flex gap-3 align-items-start">
                            <div class="flex-shrink-0" style="width:44px;height:44px;border-radius:14px;background:#0d6efd1a;display:flex;align-items:center;justify-content:center;">
                                <span aria-hidden="true">⏱️</span>
                            </div>
                            <div>
                                <div class="fw-bold">Booking 24/7</div>
                                <div class="text-muted small">Lakukan pemesanan kapan saja.</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="d-flex gap-3 align-items-start">
                            <div class="flex-shrink-0" style="width:44px;height:44px;border-radius:14px;background:#1987541a;display:flex;align-items:center;justify-content:center;">
                                <span aria-hidden="true">💬</span>
                            </div>
                            <div>
                                <div class="fw-bold">Customer Service</div>
                                <div class="text-muted small">Bantuan cepat untuk kebutuhanmu.</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="d-flex gap-3 align-items-start">
                            <div class="flex-shrink-0" style="width:44px;height:44px;border-radius:14px;background:#ffc1072a;display:flex;align-items:center;justify-content:center;">
                                <span aria-hidden="true">🛡️</span>
                            </div>
                            <div>
                                <div class="fw-bold">Pembayaran Aman</div>
                                <div class="text-muted small">Transaksi lebih terpercaya & aman.</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="d-flex gap-3 align-items-start">
                            <div class="flex-shrink-0" style="width:44px;height:44px;border-radius:14px;background:#dc35451a;display:flex;align-items:center;justify-content:center;">
                                <span aria-hidden="true">🎁</span>
                            </div>
                            <div>
                                <div class="fw-bold">Banyak Promo</div>
                                <div class="text-muted small">Penawaran menarik tiap periode.</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-2 mt-4 pt-4 border-top">
                    <div class="text-muted small">© {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.</div>
                    <div class="text-muted small">Dibuat untuk booking lapangan futsal yang cepat & rapi.</div>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>