@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <div class="card shadow-lg border-0">
        <img src="{{ $lapangan['gambar'] }}"
             class="card-img-top"
             style="height:400px; object-fit:cover;">

        <div class="card-body">

            <h2 class="fw-bold">{{ $lapangan['nama'] }}</h2>

            <p class="text-muted">
                📍 {{ $lapangan['lokasi'] }}
            </p>

            <h4 class="text-success fw-bold">
                {{ $lapangan['harga'] }}
            </h4>

            <hr>

            <h5>Deskripsi</h5>

            <p>
                {{ $lapangan['deskripsi'] }}
            </p>

            <a href="#" class="btn btn-success">
                Booking Sekarang
            </a>

            <a href="{{ url('/') }}" class="btn btn-secondary">
                Kembali
            </a>

        </div>
    </div>

</div>
@endsection