@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
        <div>
            <h2 class="fw-bold mb-1">Dashboard Admin</h2>
            <p class="text-muted mb-0">Ringkasan data lapangan, booking, dan user.</p>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ url('/admin/bookings') }}" class="btn btn-outline-primary fw-semibold">Kelola Booking</a>
            <a href="{{ url('/admin/lapangans') }}" class="btn btn-success fw-semibold">Kelola Lapangan</a>
        </div>

    <div class="row g-3">
        <div class="col-12 col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <div class="text-muted small">Jumlah Lapangan</div>
                            <div class="fs-2 fw-bold text-dark">{{ $jumlahLapangan ?? 0 }}</div>
                        <div class="bg-success bg-opacity-10 text-success rounded-3 p-3" aria-hidden="true">
                            🏟️
                        </div>
                    <a href="{{ url('/admin/lapangans') }}" class="stretched-link"></a>
                </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <div class="text-muted small">Jumlah Booking</div>
                            <div class="fs-2 fw-bold text-dark">{{ $jumlahBooking ?? 0 }}</div>
                        <div class="bg-primary bg-opacity-10 text-primary rounded-3 p-3" aria-hidden="true">
                            📅
                        </div>
                    <a href="{{ url('/admin/bookings') }}" class="stretched-link"></a>
                </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <div class="text-muted small">Jumlah User</div>
                            <div class="fs-2 fw-bold text-dark">{{ $jumlahUser ?? 0 }}</div>
                        <div class="bg-dark bg-opacity-10 text-dark rounded-3 p-3" aria-hidden="true">
                            👤
                        </div>
                    <a href="{{ url('/admin/users') }}" class="stretched-link"></a>
                </div>
        </div>

    <div class="mt-4 card border-0 shadow-sm">
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                <div>
                    <h5 class="fw-bold mb-1">Aksi Cepat</h5>
                    <div class="text-muted small">Mulai kelola data dan konfirmasi booking.</div>
                <div class="d-flex gap-2">
                    <a href="{{ url('/admin/lapangans/create') }}" class="btn btn-success fw-semibold">Tambah Lapangan</a>
                    <a href="{{ url('/admin/bookings') }}" class="btn btn-outline-primary fw-semibold">Update Status Booking</a>
                </div>
        </div>
</div>
@endsection
