@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row g-4">
        <div class="col-12 col-lg-5">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h2 class="fw-bold mb-1">Form Booking</h2>
                    <p class="text-muted mb-4">Pilih lapangan, waktu, dan konfirmasi booking.</p>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ url('/user/bookings') }}" id="bookingForm">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Lapangan</label>
                            <select name="lapangan_id" class="form-select" required>
                                <option value="" disabled selected>Pilih lapangan</option>
                                @foreach (($lapangans ?? []) as $lapangan)
                                    <option value="{{ $lapangan->id }}" {{ (old('lapangan_id', $selectedLapanganId ?? null) == $lapangan->id) ? 'selected' : '' }} data-harga="{{ $lapangan->harga }}">
                                        {{ $lapangan->nama }} (Rp {{ number_format($lapangan->harga,0,',','.') }} / jam)
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="row g-3">
                            <div class="col-12 mb-3">
                                <label class="form-label fw-semibold">Tanggal</label>
                                <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal') }}" required>
                            </div>

                            <div class="col-12 col-md-6 mb-3">
                                <label class="form-label fw-semibold">Jam Mulai</label>
                                <input type="time" name="jam_mulai" class="form-control" value="{{ old('jam_mulai', '18:00') }}" required>
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <label class="form-label fw-semibold">Jam Selesai</label>
                                <input type="time" name="jam_selesai" class="form-control" value="{{ old('jam_selesai', '19:00') }}" required>
                            </div>
                        </div>

                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label fw-semibold">Durasi (jam)</label>
                                <input type="number" step="0.5" min="0.5" name="durasi" id="durasi" class="form-control" value="{{ old('durasi', 1) }}" readonly>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold">Total Harga</label>
                                <input type="text" id="totalHargaDisplay" class="form-control" value="Rp 0" disabled>
                                <input type="hidden" name="total_harga" id="totalHarga" value="0">
                            </div>
                        </div>

                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-success btn-lg fw-semibold">Konfirmasi Booking</button>
                        </div>

                        <div class="text-muted small mt-3">
                            Dengan menekan tombol konfirmasi, booking Anda akan masuk status <span class="fw-semibold">Pending</span>.
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-7">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between gap-2 mb-3">
                        <h5 class="fw-bold mb-0">Panduan & Perhitungan</h5>
                        <span class="badge bg-secondary">Auto hitung</span>
                    </div>

                    <div class="row g-3">
                        <div class="col-12 col-md-6">
                            <div class="p-3 rounded-3" style="background:#f8fafc; border:1px solid #eef2f7;">
                                <div class="text-muted small">Rumus</div>
                                <div class="fw-semibold">Durasi (jam) × Harga per jam</div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="p-3 rounded-3" style="background:#f8fafc; border:1px solid #eef2f7;">
                                <div class="text-muted small">Catatan</div>
                                <div class="fw-semibold">Jam selesai harus lebih besar dari jam mulai.</div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="d-flex flex-wrap gap-3">
                        <div class="flex-grow-1">
                            <div class="text-muted small mb-1">Preview</div>
                            <div class="fw-semibold" id="previewLapangan">Pilih lapangan untuk melihat harga.</div>
                            <div class="text-success fw-semibold" id="previewHarga">—</div>
                        </div>
                        <div class="text-end">
                            <div class="text-muted small mb-1">Total</div>
                            <div class="fs-5 fw-bold text-success" id="previewTotal">Rp 0</div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    (function () {
        const form = document.getElementById('bookingForm');
        if (!form) return;

        const lapanganSelect = form.querySelector('select[name="lapangan_id"]');
        const jamMulai = form.querySelector('input[name="jam_mulai"]');
        const jamSelesai = form.querySelector('input[name="jam_selesai"]');
        const durasiInput = document.getElementById('durasi');
        const totalHargaInput = document.getElementById('totalHarga');
        const totalHargaDisplay = document.getElementById('totalHargaDisplay');
        const previewLapangan = document.getElementById('previewLapangan');
        const previewHarga = document.getElementById('previewHarga');
        const previewTotal = document.getElementById('previewTotal');

        const formatRp = (n) => {
            const num = Number(n || 0);
            return 'Rp ' + num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        };

        function compute() {
            const opt = lapanganSelect && lapanganSelect.selectedOptions ? lapanganSelect.selectedOptions[0] : null;
            const harga = opt ? Number(opt.getAttribute('data-harga') || 0) : 0;

            const t1 = jamMulai ? jamMulai.value : '';
            const t2 = jamSelesai ? jamSelesai.value : '';

            if (!t1 || !t2 || !harga) {
                durasiInput.value = 0;
                totalHargaInput.value = 0;
                totalHargaDisplay.value = 'Rp 0';
                previewTotal.textContent = 'Rp 0';
                previewHarga.textContent = harga ? formatRp(harga) : '—';
                previewLapangan.textContent = lapanganSelect ? (lapanganSelect.value ? opt?.textContent : 'Pilih lapangan') : '';
                return;
            }

            const [h1, m1] = t1.split(':').map(Number);
            const [h2, m2] = t2.split(':').map(Number);
            const minutes1 = h1 * 60 + m1;
            const minutes2 = h2 * 60 + m2;

            let diff = minutes2 - minutes1;
            if (diff <= 0) {
                durasiInput.value = 0;
                totalHargaInput.value = 0;
                totalHargaDisplay.value = 'Rp 0';
                previewTotal.textContent = 'Rp 0';
                return;
            }

            const durasi = diff / 60;
            durasiInput.value = durasi.toFixed(2).replace(/\.00$/, '');

            const total = durasi * harga;
            const totalInt = Math.round(total);

            totalHargaInput.value = totalInt;
            totalHargaDisplay.value = formatRp(totalInt);
            previewTotal.textContent = formatRp(totalInt);
            previewHarga.textContent = formatRp(harga) + ' / jam';
            previewLapangan.textContent = opt ? opt.textContent.trim() : '';
        }

        if (lapanganSelect) lapanganSelect.addEventListener('change', compute);
        if (jamMulai) jamMulai.addEventListener('change', compute);
        if (jamSelesai) jamSelesai.addEventListener('change', compute);

        compute();
    })();
</script>
@endsection

