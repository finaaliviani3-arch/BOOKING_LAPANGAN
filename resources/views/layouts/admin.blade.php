<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        .bbai-admin-layout { min-height: 100vh; }
        .bbai-admin-side {
            width: 260px;
            position: sticky;
            top: 0;
            height: 100vh;
        }
        .bbai-admin-nav .nav-link {
            border-radius: 12px;
            color: #334155;
            font-weight: 600;
        }
        .bbai-admin-nav .nav-link.active {
            background: rgba(13,110,253,.12);
            color: #0d6efd;
        }
    </style>
</head>
<body>
<div id="app" class="bbai-admin-layout">
    <div class="d-flex">
        <aside class="bbai-admin-side bg-white border-end">
            <div class="p-4">
                <div class="d-flex align-items-center gap-2">
                    <span class="d-inline-flex align-items-center justify-content-center" style="width:40px;height:40px;border-radius:14px;background:linear-gradient(135deg,#0d6efd,#198754);color:#fff;font-weight:800;">F</span>
                    <div>
                        <div class="fw-bold">{{ config('app.name', 'Laravel') }}</div>
                        <div class="text-muted small">Dashboard Admin</div>
                    </div>
                </div>

                <div class="mt-4">
                    <div class="text-muted small mb-2">Menu</div>
                    <nav class="nav bbai-admin-nav flex-column gap-1">
                        <a class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}" href="{{ url('/admin/dashboard') }}">Dashboard</a>
                        <a class="nav-link {{ request()->is('admin/bookings') ? 'active' : '' }}" href="{{ url('/admin/bookings') }}">Kelola Booking</a>
                        <a class="nav-link {{ request()->is('admin/lapangans') ? 'active' : '' }}" href="{{ url('/admin/lapangans') }}">Kelola Lapangan</a>
                        <a class="nav-link {{ request()->is('admin/posts') || request()->is('admin/posts/*') ? 'active' : '' }}" href="{{ url('/admin/posts') }}">Kelola Postingan</a>
                        <a class="nav-link {{ request()->is('admin/users') ? 'active' : '' }}" href="{{ url('/admin/users') }}">Kelola User</a>

                        <div class="mt-3 border-top pt-3">
                            <a class="nav-link" href="{{ route('logout') }}"
                               onclick="event.preventDefault();document.getElementById('logout-form-admin').submit();">
                                Logout
                            </a>
                            <form id="logout-form-admin" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </nav>
                </div>
            </div>
        </aside>

        <main class="flex-grow-1 bg-light">
            <div class="p-4">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                @yield('content')
            </div>
        </main>
    </div>
</div>
</body>
</html>

