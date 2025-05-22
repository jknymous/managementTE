<!DOCTYPE html>
<html lang="en" class="h-full bg-white">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login - Manajemen Club Sepak Bola</title>
    @vite('resources/css/app.css')
</head>
<body class="h-full flex items-center justify-center bg-blue-50">
    <div class="max-w-md w-full bg-white rounded-lg p-8 shadow-md">
        <!-- Logo Image -->
        <div class="mb-8 flex justify-center">
            <img src="{{ asset('images/top.png') }}" alt="Logo Club" class="h-20 w-auto object-contain" />
        </div>

        <form action="{{ route('login.submit') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="username" class="block mb-2 font-semibold text-gray-700">Username</label>
                @error('username')
                    <p class="mb-2 text-red-600 text-sm">{{ $message }}</p>
                @enderror
                <input type="text" id="username" name="username" required
                        value="{{ old('username') }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" 
                        placeholder="Masukkan username" />
            </div>
            <div>
                <label for="password" class="block mb-2 font-semibold text-gray-700">Password</label>
                @error('password')
                    <p class="mb-2 text-red-600 text-sm">{{ $message }}</p>
                @enderror
                <input type="password" id="password" name="password" required
                        class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400"
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

