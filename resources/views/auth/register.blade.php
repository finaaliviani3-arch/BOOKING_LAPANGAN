<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - Futsal Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(rgba(10, 25, 47, 0.9), rgba(10, 25, 47, 0.95)), 
                        url('https://images.unsplash.com/photo-1518604666860-9ed391f76460?w=1200');
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 40px 0;
        }
        .register-card {
            background-color: rgba(255, 255, 255, 0.06);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            color: white;
        }
        .form-control {
            background-color: rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
        }
        .form-control:focus {
            background-color: rgba(0, 0, 0, 0.4);
            border-color: #00a859;
            color: white;
            box-shadow: none;
        }
        .text-green {
            color: #00a859;
        }
        .btn-green {
            background-color: #00a859;
            color: white;
            border: none;
        }
        .btn-green:hover {
            background-color: #008744;
            color: white;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="text-center mb-4">
                <a href="{{ route('welcome') }}" class="text-decoration-none text-white fs-3 fw-bold">
                    <i class="fa-solid fa-soccer-ball text-green me-2"></i>FUTSAL <span class="text-green">BOOKING</span>
                </a>
            </div>
            
            <div class="card register-card p-4 shadow">
                <h4 class="fw-bold text-center mb-2">Buat Akun Baru</h4>
                <p class="text-muted small text-center mb-4">Daftar untuk mulai booking lapangan futsal favoritmu</p>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label small text-light">Nama Lengkap</label>
                        <div class="input-group">
                            <span class="input-group-text bg-dark border-secondary text-white"><i class="fa-solid fa-user"></i></span>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nama Anda">
                        </div>
                        @error('name')
                            <span class="text-danger small mt-1 d-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label small text-light">Alamat Email</label>
                        <div class="input-group">
                            <span class="input-group-text bg-dark border-secondary text-white"><i class="fa-solid fa-envelope"></i></span>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" placeholder="nama@email.com">
                        </div>
                        @error('email')
                            <span class="text-danger small mt-1 d-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label small text-light">Password</label>
                        <div class="input-group">
                            <span class="input-group-text bg-dark border-secondary text-white"><i class="fa-solid fa-lock"></i></span>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="new-password" placeholder="••••••••">
                        </div>
                        @error('password')
                            <span class="text-danger small mt-1 d-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label small text-light">Konfirmasi Password</label>
                        <div class="input-group">
                            <span class="input-group-text bg-dark border-secondary text-white"><i class="fa-solid fa-circle-check"></i></span>
                            <input type="password" name="password_confirmation" class="form-control" required autocomplete="new-password" placeholder="••••••••">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-green w-100 py-2.5 fw-bold mb-3">DAFTAR SEKARANG</button>
                    
                    <div class="text-center mt-3">
                        <p class="small text-muted m-0">Sudah punya akun? <a href="{{ route('login') }}" class="text-green text-decoration-none fw-bold">Login di sini</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>