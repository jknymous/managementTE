<!DOCTYPE html>
<html lang="en" class="h-full bg-white">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <title>Login - Manajemen Club Sepak Bola</title>
    @vite('resources/css/app.css')
    <style>
        /* Custom media query untuk max-width 380px */
        @media (max-width: 380px) {
            .login-container {
                padding: 1rem !important; /* reduce padding */
                width: 95% !important; /* almost full width */
            }
            .login-logo img {
                height: 60px !important; /* smaller logo */
            }
            .login-form input[type="text"],
            .login-form input[type="password"],
            .login-form button {
                font-size: 0.875rem !important; /* smaller font */
                padding: 0.5rem !important; /* reduce padding */
            }
            .login-form label {
                font-size: 0.9rem !important; /* smaller label font */
            }
        }
    </style>
</head>
<body class="h-full flex items-center justify-center bg-blue-50">

    <div class="login-container max-w-md w-full bg-white rounded-lg p-8 shadow-md mx-4">
        <!-- Logo -->
        <div class="login-logo mb-8 flex justify-center">
            <img src="{{ asset('images/top.png') }}" alt="Logo Club" class="h-20 w-auto object-contain" />
        </div>

        <form action="{{ route('login.submit') }}" method="POST" class="login-form space-y-6">
            @csrf
            <div>
                <label for="username" class="block mb-2 font-semibold text-gray-700">Username</label>
                @error('username')
                    <p class="mb-2 text-red-600 text-sm">{{ $message }}</p>
                @enderror
                <input type="text" id="username" name="username" required
                        value="{{ old('username') }}"
                        class="w-full px-3 py-2 border border-blue-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400"
                        placeholder="Masukkan username" />
            </div>
            <div>
                <label for="password" class="block mb-2 font-semibold text-gray-700">Password</label>
                @error('password')
                    <p class="mb-2 text-red-600 text-sm">{{ $message }}</p>
                @enderror
                <input type="password" id="password" name="password" required
                        class="w-full px-3 py-2 border border-blue-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400"
                        placeholder="Masukkan password" />
            </div>
            <div>
                <button type="submit"
                        class="w-full py-2 bg-blue-400 text-white font-semibold rounded hover:bg-blue-500 transition">
                    Login
                </button>
            </div>
        </form>
    </div>

</body>
</html>