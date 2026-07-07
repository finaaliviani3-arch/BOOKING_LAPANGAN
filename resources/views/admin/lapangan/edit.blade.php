@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
        <div>
            <h2 class="fw-bold mb-1">Edit Lapangan</h2>
            <p class="text-muted mb-0">Perbarui data lapangan dan foto (opsional).</p>
        </div>
        <div>
            <a href="{{ url('/admin/lapangans') }}" class="btn btn-outline-secondary fw-semibold">Kembali</a>
        </div>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @php
                $gambarUrl = null;
                if (!empty($lapangan->gambar)) {
                    $gambarUrl = asset('storage/' . $lapangan->gambar);
                }
            @endphp

            <form action="{{ url('/admin/lapangans/' . $lapangan->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row g-3">
                    <div class="col-12">
                        <label class="form-label fw-semibold">Nama Lapangan</label>
                        <input type="text" name="nama" class="form-control" value="{{ old('nama', $lapangan->nama) }}" required>
                    </div>

                    <div class="col-12 col-md-6">
                        <label class="form-label fw-semibold">Harga per Jam</label>
                        <input type="number" name="harga" class="form-control" value="{{ old('harga', $lapangan->harga) }}" min="0" step="1" required>
                    </div>

                    <div class="col-12 col-md-6">
                        <label class="form-label fw-semibold">Status</label>
                        <select name="status" class="form-select" required>
                            <option value="active" {{ old('status', $lapangan->status) === 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ old('status', $lapangan->status) === 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                    <div class="col-12">
                        <label class="form-label fw-semibold">Fasilitas</label>
                        <input type="text" name="fasilitas" class="form-control" value="{{ old('fasilitas', $lapangan->fasilitas) }}" placeholder="Pisahkan dengan koma, contoh: Lampu,Loker,Skorboard">
                    </div>

                    <div class="col-12">
                        <label class="form-label fw-semibold">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" rows="4">{{ old('deskripsi', $lapangan->deskripsi) }}</textarea>
                    </div>

                    <div class="col-12">
                        <label class="form-label fw-semibold">Foto Lapangan</label>
                        @if ($gambarUrl)
                            <div class="mb-3">
                                <div class="ratio ratio-16x9 rounded-3 overflow-hidden border" style="max-width: 320px;">
                                    <img src="{{ $gambarUrl }}" alt="Foto Lapangan" class="w-100 h-100 object-fit-cover">
                                </div>
                            </div>
                        @endif
                        <input type="file" name="gambar" class="form-control" accept="image/*">
                        <div class="form-text">Kosongkan jika tidak ingin mengganti foto.</div>
                    </div>
                </div>

                <div class="d-flex flex-column flex-md-row gap-2 mt-4">
                    <button type="submit" class="btn btn-success fw-semibold">Update</button>
                    <button type="reset" class="btn btn-outline-secondary fw-semibold">Reset</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

