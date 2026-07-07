<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kelas - Web Fina</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 50%, #ffecd2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container {
            background: rgba(255, 255, 255, 0.88);
            backdrop-filter: blur(10px);
            border-radius: 24px;
            padding: 50px 44px;
            text-align: center;
            box-shadow: 0 20px 60px rgba(252, 182, 159, 0.4);
            max-width: 440px;
            width: 90%;
        }

        .emoji {
            font-size: 52px;
            margin-bottom: 10px;
            animation: bounce 1.5s infinite;
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        h1 {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            color: #c0735a;
            margin-bottom: 6px;
        }

        .subtitle {
            color: #a07060;
            font-size: 0.85rem;
            font-weight: 300;
            margin-bottom: 30px;
        }

        .input-group {
            position: relative;
            margin-bottom: 20px;
            text-align: left;
        }

        .input-group label {
            display: block;
            font-size: 0.8rem;
            color: #c0735a;
            font-weight: 500;
            margin-bottom: 6px;
            letter-spacing: 0.5px;
        }

        .input-group input {
            width: 100%;
            padding: 14px 18px;
            border: 2px solid #ffd6c4;
            border-radius: 14px;
            font-size: 0.95rem;
            font-family: 'Poppins', sans-serif;
            color: #7a4f3a;
            background: #fff9f7;
            outline: none;
            transition: all 0.3s ease;
        }

        .input-group input:focus {
            border-color: #fcb69f;
            background: #fff;
            box-shadow: 0 0 0 4px rgba(252, 182, 159, 0.2);
        }

        .input-group input::placeholder {
            color: #d4a090;
        }

        .btn {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #fcb69f, #ff9a7b);
            color: white;
            border: none;
            border-radius: 50px;
            font-size: 1rem;
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            cursor: pointer;
            box-shadow: 0 8px 24px rgba(252, 150, 120, 0.4);
            transition: all 0.3s ease;
            margin-top: 8px;
        }

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 32px rgba(252, 150, 120, 0.5);
        }

        .back-link {
            display: inline-block;
            margin-top: 20px;
            color: #c0735a;
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 400;
            transition: opacity 0.2s;
        }

        .back-link:hover {
            opacity: 0.7;
        }

        .decoration {
            position: fixed;
            border-radius: 50%;
            opacity: 0.15;
            background: #fcb69f;
        }

        .decoration.d1 {
            width: 300px;
            height: 300px;
            top: -80px;
            left: -80px;
        }

        .decoration.d2 {
            width: 200px;
            height: 200px;
            bottom: -50px;
            right: -50px;
        }
    </style>
</head>
<body>
    <div class="decoration d1"></div>
    <div class="decoration d2"></div>

    <div class="container">
        <div class="emoji">🎀</div>
        <h1>Tambah Kelas Baru</h1>
        <p class="subtitle">Yuk isi dulu kelasnya~ 💕</p>

        <form action="{{ route('kelas.store') }}" method="POST">
            @csrf
            <div class="input-group">
                <label>✏️ Nama Kelas</label>
                <input type="text" name="nama_kelas" placeholder="Contoh: Kelas A yang lucu~">
            </div>
            <button type="submit" class="btn">🌸 Simpan Kelas</button>
        </form>

        <a href="{{ route('kelas.index') }}" class="back-link">← Kembali ke halaman utama</a>
    </div>
</body>
</html>