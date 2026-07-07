@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row g-4">
        <div class="col-12">
            <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-3">
                <div>
                    <h2 class="fw-bold mb-1">Halo, {{ Auth::user()->name }}</h2>
                    <p class="text-muted mb-0">Selamat datang! Pilih lapangan dan lakukan booking.</p>
                </div>
                <div class="d-flex gap-2">
                    <a href="{{ url('/user/bookings/riwayat') }}" class="btn btn-outline-primary fw-semibold">Riwayat Booking</a>
                </div>
            </div>

            <div class="row g-3">
                <div class="col-12 col-lg-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body">
                            <h5 class="fw-bold">Mulai Booking</h5>
                            <p class="text-muted mb-3">Cari lapangan yang tersedia dan konfirmasi booking.</p>
                            <div class="d-grid">
                                <a href="{{ url('/user/bookings') }}" class="btn btn-success fw-semibold">Booking Lapangan</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-8">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <h5 class="fw-bold mb-0">Daftar Lapangan Tersedia</h5>
                                <span class="text-muted">Tampilkan data dari controller.</span>
                            </div>

                            <div class="row g-3">
                                @php
                                    $lapangans = $lapangans ?? collect();
                                @endphp
                                @forelse ($lapangans as $lapangan)
                                    <div class="col-12 col-md-6">
                                        <div class="d-flex gap-3 align-items-stretch h-100 p-2 rounded-3" style="background:#f8fafc; border:1px solid #eef2f7;">
                                            <div class="flex-shrink-0" style="width:96px;">
                                                <img
                                                    src="{{ $lapangan->gambar ? asset('storage/' . $lapangan->gambar) : 'https://images.unsplash.com/photo-1518609878373-06d740f60d8b?auto=format&fit=crop&w=600&q=70' }}"
                                                    alt="{{ $lapangan->nama }}"
                                                    class="rounded-3 w-100 h-100 object-fit-cover"
                                                >
                                            </div>
                                            <div class="flex-grow-1">
                                                <div class="d-flex align-items-start justify-content-between gap-2">
                                                    <div>
                                                        <div class="fw-bold">{{ $lapangan->nama }}</div>
                                                        <div class="text-success fw-semibold">Rp {{ number_format($lapangan->harga,0,',','.') }} / jam</div>
                                                    </div>
                                                    <span class="badge bg-{{ ($lapangan->status ?? 'active') === 'active' ? 'success' : 'secondary' }}">{{ $lapangan->status ?? 'active' }}</span>
                                                </div>
                                                <div class="d-flex gap-2 mt-2">
                                                    <a href="{{ url('/lapangans/' . $lapangan->id) }}" class="btn btn-sm btn-outline-dark fw-semibold">Detail</a>
                                                    <a href="{{ url('/user/bookings?lapangan_id=' . $lapangan->id) }}" class="btn btn-sm btn-success fw-semibold">Booking</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-12">
                                        <div class="alert alert-info mb-0">Belum ada data lapangan.</div>
                                    </div>
                                @endforelse
                            </div>

                        </div>
                        <div class="card-footer bg-white border-0">
                            <a href="{{ url('/user/bookings') }}" class="btn btn-outline-success fw-semibold">Lihat Semua & Booking</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

