@extends('layouts.app')

@section('content')
<div class="container py-5">

    <h2 class="text-center fw-bold mb-4">
        🔍 Hasil Pencarian Lapangan
    </h2>

    <!-- Informasi Pencarian -->
    <div class="card shadow border-0 rounded-4 mb-5">
        <div class="card-body">
            <div class="row text-center">

                <div class="col-md-4">
                    <h6 class="text-muted">📍 Lokasi</h6>
                    <h5>{{ $lokasi ?: '-' }}</h5>
                </div>

                <div class="col-md-4">
                    <h6 class="text-muted">📅 Tanggal</h6>
                    <h5>{{ $tanggal }}</h5>
                </div>

                <div class="col-md-4">
                    <h6 class="text-muted">🕒 Waktu</h6>
                    <h5>{{ $waktu }}</h5>
                </div>

            </div>
        </div>
    </div>

    <h3 class="mb-4">Lapangan Tersedia</h3>

    <div class="row">

    @forelse($lapangans as $lapangan)

    <div class="col-md-4 mb-4">

        <div class="card shadow-sm border-0 rounded-4 h-100">

            <img src="{{ asset('storage/' . $lapangan->gambar) }}"
                 class="card-img-top"
                 style="height:220px; object-fit:cover;">

            <div class="card-body">

                <h5 class="fw-bold">{{ $lapangan->nama }}</h5>

                <p class="text-muted mb-2">
                    📍 {{ $lapangan->lokasi }}
                </p>

                <h4 class="text-success">
                    Rp {{ number_format($lapangan->harga, 0, ',', '.') }} / Jam
                </h4>

                @if($lapangan->status == 'active')
                    <span class="badge bg-success">Tersedia</span>
                @else
                    <span class="badge bg-danger">Tidak Tersedia</span>
                @endif

                <br><br>

                <button class="btn btn-success w-100">
                    Booking Sekarang
                </button>

            </div>

        </div>

    </div>

    @empty

    <div class="col-12">
        <div class="alert alert-warning text-center">
            Tidak ada lapangan yang tersedia.
        </div>
    </div>

    @endforelse

</div>