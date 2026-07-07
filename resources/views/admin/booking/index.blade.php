@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
        <div>
            <h2 class="fw-bold mb-1">Manajemen Booking</h2>
            <p class="text-muted mb-0">Admin dapat mengubah status booking user.</p>
        </div>
        <div>
            <a href="{{ url('/admin/dashboard') }}" class="btn btn-outline-secondary fw-semibold">Dashboard</a>
        </div>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>User</th>
                            <th>Lapangan</th>
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <th>Total Harga</th>
                            <th>Status</th>
                            <th class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $bookings = $bookings ?? collect();
                        @endphp

                        @forelse ($bookings as $i => $booking)
                            <tr>
                                <td class="text-muted">{{ $i + 1 }}</td>
                                <td>
                                    <div class="fw-semibold">{{ $booking->user->name ?? '-' }}</div>
                                    <div class="text-muted small">{{ $booking->user->email ?? '' }}</div>
                                </td>
                                <td class="fw-semibold">{{ $booking->lapangan->nama ?? '-' }}</td>
                                <td>{{ $booking->tanggal }}</td>
                                <td>
                                    <span class="badge bg-light text-dark border">{{ $booking->jam_mulai }}</span>
                                    <span class="text-muted">→</span>
                                    <span class="badge bg-light text-dark border">{{ $booking->jam_selesai }}</span>
                                </td>
                                <td class="fw-semibold text-success">Rp {{ number_format($booking->total_harga ?? 0,0,',','.') }}</td>
                                <td>
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
                                    <span class="badge {{ $badgeClass }}">{{ $status }}</span>
                                </td>
                                <td class="text-end">
                                    <form method="POST" action="{{ url('/admin/bookings/' . $booking->id . '/status') }}" class="d-inline-block">
                                        @csrf
                                        @method('PUT')

                                        <div class="d-flex gap-2 justify-content-end">
                                            <select name="status" class="form-select form-select-sm" style="min-width: 160px;" required>
                                                <option value="Pending" {{ ($booking->status ?? '') === 'Pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="Disetujui" {{ ($booking->status ?? '') === 'Disetujui' ? 'selected' : '' }}>Disetujui</option>
                                                <option value="Ditolak" {{ ($booking->status ?? '') === 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                                                <option value="Selesai" {{ ($booking->status ?? '') === 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                            </select>
                                            <button class="btn btn-sm btn-primary fw-semibold" type="submit">Update</button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8">
                                    <div class="p-4">
                                        <div class="alert alert-info mb-0">Belum ada data booking.</div>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="text-muted small mt-3">
        Catatan: Pastikan backend menyediakan relasi <span class="fw-semibold">booking->user</span> dan <span class="fw-semibold">booking->lapangan</span>, serta endpoint update status sesuai route yang Anda pakai.
    </div>
</div>
@endsection

