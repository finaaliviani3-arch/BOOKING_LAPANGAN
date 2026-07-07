<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Futsal Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<!-- Bootstrap JS (needed for proper click/links like modals/collapses) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <style>
        html {
            scroll-behavior: smooth;
            scroll-padding-top: 80px;
        }

        .hero-section {
            background: linear-gradient(rgba(251, 252, 252, 0.85), rgba(247, 248, 249, 0.95)),
                        url('https://images.unsplash.com/photo-1518604666860-9ed391f76460?w=1200');
            background-size: cover;
            background-position: center;
            padding: 100px 0;
            color: white;
        }

        /* theme blue/white (simple override for this page) */
        .text-green { color: #2196F3 !important; }
        .btn-green {
            background-color: #2196F3;
            color: white;
            border: none;
        }
        .btn-green:hover { background-color: #1E5EFF; color: white; }

        .search-card {
            background-color: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 15px;
        }
        .search-card .form-control {
            background-color: rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
        }

        .feature-box {
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            transition: 0.3s;
            background: white;
        }
        .feature-box:hover {
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            transform: translateY(-5px);
        }

        .court-card {
            border: none;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
            border-radius: 12px;
            overflow: hidden;
            transition: 0.3s;
        }
        .court-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }

        /* keep existing background for navy helper */
        .bg-navy { background-color: #0a192f; }

        .navbar-dark .navbar-nav .nav-link {
            color: rgba(255, 255, 255, 0.7) !important;
        }
        .navbar-dark .navbar-nav .nav-link:hover,
        .navbar-dark .navbar-nav .nav-link.active {
            color: #ffffff !important;
        }

        .custom-navbar {
            position: sticky;
            top: 0;
            z-index: 9999;
        }

        .modal-body .form-control {
            background-color: rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
        }
    </style>
</head>
<body>

    <nav id="beranda" class="navbar navbar-expand-lg navbar-dark bg-navy py-3 custom-navbar shadow">
        <div class="container">
            <a class="navbar-brand fw-bold d-flex align-items-center" href="#beranda">
                <i class="fa-solid fa-soccer-ball text-green me-2"></i> FUTSAL BOOKING
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link active" href="#beranda">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="#lapangan-section">Cari Lapangan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#jadwal-section">Jadwal Saya</a></li>
                    <li class="nav-item"><a class="nav-link" href="#sewaan-section">Sewaan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#kontak-section">Kontak</a></li>
                </ul>
                <div>
                    <a href="{{ route('login') }}" class="btn btn-outline-light me-2 px-3">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-green px-3">Daftar</a>
                </div>
            </div>
        </div>
    </nav>

    <header class="hero-section">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-7">
                    <span class="badge bg-success mb-3 px-3 py-2 rounded-pill">Futsal • Booking Lapangan</span>
                    <h1 class="display-4 fw-bold lh-sm mb-3">BOOKING LAPANGAN FUTSAL <span class="text-green">MUDAH</span> DAN <span class="text-green">CEPAT</span></h1>
                    <p class="lead text-light mb-4">Pesan lapangan futsal favoritmu kapan saja dan di mana saja dengan mudah, transparan, dan aman langsung siap main.</p>
                    <a href="#lapangan-section" class="btn btn-green btn-lg px-4 py-2"><i class="fa-solid fa-calendar-check me-2"></i> Cari Lapangan</a>
                </div>
                <div class="col-lg-5">
                    <div class="card search-card p-4 text-white shadow">
                        <h4 class="fw-bold mb-4">CARI LAPANGAN</h4>
                        <form action="#" method="GET">
                            <div class="mb-3">
                                <label class="form-label small text-muted">Lokasi</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-dark border-secondary text-white"><i class="fa-solid fa-location-dot"></i></span>
                                    <input type="text" name="lokasi" class="form-control" placeholder="Pilih Lokasi" value="Bandung" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label small text-muted">Tanggal</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-dark border-secondary text-white"><i class="fa-solid fa-calendar-days"></i></span>
                                    <input type="date" name="tanggal" class="form-control" required>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="form-label small text-muted">Waktu</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-dark border-secondary text-white"><i class="fa-solid fa-clock"></i></span>
                                    <input type="time" name="waktu" class="form-control" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-green w-100 py-2 fw-bold text-uppercase">Cari Sekarang</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="container my-5 py-4">
        <h3 class="text-center fw-bold mb-5" style="color: #6b82a1;">KENAPA BOOKING DI KAMI?</h3>
        <div class="row g-4">
            <div class="col-md-3">
                <div class="feature-box p-4 text-start h-100">
                    <i class="fa-solid fa-bolt text-green display-6 mb-3"></i>
                    <h5 class="fw-bold">Mudah & Cepat</h5>
                    <p class="text-muted small m-0">Booking lapangan hanya dalam hitungan menit saja.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="feature-box p-4 text-start h-100">
                    <i class="fa-solid fa-shield-halved text-green display-6 mb-3"></i>
                    <h5 class="fw-bold">Aman & Terpercaya</h5>
                    <p class="text-muted small m-0">Transaksi terjamin aman dan data terjaga baik.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="feature-box p-4 text-start h-100">
                    <i class="fa-solid fa-list text-green display-6 mb-3"></i>
                    <h5 class="fw-bold">Banyak Pilihan</h5>
                    <p class="text-muted small m-0">Tersedia beragam pilihan lapangan di berbagai lokasi.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="feature-box p-4 text-start h-100">
                    <i class="fa-solid fa-wallet text-green display-6 mb-3"></i>
                    <h5 class="fw-bold">Pembayaran Mudah</h5>
                    <p class="text-muted small m-0">Berbagai metode transaksi praktis tanpa ribet.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="container my-5 py-4" id="lapangan-section">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold" style="color: #6b82a1;">LAPANGAN POPULER</h3>
            <a href="#" class="text-green fw-bold text-decoration-none">LIHAT SEMUA &rarr;</a>
        </div>

        <div class="row g-4">
            <div class="col-md-3">
                <div class="card court-card h-100">
                    <img src="https://images.unsplash.com/photo-1575361204480-aadea25e6e68?w=400" class="card-img-top" alt="Siliwangi Arena" style="height: 160px; object-fit: cover;">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h6 class="fw-bold m-0">Siliwangi Arena</h6>
                            <span class="text-warning small"><i class="fa-solid fa-star"></i> 4.8</span>
                        </div>
                        <p class="text-muted small mb-3"><i class="fa-solid fa-location-dot"></i> Bandung Kota</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-green fw-bold">Rp 250k<span class="text-muted fw-normal small">/jam</span></span>
                            <a href="{{ route('login') }}" class="btn btn-sm btn-outline-success">Sewa</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="container my-5 py-4" id="jadwal-section">
        <h3 class="fw-bold mb-4" style="color: #6b82a1;">JADWAL LAPANGAN</h3>
        <div class="card border-0 shadow-sm p-4">
            <p class="text-muted mb-0"><i class="fa-solid fa-circle-info text-success me-2"></i> Silakan login terlebih dahulu untuk melihat jadwal pemesanan aktif Anda.</p>
        </div>
    </section>

    <section class="container my-5 py-4" id="sewaan-section">
        <h3 class="fw-bold mb-4" style="color: #6b82a1;">RIWAYAT SEWAAN</h3>
        <div class="card border-0 shadow-sm p-4 text-center">
            <div class="py-4">
                <i class="fa-solid fa-receipt display-4 text-muted mb-3"></i>
                <p class="text-muted m-0">Belum ada data sewaan. Mulai cari lapangan untuk melakukan penyewaan pertama Anda!</p>
            </div>
        </div>
    </section>

    <section class="container my-5 py-4" id="kontak-section">
        <h3 class="fw-bold mb-4" style="color: #6b82a1;">HUBUNGI KAMI</h3>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm p-4 h-100">
                    <h5 class="fw-bold mb-3">Futsal Booking CS</h5>
                    <p class="text-muted"><i class="fa-solid fa-envelope text-green me-2"></i> support@futsalbooking.com</p>
                    <p class="text-muted"><i class="fa-solid fa-phone text-green me-2"></i> +62 812-3456-7890</p>
                    <p class="text-muted"><i class="fa-solid fa-location-dot text-green me-2"></i> Jl. Lapangan Bola No. 10, Bandung</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border-0 shadow-sm p-4">
                    <form>
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Nama Anda" required>
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" placeholder="Email Anda" required>
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" rows="3" placeholder="Pesan Anda" required></textarea>
                        </div>
                        <button type="button" class="btn btn-green w-100">Kirim Pesan</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-navy text-white py-4 mt-5">
        <div class="container">
            <div class="row text-center g-3 small">
                <div class="col-md-3"><i class="fa-solid fa-clock text-green me-2"></i> Booking Kapan Saja 24/7</div>
                <div class="col-md-3"><i class="fa-solid fa-headset text-green me-2"></i> Customer Service Responsif</div>
                <div class="col-md-3"><i class="fa-solid fa-shield text-green me-2"></i> Pembayaran 100% Aman</div>
                <div class="col-md-3"><i class="fa-solid fa-tag text-green me-2"></i> Banyak Promo Menarik</div>
            </div>
            <hr class="border-secondary my-3">
            <p class="text-center text-muted m-0 small">&copy; 2026 Futsal Booking. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>

