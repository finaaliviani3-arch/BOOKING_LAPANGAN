@extends('layouts.user')

@section('content')

<h2 class="fw-bold">Dashboard User 👋</h2>

<p class="text-muted">
Selamat datang, <strong>{{ Auth::user()->name }}</strong>
</p>

<div class="row mt-4">

    <div class="col-md-4">
        <div class="card shadow border-0">
            <div class="card-body text-center">
                <h1>12</h1>
                <p>Lapangan Tersedia</p>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow border-0">
            <div class="card-body text-center">
                <h1>2</h1>
                <p>Booking Saya</p>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow border-0">
            <div class="card-body text-center">
                <h1>5</h1>
                <p>Riwayat Booking</p>
            </div>
        </div>
    </div>

</div>

@endsection