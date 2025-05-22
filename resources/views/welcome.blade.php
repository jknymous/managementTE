<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Test Tailwind CSS di Laravel 9</title>

    {{-- Panggil CSS dengan Vite --}}
    @vite('resources/css/app.css')
</head>
<body class="h-full flex items-center justify-center bg-gradient-to-r from-blue-400 to-purple-600">

    <div class="text-center p-6 max-w-md mx-auto rounded-xl bg-white shadow-lg">
        <h1 class="text-4xl font-extrabold text-indigo-600 mb-4">Tailwind CSS Berhasil!</h1>
        <p class="text-gray-700 text-lg">
            Jika Anda melihat tulisan ini dengan styling warna dan layout keren, berarti Tailwind CSS sudah aktif di project Anda.
        </p>
        <button class="mt-6 px-6 py-2 rounded-md bg-indigo-500 text-white font-semibold hover:bg-indigo-700 transition">
            Tombol Tailwind
        </button>
    </div>

</body>
</html>