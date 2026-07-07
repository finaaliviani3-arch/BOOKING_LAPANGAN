@extends('user.layouts.dashboard-layout')

@section('content')
<div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
    <div>
        <h2 class="fw-bold mb-1">Cari Lapangan</h2>
        <p class="text-muted mb-0">Pilih lapangan untuk lihat detail dan booking.</p>
    </div>
</div>

{{-- Reuse tampilan existing lapangans --}}
@include('user.lapangans', ['lapangans' => $lapangans ?? collect()])
@endsection

