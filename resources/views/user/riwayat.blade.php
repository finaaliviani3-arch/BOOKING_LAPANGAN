@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
        <div>
            <h2 class="fw-bold mb-1">Riwayat Booking</h2>
            <p class="text-muted mb-0">Pantau status pemesanan Anda.</p>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ url('/user/bookings') }}" class="btn btn-success fw-semibold">Buat Booking Baru</a>
        </div>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            @php
                $bookings = $bookings ?? collect();
            @endphp

            @forelse ($bookings as $booking)
                @php
                    $status = $booking->status;
                    $badgeClass = match ($status) {
                        'Pending' => 'bg-warning',
                        'Disetujui' => 'bg-success',
                        'Ditolak' => 'bg-danger',
                        'Selesai' => 'bg-primary',
                        default => 'bg-secondary'
                    };
                @endphp
                <div class="p-3 mb-3 rounded-3" style="background:#f8fafc; border:1px solid #eef2f7;">
                    <div class="d-flex flex-column flex-lg-row align-items-lg-center justify-content-between gap-2">
                        <div>
                            <div class="fw-bold">{{ $booking->lapangan->nama ?? 'Lapangan' }}</div>
                            <div class="text-muted small">
                                {{ $booking->tanggal }} • {{ $booking->jam_mulai }} - {{ $booking->jam_selesai }}
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <span class="badge {{ $badgeClass }}">{{ $status }}</span>
                            <div class="fw-semibold text-success">{{ 'Rp ' . number_format($booking->total_harga ?? 0,0,',','.') }}</div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="alert alert-info mb-0">Belum ada riwayat booking.</div>
            @endforelse
        </div>
    </div>
</div>
@endsection

