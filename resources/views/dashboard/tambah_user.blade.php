<section id="tambah_user_content" class="hidden">
    <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Tambah User</h1>
    <div class="max-w-md mx-auto p-4 bg-white rounded-lg shadow-md relative">
        <form id="tambah-user-form" action="{{ route('user.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="name" class="block text-gray-700">Nama</label>
                <input type="text" name="name" id="name" required class="mt-1 block w-full border border-gray-300 rounded-md p-2" />
            </div>
            <div>
                <label for="username" class="block text-gray-700">Username</label>
                <input type="text" name="username" id="username" required class="mt-1 block w-full border border-gray-300 rounded-md p-2" />
            </div>
            <div class="relative">
                <label for="password" class="block text-gray-700">Password</label>
                <input type="password" name="password" id="password" required class="mt-1 block w-full border border-gray-300 rounded-md p-2 pr-10" />
                <button type="button" onclick="togglePassword('password')" class="absolute top-1/2 right-2 transform text-gray-500 hover:text-gray-700 focus:outline-none p-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg> 
                </button>
            </div>
            <div class="relative">
                <label for="password_confirmation" class="block text-gray-700">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required class="mt-1 block w-full border border-gray-300 rounded-md p-2 pr-10" />
                <button type="button" onclick="togglePassword('password_confirmation')" class="absolute top-1/2 right-2 transform text-gray-500 hover:text-gray-700 focus:outline-none p-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg> 
                </button>
            </div>
            <button type="submit" class="mt-4 w-full bg-blue-600 text-white rounded-md p-2">Buat User</button>
        </form>

        <!-- Notification -->
        <div id="notification" class="fixed top-4 right-4 bg-green-500 text-white px-4 py-2 rounded shadow-lg opacity-0 pointer-events-none transition-opacity duration-300">
            User berhasil dibuat
        </div>
    </div>
</section>

<script>
    function togglePassword(id) {
        const passwordField = document.getElementById(id);
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
        } else {
            passwordField.type = 'password';
        }
    }

    function showNotification(message, success = true) {
        const notif = document.getElementById('notification');
        notif.textContent = message;
        notif.style.backgroundColor = success ? '#22c55e' : '#ef4444'; // hijau atau merah
        notif.classList.remove('opacity-0', 'pointer-events-none');
        setTimeout(() => {
            notif.classList.add('opacity-0', 'pointer-events-none');
        }, 3000);
    }

    document.getElementById('tambah-user-form').addEventListener('submit', function (event) {
        event.preventDefault();
        const form = this;
        const formData = new FormData(form);

        fetch(form.action, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json',
            },
            body: formData
        })
        .then(async (response) => {
            const data = await response.json();
            if (!response.ok) {
                // Tampilkan pesan error jika ada
                showNotification(data.errors ? data.errors.join(', ') : 'Terjadi kesalahan', false);
                return;
            }
            // Form sukses
            showNotification(data.message || 'User berhasil dibuat', true);
            form.reset();
        })
        .catch((error) => {
            showNotification('Koneksi gagal atau error tidak diketahui', false);
            console.error('Error:', error);
        });
    });
</script>

