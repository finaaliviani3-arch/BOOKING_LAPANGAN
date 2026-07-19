@extends('layouts.app')

@section('content')
<section class="py-5" style="background: linear-gradient(135deg,#0d6efd 0%, #0b1220 55%, #198754 100%); color: white;">
    <div class="container">
        <div class="row align-items-center g-4">
            <div class="col-lg-6">
                <div class="d-inline-flex align-items-center gap-2 rounded-pill bg-white bg-opacity-10 px-4 py-2 mb-3" style="border:1px solid rgba(255,255,255,.2)">
                    <span style="width:8px;height:8px;border-radius:50%;background:#34d399;display:inline-block"></span>
                    <span class="fw-semibold">FUTSAL BOOKING • mudah & cepat</span>
                </div>

                <h1 class="display-4 fw-bold mb-3">
                    BOOKING LAPANGAN FUTSAL MUDAH DAN CEPAT
                </h1>

                <p class="lead mb-4" style="color: rgba(255,255,255,.85)">
                    Cari lapangan terdekat, pilih jadwal, dan booking hanya dalam beberapa langkah.
                    Transparan, cepat, dan cocok untuk pertandingan santai maupun kompetisi.
                </p>

                <div class="d-flex flex-wrap gap-2">
                    <a href="{{ url('/user/lapangans') }}" class="btn btn-success btn-lg fw-semibold px-4">
                        Cari Lapangan
                    </a>
                    <a href="#cara-booking" class="btn btn-outline-light btn-lg fw-semibold px-4">
                        Cara Booking
                    </a>
                </div>

                <div class="row g-3 mt-4">
                    <div class="col-md-4">
                        <div class="p-3 rounded-4 bg-white bg-opacity-10" style="border:1px solid rgba(255,255,255,.15)">
                            <div class="fs-4 fw-bold">24/7</div>
                            <div style="color: rgba(255,255,255,.8)" class="small">Booking kapan saja</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-3 rounded-4 bg-white bg-opacity-10" style="border:1px solid rgba(255,255,255,.15)">
                            <div class="fs-4 fw-bold">Cepat</div>
                            <div style="color: rgba(255,255,255,.8)" class="small">Proses ringkas</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-3 rounded-4 bg-white bg-opacity-10" style="border:1px solid rgba(255,255,255,.15)">
                            <div class="fs-4 fw-bold">Aman</div>
                            <div style="color: rgba(255,255,255,.8)" class="small">Jadwal & riwayat tercatat</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-5 ms-auto">
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-body p-4">
                        <h3 class="fw-bold mb-2">Cari Lapangan</h3>
                        <p class="text-muted mb-4">Isi Lokasi, Tanggal, dan Waktu lalu cari.</p>

                        <form action="{{ url('/user/lapangans') }}" method="GET">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Lokasi</label>
                                <input name="lokasi" type="text" class="form-control form-control-lg" placeholder="Contoh: Jakarta Selatan" />
                            </div>

                            <div class="row g-3">
                                <div class="col-12 col-md-6">
                                    <label class="form-label fw-semibold">Tanggal</label>
                                    <input name="tanggal" type="date" class="form-control form-control-lg" />
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label fw-semibold">Waktu</label>
                                    <input name="waktu" type="time" class="form-control form-control-lg" />
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success btn-lg w-100 mt-3 fw-semibold">
                                Cari Sekarang
                            </button>

                            <div class="text-muted small mt-2">
                                *Tampilan form ini siap dihubungkan ke pencarian sesuai data lapangan.
                            </div>
                        </form>
                    </div>
                </div>

                {{-- Hint background element --}}
                <div class="mt-3 d-none d-md-block">
                    <div class="rounded-4" style="height:12px;background:linear-gradient(90deg,rgba(13,110,253,.9),rgba(25,135,84,.9));opacity:.9"></div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Keunggulan --}}
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Keunggulan</h2>
            <p class="text-muted mb-0">Kenapa banyak tim memilih FUTSAL BOOKING?</p>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center p-4">
                        <div class="fs-1 mb-3">⚡</div>
                        <h5 class="fw-bold">Proses Cepat</h5>
                        <p class="text-muted mb-0">Booking cukup beberapa langkah.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center p-4">
                        <div class="fs-1 mb-3">📍</div>
                        <h5 class="fw-bold">Pilih Lokasi</h5>
                        <p class="text-muted mb-0">Temukan lapangan yang sesuai.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center p-4">
                        <div class="fs-1 mb-3">📅</div>
                        <h5 class="fw-bold">Jadwal Jelas</h5>
                        <p class="text-muted mb-0">Tanggal & waktu tercatat rapi.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center p-4">
                        <div class="fs-1 mb-3">🔒</div>
                        <h5 class="fw-bold">Tertata</h5>
                        <p class="text-muted mb-0">Riwayat booking lebih mudah.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Daftar Lapangan --}}
<section class="py-5">
    <div class="container">
        <div class="d-flex flex-column flex-md-row align-items-md-end justify-content-between gap-3 mb-4">
            <div>
                <h2 class="fw-bold">Daftar Lapangan</h2>        

        <div class="row g-4">
            @php
               $dummy = [
    [
        'id'=> 1,
        'name' => 'Lapangan Futsal Vinyl',
        'loc' => 'Bandung',
        'price' => 'Rp 100.000/jam',
        'rating' => 4.5,
        'image' => 'https://i.pinimg.com/736x/84/83/f5/8483f555f7128a38448d2cb2fb50b31d.jpg'
    ],
    [
       'id'=> 2,
        'name' => 'Lapangan Futsal Rumput',
        'loc' => 'Bandung',
        'price' => 'Rp 120.000/jam',
        'rating' => 4.4,
        'image' => 'https://i.pinimg.com/736x/7e/ec/a5/7eeca5873ee1850f682aaa0c6e55b9ea.jpg'
    ],
    [
        'id'=> 3,
        'name' => 'Lapangan Futsal Traflex',
        'loc' => 'Bandung',
        'price' => 'Rp120.000/jam',
        'rating' => 4.4,
        'image' => 'https://i.pinimg.com/736x/a7/04/53/a704534b6aa2389472fe3fe749435112.jpg'
    ],
    [
        'id'=> 4,
        'name' => 'Lapangan Futsal Traflex',
        'loc' => 'Bandung',
        'price' => 'Rp120.000/jam',
        'rating' => 4.4,
        'image' => 'https://i.pinimg.com/736x/ee/07/e6/ee07e6152016e59916e7aad9f09f70f0.jpg'
    ],
];
            @endphp

            @foreach($dummy as $item)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card border-0 shadow-sm h-100 overflow-hidden">

                     <img src="{{ $item['image'] }}"
                        style="width:100%; height:200px; object-fit:cover;">

                         <div class="card-body p-4">
                            <div class="d-flex align-items-start justify-content-between gap-3">
                                <div>
                                    <div class="fw-bold">{{ $item['name'] }}</div>
                                    <div class="text-muted small mt-1">📍 {{ $item['loc'] }}</div>
                                </div>
                                <div class="badge rounded-pill bg-success bg-opacity-10 text-success border border-success">
                                    ★ {{ $item['rating'] }}
                                </div>
                            </div>

                            <div class="d-flex align-items-center justify-content-between mt-4">
                                <div class="fw-bold">{{ $item['price'] }}</div>
                                  <a class="btn btn-dark btn-sm fw-semibold"
                                      href="{{ route('lapangan.show', $item['id']) }}">
                                         Detail
                                </a>                         
                           </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Cara Booking --}}
<section id="cara-booking" class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Cara Booking</h2>
            <p class="text-muted mb-0">Langkah sederhana untuk booking lapangan futsal.</p>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="rounded-3 bg-primary text-white px-3 py-2 fw-bold">1</div>
                            <div class="fw-bold fs-5">Pilih Lapangan</div>
                        </div>
                        <div class="text-muted">Gunakan fitur Cari Lapangan untuk menemukan yang cocok.</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="rounded-3 bg-success text-white px-3 py-2 fw-bold">2</div>
                            <div class="fw-bold fs-5">Tentukan Jadwal</div>
                        </div>
                        <div class="text-muted">Isi tanggal dan waktu agar jadwalmu sesuai.</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="rounded-3 bg-dark text-white px-3 py-2 fw-bold">3</div>
                            <div class="fw-bold fs-5">Booking Selesai</div>
                        </div>
                        <div class="text-muted">Lihat jadwalmu di menu Jadwal Saya / Booking Saya.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Kontak --}}
<section id="kontak" class="py-5">
    <div class="container">
        <div class="row g-4 align-items-start">
            <div class="col-lg-5">
                <h2 class="fw-bold">Kontak</h2>
                <p class="text-muted">Butuh bantuan? Tim FUTSAL BOOKING siap membantu.</p>

                <div class="mt-4">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <span>📧</span><span class="text-muted">zidan@futsalbooking.id</span>
                    </div>
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <span>☎️</span><span class="text-muted">+62 895-1312-2404</span>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <span>📍</span><span class="text-muted">Bandung & Sekitarnya</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="fw-bold mb-3">Kirim Pesan (Demo)</div>

                        <form>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Nama" />
                                </div>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" placeholder="Email" />
                                </div>
                                <div class="col-12">
                                    <textarea rows="4" class="form-control" placeholder="Pesan"></textarea>
                                </div>
                                <div class="col-12">
                                    <button type="button" class="btn btn-success fw-semibold">Kirim</button>
                                </div>
                                <div class="col-12">
                                    <div class="text-muted small">Form ini contoh tampilan landing page.</div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

