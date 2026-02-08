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
        }

        /* Container */
        .login-container {
            width: 100%;
            max-width: 1000px;
            min-height: 550px;
            display: flex;
            overflow: hidden;
            border-radius: 25px;
            background: white;
            box-shadow:
                0 30px 60px rgba(0, 0, 0, 0.25),
                inset 0 0 0 1px rgba(255, 255, 255, 0.2);
        }

        /* Left Image */
        .login-image {
            flex: 1;
            position: relative;
            background: linear-gradient(rgba(236, 72, 153, 0.45),
                rgba(147, 51, 234, 0.45)),
            url("{{ asset('img/bckgrnd.jpeg') }}");
            background-size: cover;
            background-position: center;
            display: none;
        }

        .overlay-text {
            position: absolute;
            bottom: 50px;
            left: 50px;
            color: white;
        }

        .overlay-text h1 {
            font-size: 36px;
            margin-bottom: 10px;
        }

        .overlay-text p {
            font-size: 16px;
            opacity: 0.9;
        }

        /* Right Form */
        .login-section {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 50px 40px;
        }

        .login-box {
            width: 100%;
            max-width: 380px;
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

        /* Title */
        .login-title {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            margin-bottom: 10px;
        }

        .login-logo {
            width: 36px;
        }

        .login-box h2 {
            color: #ec4899;
            font-size: 30px;
            font-weight: 700;
        }

        .subtitle {
            text-align: center;
            font-size: 14px;
            color: #6b7280;
            margin-bottom: 35px;
        }

        /* Alert */
        .alert {
            background: #fdf2f8;
            color: #be185d;
            padding: 12px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 13px;
            border: 1px solid #fbcfe8;
        }

        /* Form */
        .form-group {
            margin-bottom: 22px;
        }

        label {
            font-size: 13px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 6px;
            display: block;
        }

        input {
            width: 100%;
            padding: 12px 16px;
            border-radius: 12px;
            border: 1px solid #f3a4c5;
            font-size: 14px;
            background: #fdf2f8;
            transition: 0.3s;
        }

        input:focus {
            outline: none;
            border-color: #ec4899;
            background: #fff;
            box-shadow: 0 0 0 4px rgba(236, 72, 153, 0.15);
        }

        input:hover {
            border-color: #db2777;
        }

        /* Remember */
        .remember {
            margin-bottom: 25px;
        }

        /* Custom Checkbox */
        .custom-check {
            display: flex;
            align-items: center;
            cursor: pointer;
            font-size: 13px;
            color: #4b5563;
            user-select: none;
        }

        .custom-check input {
            display: none;
        }

        .checkmark {
            width: 18px;
            height: 18px;
            border-radius: 5px;
            border: 2px solid #ec4899;
            margin-right: 8px;
            transition: 0.3s;
            position: relative;
        }

        .custom-check input:checked+.checkmark {
            background: linear-gradient(135deg, #ec4899, #9333ea);
            border-color: transparent;
        }

        .custom-check input:checked+.checkmark::after {
            content: "✓";
            position: absolute;
            color: white;
            font-size: 12px;
            left: 4px;
            top: -1px;
        }

        /* Button */
        button {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #ec4899, #9333ea);
            border: none;
            border-radius: 14px;
            color: white;
            font-weight: 600;
            font-size: 15px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            transform: scale(1.02);
            box-shadow: 0 12px 25px rgba(236, 72, 153, 0.4);
        }

        /* Footer */
        .footer {
            margin-top: 25px;
            font-size: 12px;
            color: #9ca3af;
            text-align: center;
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
                margin: 20px;
            }

            .login-image {
                height: 200px;
            }

            .overlay-text {
                bottom: 20px;
                left: 20px;
            }
        }
    </style>
</head>

<body>

    <div class="login-container">

        <!-- LEFT -->
        <div class="login-image">
            <div class="overlay-text">
                <h1>Selamat Datang 👋</h1>
                <p>Sistem Informasi Manajemen Puskesmas Terpadu</p>
            </div>
        </div>

        <!-- RIGHT -->
        <div class="login-section">

            <div class="login-box">

                <h2 class="login-title">
                    <img src="{{ asset('img/logo.png') }}" class="login-logo">
                    Login
                </h2>

                <p class="subtitle">
                    Silakan masuk untuk mengelola data puskesmas
                </p>

                {{-- Alert --}}
                @if ($errors->any())
                <div class="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ route('login') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label>Email / Username</label>
                        <input type="email" name="email"
                            value="{{ old('email') }}"
                            placeholder="nama@email.com"
                            required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password"
                            placeholder="Masukkan kata sandi"
                            required>
                    </div>

                    <!-- Remember -->
                    <div class="remember">
                        <label class="custom-check">
                            <input type="checkbox" name="remember">
                            <span class="checkmark"></span>
                            Ingat saya
                        </label>
                    </div>

                    <button type="submit">
                        Login
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