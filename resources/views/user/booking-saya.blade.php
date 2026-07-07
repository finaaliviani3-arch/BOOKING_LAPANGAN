<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pencarian Lapangan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar-custom {
            background-color: #0a192f;
        }
        .court-card {
            transition: transform 0.2s;
            border: none;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .court-card:hover {
            transform: translateY(-5px);
        }
        .text-green {
            color: #00a859;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom py-3 shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('welcome') }}">FUTSAL BOOKING</a>
            <a href="{{ route('welcome') }}" class="btn btn-outline-light btn-sm"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
        </div>
    </nav>

    <div class="container my-5">
        <div class="card p-4 mb-5 shadow-sm text-white" style="background-color: #0a192f;">
            <h5 class="mb-3 text-muted text-uppercase tracking-wider" style="font-size: 0.85rem;">Hasil Pencarian Anda</h5>
            <div class="row align-items-center">
                <div class="col-md-4 mb-2 mb-md-0">
                    <i class="fa-solid fa-location-dot text-green me-2"></i> Lokasi: <strong class="text-capitalize">{{ $lokasi }}</strong>
                </div>
                <div class="col-md-4 mb-2 mb-md-0">
                    <i class="fa-solid fa-calendar-days text-green me-2"></i> Tanggal: <strong>{{ \Carbon\Carbon::parse($tanggal)->translatedFormat('d F Y') }}</strong>
                </div>
                <div class="col-md-4">
                    <i class="fa-solid fa-clock text-green me-2"></i> Jam: <strong>{{ $waktu }}</strong>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold m-0" style="color: #0a192f;">Lapangan Tersedia</h3>
            <span class="badge bg-success">4 Lapangan Ditemukan</span>
        </div>

        <div class="row g-4">
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card h-100 court-card">
                    <img src="https://images.unsplash.com/photo-1518604666860-9ed391f76460?w=500" class="card-img-top" alt="Siliwangi Futsal Arena" style="height: 180px; object-fit: cover;">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div>
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <h5 class="card-title fw-bold m-0" style="font-size: 1.1rem;">Siliwangi Arena</h5>
                                <span class="text-warning small"><i class="fa-solid fa-star"></i> 4.8</span>
                            </div>
                            <p class="card-text text-muted small mb-3"><i class="fa-solid fa-location-dot"></i> Bandung Kota</p>
                        </div>
                        <div>
                            <p class="text-green m-0 mb-3" style="font-size: 1.05rem;">Rp 250.000 <span class="text-muted fw-normal" style="font-size: 0.85rem;">/ jam</span></p>
                            <a href="#" class="btn btn-success w-100 fw-semibold" style="background-color: #00a859;">Sewa Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-3">
                <div class="card h-100 court-card">
                    <img src="https://images.unsplash.com/photo-1575361204480-aadea25e6e68?w=500" class="card-img-top" alt="Futsal Station" style="height: 180px; object-fit: cover;">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div>
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <h5 class="card-title fw-bold m-0" style="font-size: 1.1rem;">Victory Futsal</h5>
                                <span class="text-warning small"><i class="fa-solid fa-star"></i> 4.7</span>
                            </div>
                            <p class="card-text text-muted small mb-3"><i class="fa-solid fa-location-dot"></i> Bandung Timur</p>
                        </div>
                        <div>
                            <p class="text-green m-0 mb-3" style="font-size: 1.05rem;">Rp 200.000 <span class="text-muted fw-normal" style="font-size: 0.85rem;">/ jam</span></p>
                            <a href="#" class="btn btn-success w-100 fw-semibold" style="background-color: #00a859;">Sewa Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-3">
                <div class="card h-100 court-card">
                    <img src="https://images.unsplash.com/photo-1560272564-c83b66b1ad12?w=500" class="card-img-top" alt="Goal Futsal" style="height: 180px; object-fit: cover;">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div>
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <h5 class="card-title fw-bold m-0" style="font-size: 1.1rem;">Goal Center</h5>
                                <span class="text-warning small"><i class="fa-solid fa-star"></i> 4.6</span>
                            </div>
                            <p class="card-text text-muted small mb-3"><i class="fa-solid fa-location-dot"></i> Buah Batu</p>
                        </div>
                        <div>
                            <p class="text-green m-0 mb-3" style="font-size: 1.05rem;">Rp 220.000 <span class="text-muted fw-normal" style="font-size: 0.85rem;">/ jam</span></p>
                            <a href="#" class="btn btn-success w-100 fw-semibold" style="background-color: #00a859;">Sewa Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-3">
                <div class="card h-100 court-card">
                    <img src="https://images.unsplash.com/photo-1508098682722-e99c43a406b2?w=500" class="card-img-top" alt="Champions" style="height: 180px; object-fit: cover;">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div>
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <h5 class="card-title fw-bold m-0" style="font-size: 1.1rem;">Champions Futsal</h5>
                                <span class="text-warning small"><i class="fa-solid fa-star"></i> 4.9</span>
                            </div>
                            <p class="card-text text-muted small mb-3"><i class="fa-solid fa-location-dot"></i> Dago</p>
                        </div>
                        <div>
                            <p class="text-green m-0 mb-3" style="font-size: 1.05rem;">Rp 230.000 <span class="text-muted fw-normal" style="font-size: 0.85rem;">/ jam</span></p>
                            <a href="#" class="btn btn-success w-100 fw-semibold" style="background-color: #00a859;">Sewa Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>