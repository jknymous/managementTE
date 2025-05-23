<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard - Manajemen Club Sepak Bola</title>
    @vite('resources/css/app.css')
    <style>
        .hamburger {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            width: 30px;
            height: 24px;
            cursor: pointer;
        }
        .bar {
            height: 3px;
            width: 100%;
            background-color: #4f46e5; /* indigo-600 */
            border-radius: 2px;
            transition: 0.3s ease;
        }
    </style>
</head>
<body class="h-full flex flex-col md:flex-row">

    <!-- Header (Mobile Only) -->
    <div class="md:hidden flex items-center justify-between bg-white shadow p-4">
        <button id="menu-btn" aria-label="Open menu" class="hamburger">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </button>
        <div class="flex justify-center flex-grow">
            <img src="{{ asset('images/top.png') }}" alt="Logo" class="h-12 w-auto object-contain" />
        </div>
    </div>

    <!-- Sidebar -->
    <aside id="sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-full bg-white shadow-md transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out md:static md:shadow-none">
        <!-- Logo Sidebar (Desktop Only) -->
        <div class="hidden md:flex px-6 py-6 items-center justify-center border-b border-gray-200">
            <img src="{{ asset('images/top.png') }}" alt="Logo" class="h-20 w-auto object-contain" />
        </div>

        <!-- Menu -->
        <nav class="flex flex-col space-y-4 px-4 py-6 select-none">
            <a href="#" id="menu-dashboard" class="flex items-center px-4 py-2 rounded text-gray-700 hover:bg-blue-300 hover:text-white transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                </svg>
                Dashboard
            </a>
            <a href="#" id="menu-tambah-pemain" class="flex items-center px-4 py-2 rounded text-gray-700 hover:bg-blue-300 hover:text-white transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                </svg>
                Tambah Pemain
            </a>
            <a href="#" id="menu-rekomendasi-pemain" class="flex items-center px-4 py-2 rounded text-gray-700 hover:bg-blue-300 hover:text-white transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                </svg>
                Rekomendasi Pemain
            </a>
            
            @if(session('role') === 'admin')
            <a href="#" id="menu-tambah-user" class="flex items-center px-4 py-2 rounded text-gray-700 hover:bg-blue-300 hover:text-white transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                Tambah User
            </a>
            @endif
        </nav>

        <!-- Logout -->
        <div class="px-6 py-4 border-t border-gray-200 mt-auto fixed bottom-0 left-0 w-64 bg-white">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full py-2 bg-red-500 hover:bg-red-600 text-white rounded font-semibold flex items-center justify-center transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                    </svg>
                    Logout
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-8 overflow-auto bg-blue-50">
        {{-- Include feature contents --}}
        @include('dashboard.overview')
        @include('dashboard.tambah_pemain')
        @include('dashboard.rekomendasi_pemain')
        @if(session('role') === 'admin')
            @include('dashboard.tambah_user')
        @endif
    </main>

    <script>
        // Sidebar hamburger toggle
        const btn = document.getElementById('menu-btn');
        const sidebar = document.getElementById('sidebar');
    
        btn.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
        });
    
        document.addEventListener('click', function(event) {
            const isClickInside = sidebar.contains(event.target) || btn.contains(event.target);
            if (!isClickInside && !sidebar.classList.contains('-translate-x-full')) {
                sidebar.classList.add('-translate-x-full');
            }
        });
    
        function hideAllSections() {
            menus.forEach(menu => {
                let id = menu.replace('-', '_') + '_content'; // Pastikan ID sesuai
                const section = document.getElementById(id);
                if(section) section.classList.add('hidden');
            });
        }
        menus.forEach(menu => {
            const menuLink = document.getElementById('menu-' + menu);
            if(menuLink){
                menuLink.addEventListener('click', e=>{
                    e.preventDefault();
                    hideAllSections();
                    let id = menu.replace('-', '_') + '_content'; // Pastikan ID sesuai
                    const section = document.getElementById(id);
                    if(section) section.classList.remove('hidden');
                    if(window.innerWidth < 768){
                        sidebar.classList.add('-translate-x-full');
                    }
                });
            }
        });
        document.addEventListener('DOMContentLoaded', () => {
            hideAllSections();
            const dashboardSection = document.getElementById('dashboard_content');
            if(dashboardSection) dashboardSection.classList.remove('hidden');
        });
    </script>
</body>
</html>