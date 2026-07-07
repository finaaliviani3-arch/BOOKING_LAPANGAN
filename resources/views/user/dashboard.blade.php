<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Customer</title>
</head>
<body>

    <h1>Dashboard Customer</h1>

    <h3>Selamat datang, {{ Auth::user()->name }} 👋</h3>

    <p>Role: {{ Auth::user()->role }}</p>

    <hr>

    <ul>
        <li><a href="{{ route('welcome') }}">🏠 Beranda</a></li>
        <li><a href="{{ route('user.bookings') }}">📅 Booking</a></li>
        <li><a href="#">👤 Profil</a></li>
    </ul>

</body>
</html>