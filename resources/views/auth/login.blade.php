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
            padding: 0;
            min-height: 100vh;
            display: flex;
            background-color: #fdf2f8;
        }

        /* Container Utama */
        .login-container {
            display: flex;
            width: 100%;
            min-height: 100vh;
            overflow: hidden;
        }

        /* Sisi Kiri: Foto */
        .login-image {
            flex: 1;
            display: none;
            /* Sembunyikan di HP */
            position: relative;
            background: linear-gradient(rgba(236, 72, 153, 0.4), rgba(236, 72, 153, 0.4)),
            url("{{ asset('img/bckgrnd.png') }}");
            background-size: cover;
            background-position: center;
        }

        .login-image .overlay-text {
            position: absolute;
            bottom: 50px;
            left: 50px;
            color: white;
            text-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }

        /* Sisi Kanan: Form */
        .login-section {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            background: white;
            padding: 40px;
        }

        .login-box {
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .login-box h2 {
            color: #ec4899;
            margin-bottom: 10px;
            font-size: 32px;
            font-weight: 700;
        }

        .subtitle {
            font-size: 14px;
            color: #6b7280;
            margin-bottom: 30px;
        }

        /* Alert Error */
        .alert {
            background: #fdf2f8;
            color: #be185d;
            padding: 12px;
            border-radius: 10px;
            margin-bottom: 20px;
            text-align: left;
            font-size: 13px;
            border: 1px solid #fbcfe8;
        }

        .alert ul {
            margin: 0;
            padding-left: 20px;
        }

        /* Form Styling */
        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        label {
            font-size: 14px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 8px;
            display: block;
        }

        input {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #f3a4c5;
            border-radius: 12px;
            outline: none;
            transition: all 0.3s ease;
            font-size: 15px;
            background-color: #fff;
        }

        input:focus {
            border-color: #ec4899;
            box-shadow: 0 0 0 4px rgba(236, 72, 153, 0.1);
        }

        .remember {
            display: flex;
            align-items: center;
            font-size: 14px;
            color: #4b5563;
            margin-bottom: 25px;
        }

        .remember input {
            width: auto;
            margin-right: 10px;
            cursor: pointer;
        }

        button {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #ec4899, #db2777);
            border: none;
            border-radius: 12px;
            color: white;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 16px;
        }

        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(236, 72, 153, 0.3);
            opacity: 0.95;
        }

        .footer {
            margin-top: 30px;
            font-size: 13px;
            color: #9ca3af;
        }

        /* Responsive */
        @media (min-width: 992px) {
            .login-image {
                display: block;
            }
        }
    </style>
</head>

<body>

    <div class="login-container">

        <div class="login-image">
            <div class="overlay-text">
                <h1>Selamat Datang</h1>
                <p>Sistem Informasi Manajemen Puskesmas terpadu.</p>
            </div>
        </div>

        <div class="login-section">
            <div class="login-box">
                <h2>💗 Login</h2>
                <p class="subtitle">Silakan masuk untuk mengelola data puskesmas</p>

                {{-- Alert Error --}}
                @if ($errors->any())
                <div class="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                {{-- Form Login --}}
                <form action="{{ route('login') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label>Email / Username</label>
                        <input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                            placeholder="nama@email.com">
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input
                            type="password"
                            name="password"
                            required
                            placeholder="Masukkan kata sandi">
                    </div>

                    <div class="remember">
                        <input type="checkbox" name="remember" id="remember">
                        <label for="remember" style="display: inline; font-weight: 400; margin: 0;">Ingat saya</label>
                    </div>

                    <button type="submit">
                        Masuk ke Aplikasi
                    </button>
                </form>

                <div class="footer">
                    © {{ date('Y') }} Aplikasi Puskesmas Gadang Hanyar
                </div>
            </div>
        </div>

    </div>

</body>

</html>