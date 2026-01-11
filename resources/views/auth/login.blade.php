<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Aplikasi Puskesmas</title>

    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-8">
        <h2 class="text-2xl font-bold text-center text-green-700 mb-6">
            Login Aplikasi Puskesmas
        </h2>

        {{-- Alert Error --}}
        @if ($errors->any())
        <div class="mb-4 bg-red-100 text-red-700 px-4 py-2 rounded">
            <ul class="text-sm list-disc list-inside">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {{-- Form Login --}}
        <form action="{{ route('login') }}" method="POST">
            @csrf

            {{-- Email --}}
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-medium mb-1">
                    Email
                </label>
                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>

            {{-- Password --}}
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-medium mb-1">
                    Password
                </label>
                <input
                    type="password"
                    name="password"
                    required
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>

            {{-- Remember Me --}}
            <div class="flex items-center mb-4">
                <input
                    type="checkbox"
                    name="remember"
                    class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                <label class="ml-2 text-sm text-gray-600">
                    Ingat saya
                </label>
            </div>

            {{-- Submit --}}
            <button
                type="submit"
                class="w-full bg-green-600 text-white py-2 rounded-lg font-semibold hover:bg-green-700 transition">
                Login
            </button>
        </form>

        {{-- Footer --}}
        <p class="text-center text-sm text-gray-500 mt-6">
            © {{ date('Y') }} Aplikasi Puskesmas
        </p>
    </div>

</body>

</html>