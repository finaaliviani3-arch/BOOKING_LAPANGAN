<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Fina Aliviani - Admin</title>

    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito:400,600,700" rel="stylesheet">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>

        body{
            background:#f4f7fb;
            font-family:Nunito,sans-serif;
        }

        .bbai-admin-layout{
            min-height:100vh;
        }

        .bbai-admin-side{
            width:280px;
            background:linear-gradient(180deg,#166534,#22c55e);
            height:100vh;
            position:sticky;
            top:0;
            color:white;
            box-shadow:0 0 20px rgba(0,0,0,.1);
        }

        .profile{
            text-align:center;
            padding:30px 20px;
        }

        .profile-logo{
            width:80px;
            height:80px;
            border-radius:50%;
            background:white;
            color:#16a34a;
            font-size:30px;
            font-weight:bold;
            display:flex;
            justify-content:center;
            align-items:center;
            margin:auto;
        }

        .profile h4{
            margin-top:15px;
            font-weight:bold;
            color:white;
        }

        .profile p{
            color:#d1fae5;
            margin-bottom:0;
        }

        .bbai-admin-nav .nav-link{

            color:white;
            padding:14px 18px;
            margin-bottom:8px;
            border-radius:12px;
            transition:.3s;
            font-weight:600;

        }

        .bbai-admin-nav .nav-link:hover{

            background:rgba(255,255,255,.2);
            transform:translateX(6px);

        }

        .bbai-admin-nav .nav-link.active{

            background:white;
            color:#166534;

        }

        main{

            background:#f4f7fb;

        }

    </style>

</head>

<body>

<div id="app" class="bbai-admin-layout">

<div class="d-flex">

<aside class="bbai-admin-side">

<div class="profile">

<div class="profile-logo">
FA
</div>

<h4>Fina Aliviani</h4>

<p>Admin Booking Futsal</p>

</div>

<div class="px-3">

<div class="small text-white-50 mb-2">
MENU
</div>

<nav class="nav bbai-admin-nav flex-column">

<a class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}"
href="{{ url('/admin/dashboard') }}">
🏠 Dashboard
</a>

<a class="nav-link {{ request()->is('admin/bookings') ? 'active' : '' }}"
href="{{ url('/admin/bookings') }}">
📅 Kelola Booking
</a>

<a class="nav-link {{ request()->is('admin/lapangans') ? 'active' : '' }}"
href="{{ url('/admin/lapangans') }}">
🏟 Kelola Lapangan
</a>

<a class="nav-link {{ request()->is('admin/posts') ? 'active' : '' }}"
href="{{ url('/admin/posts') }}">
📝 Kelola Postingan
</a>

<a class="nav-link {{ request()->is('admin/users') ? 'active' : '' }}"
href="{{ url('/admin/users') }}">
👥 Kelola User
</a>

<hr class="text-white">

<a class="nav-link"
href="{{ route('logout') }}"
onclick="event.preventDefault();document.getElementById('logout-form-admin').submit();">

🚪 Logout

</a>

<form id="logout-form-admin"
action="{{ route('logout') }}"
method="POST"
class="d-none">

@csrf

</form>

</nav>

</div>

</aside>

<main class="flex-grow-1">

<div class="p-4">

@if(session('success'))
<div class="alert alert-success">
{{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="alert alert-danger">
{{ session('error') }}
</div>
@endif

@yield('content')

</div>

</main>

</div>

</div>

</body>
</html>