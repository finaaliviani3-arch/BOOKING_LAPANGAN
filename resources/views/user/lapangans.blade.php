@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
        <div>
            <h2 class="fw-bold mb-1">Lapangan Futsal</h2>
            <p class="text-muted mb-0">Pilih lapangan yang tersedia. Lihat detail lalu lakukan booking.</p>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ url('/user/bookings') }}" class="btn btn-success fw-semibold">Booking</a>
            <a href="{{ url('/user/bookings/riwayat') }}" class="btn btn-outline-primary fw-semibold">Riwayat</a>
        </div>
    </div>

    <div class="row g-3">
        @php
            $lapangans = $lapangans ?? collect();
        @endphp
        @forelse ($lapangans as $lapangan)
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="ratio ratio-16x9">
                        <img
                            src="{{ $lapangan->gambar ? asset('storage/' . $lapangan->gambar) : 'https://images.unsplash.com/photo-1518609878373-06d740f60d8b?auto=format&fit=crop&w=1200&q=70' }}"
                            class="w-100 h-100 object-fit-cover"
                            alt="{{ $lapangan->nama }}"
                        >
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between gap-2">
                            <div>
                                <h5 class="card-title fw-bold mb-1">{{ $lapangan->nama }}</h5>
                                <div class="text-success fw-semibold">Rp {{ number_format($lapangan->harga,0,',','.') }} / jam</div>
                            </div>
                            <span class="badge bg-{{ ($lapangan->status ?? 'active') === 'active' ? 'success' : 'secondary' }}">{{ $lapangan->status ?? 'active' }}</span>
                        </div>

                        <div class="mt-3">
                            <div class="text-muted small mb-2">Fasilitas</div>
                            <div class="d-flex flex-wrap gap-2">
                                @php
                                    $facilities = is_string($lapangan->fasilitas ?? null)
                                        ? explode(',', $lapangan->fasilitas)
                                        : (($lapangan->fasilitas ?? null) ? (array)$lapangan->fasilitas : ['Rumput Sintetis','Lampu','Bangku']);
                                @endphp
                                @foreach($facilities as $f)
                                    <span class="badge bg-light text-dark border">{{ trim($f) }}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="card-footer bg-white border-0 d-flex gap-2">
                        <a href="{{ url('/lapangans/' . $lapangan->id) }}" class="btn btn-outline-dark fw-semibold flex-fill">Detail</a>
                        <a href="{{ url('/user/bookings?lapangan_id=' . $lapangan->id) }}" class="btn btn-success fw-semibold flex-fill">Booking</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">Belum ada lapangan.</div>
            </div>
        @endforelse
    </div>
</div>
@endsection

