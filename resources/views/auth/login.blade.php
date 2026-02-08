<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Aplikasi Puskesmas</title>

    <style>
        * {
            box-sizing: border-box;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #ec4899, #9333ea);
            padding: 20px;
        }

        /* Container - Lebih Lebar */
        .login-container {
            width: 100%;
            max-width: 1200px;
            min-height: 600px;
            display: flex;
            overflow: hidden;
            border-radius: 30px;
            background: white;
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.25);
        }

        /* Video Section (Kiri) */
        .login-image {
            flex: 1.2;
            position: relative;
            overflow: hidden;
            display: none;
            background: #000;
            /* Background hitam agar video terlihat rapi */
        }

        #bgVideo {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 100%;
            height: 100%;
            transform: translate(-50%, -50%);
            /* MENGHILANGKAN ZOOM: Menggunakan contain agar seluruh video terlihat */
            object-fit: cover;
            z-index: 1;
        }

        /* Overlay Gradasi - Dibuat sedikit transparan agar video lebih jelas */
        .login-image::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(rgba(236, 72, 153, 0.3), rgba(147, 51, 234, 0.3));
            z-index: 2;
        }

        .overlay-text {
            position: absolute;
            bottom: 60px;
            left: 60px;
            color: white;
            z-index: 3;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
            /* Tambah shadow agar teks terbaca */
        }

        .overlay-text h1 {
            margin: 0;
            font-size: 32px;
        }

        .overlay-text p {
            margin: 5px 0 0;
            opacity: 0.9;
        }

        /* Form Section (Kanan) */
        .login-section {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 50px;
        }

        .login-box {
            width: 100%;
            max-width: 420px;
            animation: fadeIn 1s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-title {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            margin-bottom: 10px;
        }

        .login-logo {
            width: 40px;
        }

        .login-box h2 {
            color: #ec4899;
            font-size: 32px;
            font-weight: 700;
            margin: 0;
        }

        .subtitle {
            text-align: center;
            font-size: 14px;
            color: #6b7280;
            margin-bottom: 35px;
        }

        .form-group {
            margin-bottom: 22px;
        }

        label {
            font-size: 13px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 8px;
            display: block;
        }

        input {
            width: 100%;
            padding: 14px 18px;
            border-radius: 12px;
            border: 1px solid #f3a4c5;
            font-size: 15px;
            background: #fdf2f8;
            transition: 0.3s;
        }

        input:focus {
            outline: none;
            border-color: #ec4899;
            background: #fff;
            box-shadow: 0 0 0 4px rgba(236, 72, 153, 0.15);
        }

        button {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #ec4899, #9333ea);
            border: none;
            border-radius: 14px;
            color: white;
            font-weight: 600;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 10px;
        }

        button:hover {
            transform: scale(1.02);
            box-shadow: 0 12px 25px rgba(236, 72, 153, 0.4);
        }

        /* Responsive */
        @media (min-width: 992px) {
            .login-image {
                display: block;
            }
        }

        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
            }

            .login-image {
                height: 300px;
                display: block;
            }

            .overlay-text {
                bottom: 20px;
                left: 20px;
            }

            .overlay-text h1 {
                font-size: 24px;
            }
        }
    </style>
</head>

<body>

    <div class="login-container">
        <div class="login-image">
            <video autoplay muted loop playsinline id="bgVideo">
                <source src="{{ asset('img/splash1.mp4') }}" type="video/mp4">
            </video>
            <div class="overlay-text">
                <h1>Selamat Datang 👋</h1>
                <p>Sistem Informasi Manajemen Puskesmas Terpadu</p>
            </div>
        </div>

        <div class="login-section">
            <div class="login-box">
                <h2 class="login-title">
                    <img src="{{ asset('img/logo.png') }}" class="login-logo">
                    Login
                </h2>
                <p class="subtitle">Silakan masuk untuk mengelola data puskesmas</p>

                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Email / Username</label>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="nama@email.com" required autofocus>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" placeholder="Masukkan kata sandi" required>
                    </div>
                    <button type="submit">Login</button>
                </form>

                <div style="margin-top: 25px; font-size: 12px; color: #9ca3af; text-align: center;">
                    © {{ date('Y') }} Aplikasi Puskesmas Gadang Hanyar
                </div>
            </div>
        </div>
    </div>

</body>

</html>