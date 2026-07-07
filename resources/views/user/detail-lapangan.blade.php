@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row g-4">
        <div class="col-12 col-lg-7">
            <div class="card border-0 shadow-sm overflow-hidden">
                <div class="ratio ratio-16x9">
                    <img
                        src="{{ $lapangan->gambar ? asset('storage/' . $lapangan->gambar) : 'https://images.unsplash.com/photo-1518609878373-06d740f60d8b?auto=format&fit=crop&w=1200&q=70' }}"
                        class="w-100 h-100 object-fit-cover"
                        alt="{{ $lapangan->nama }}"
                    >
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between gap-3">
                        <div>
                            <h2 class="fw-bold mb-1">{{ $lapangan->nama }}</h2>
                            <div class="text-success fw-semibold fs-5">Rp {{ number_format($lapangan->harga,0,',','.') }} / jam</div>
                        </div>
                        <span class="badge bg-{{ ($lapangan->status ?? 'active') === 'active' ? 'success' : 'secondary' }}">{{ $lapangan->status ?? 'active' }}</span>
                    </div>

                    <hr>

                    <h5 class="fw-bold">Deskripsi</h5>
                    <p class="text-muted mb-0">{{ $lapangan->deskripsi ?? '—' }}</p>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-5">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="fw-bold">Fasilitas</h5>
                    <div class="d-flex flex-wrap gap-2 mt-2">
                        @php
                            $facilities = is_string($lapangan->fasilitas ?? null)
                                ? explode(',', $lapangan->fasilitas)
                                : (($lapangan->fasilitas ?? null) ? (array)$lapangan->fasilitas : ['Rumput Sintetis','Lampu','Kamar Ganti']);
                        @endphp
                        @foreach($facilities as $f)
                            <span class="badge bg-light text-dark border">{{ trim($f) }}</span>
                        @endforeach
                    </div>

                    <hr>

                    <div class="d-grid">
                        <a href="{{ url('/user/bookings?lapangan_id=' . $lapangan->id) }}" class="btn btn-success btn-lg fw-semibold">Booking Lapangan</a>
                    </div>

                    <div class="alert alert-light border mt-3 mb-0">
                        <div class="fw-semibold">Tips</div>
                        <div class="text-muted small">Pastikan jam mulai dan selesai sesuai durasi agar booking valid.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

