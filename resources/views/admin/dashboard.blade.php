@extends('layouts.admin')

@section('content')
<div class="container py-4">

    <!-- Banner -->
    <div class="card border-0 shadow-lg rounded-4 mb-4 text-white"
        style="background: linear-gradient(135deg,#16a34a,#22c55e);">
        <div class="card-body p-4">
            <h2 class="fw-bold">👋 Selamat Datang, Admin</h2>
            <p class="mb-0">
                Kelola data lapangan, booking, dan pengguna dengan mudah.
            </p>
        </div>
    </div>

    <!-- Statistik -->
    <div class="row g-4">

        <div class="col-md-4">
            <div class="card border-0 shadow rounded-4 text-center h-100">
                <div class="card-body">
                    <div style="font-size:55px;">🏟️</div>
                    <h5 class="mt-2">Jumlah Lapangan</h5>
                    <h2 class="fw-bold text-success">
                        {{ $jumlahLapangan ?? 0 }}
                    </h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow rounded-4 text-center h-100">
                <div class="card-body">
                    <div style="font-size:55px;">📅</div>
                    <h5 class="mt-2">Jumlah Booking</h5>
                    <h2 class="fw-bold text-primary">
                        {{ $jumlahBooking ?? 0 }}
                    </h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow rounded-4 text-center h-100">
                <div class="card-body">
                    <div style="font-size:55px;">👤</div>
                    <h5 class="mt-2">Jumlah User</h5>
                    <h2 class="fw-bold text-dark">
                        {{ $jumlahUser ?? 0 }}
                    </h2>
                </div>
            </div>
        </div>

    </div>

    <!-- Aksi Cepat -->
    <div class="card border-0 shadow rounded-4 mt-5">
        <div class="card-body">

            <h4 class="fw-bold mb-4">
                ⚡ Aksi Cepat
            </h4>

            <div class="row">

                <div class="col-md-4 mb-3">
                    <a href="{{ url('/admin/lapangans') }}"
                       class="btn btn-success w-100 py-3">
                        🏟 Kelola Lapangan
                    </a>
                </div>

                <div class="col-md-4 mb-3">
                    <a href="{{ url('/admin/bookings') }}"
                       class="btn btn-primary w-100 py-3">
                        📅 Kelola Booking
                    </a>
                </div>

                <div class="col-md-4 mb-3">
                    <a href="{{ url('/admin/users') }}"
                       class="btn btn-dark w-100 py-3">
                        👤 Kelola User
                    </a>
                </div>

            </div>

        </div>
    </div>

</div>
@endsection