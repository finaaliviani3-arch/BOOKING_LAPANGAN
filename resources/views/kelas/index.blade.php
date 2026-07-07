<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hai Ini Web Fina</title>
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
            background: rgba(138, 140, 151, 0.85);
            backdrop-filter: blur(10px);
            border-radius: 24px;
            padding: 60px 50px;
            text-align: center;
            box-shadow: 0 20px 60px rgba(252, 182, 159, 0.4);
            max-width: 480px;
            width: 90%;
        }

        .emoji {
            font-size: 52px;
            margin-bottom: 16px;
        }

        h1 {
            font-family: 'Playfair Display', serif;
            font-size: 2.2rem;
            color: #bcc4fa;
            margin-bottom: 10px;
            line-height: 1.3;
        }

        p {
            color: #a07060;
            font-size: 0.95rem;
            font-weight: 300;
            margin-bottom: 36px;
        }

        .btn {
            display: inline-block;
            background: linear-gradient(135deg, #a0b2dc, #96afdc);
            color: white;
            text-decoration: none;
            padding: 14px 36px;
            border-radius: 50px;
            font-size: 0.95rem;
            font-weight: 500;
            letter-spacing: 0.5px;
            box-shadow: 0 8px 24px rgba(252, 150, 120, 0.4);
            transition: all 0.3s ease;
        }

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 32px rgba(252, 150, 120, 0.5);
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
        <div class="emoji">🌸</div>
        <h1>Hai Ini Web Fina</h1>
        <p>Selamat datang di halaman utama ✨</p>
        <a href="{{ route('kelas.create') }}" class="btn">+ Tambah Kelas</a>
    </div>
</body> 