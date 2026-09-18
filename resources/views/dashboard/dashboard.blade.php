<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin | Portofolio</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50/50 text-gray-700 antialiased font-sans min-h-screen flex flex-col md:flex-row">

    <div id="sidebar-overlay" class="fixed inset-0 bg-gray-900/20 backdrop-blur-sm z-40 hidden md:hidden transition-opacity"></div>

    <!-- Partial Sidebar Kiri -->
    @include('dashboard.partials.sidebar')

    <!-- Main Workspace -->
    <div class="flex-1 flex flex-col min-w-0">
        
        <!-- Header Mobile -->
        <header class="h-14 px-4 bg-white border-b border-gray-100 flex items-center justify-between md:hidden sticky top-0 z-30">
            <button id="open-sidebar-btn" class="p-1.5 rounded-lg bg-gray-50 border border-gray-100 text-gray-600">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
            </button>
            <h3 class="font-bold text-gray-800 text-sm">Dashboard Admin</h3>
            <div class="w-8"></div>
        </header>

        <!-- Main Content -->
        <main class="p-4 sm:p-6 lg:p-8 max-w-7xl w-full mx-auto space-y-12">
            
            @if(session('success'))
                <div class="p-3.5 rounded-xl bg-green-50 border border-green-200 text-green-700 text-xs flex items-center gap-2.5">
                    <svg class="w-4 h-4 text-green-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @include('dashboard.partials.identity')

            @include('dashboard.partials.skills')

            @include('dashboard.partials.education')

            @include('dashboard.partials.certificates')
            
            @include('dashboard.partials.work_logs')

            @include('dashboard.partials.projects')

            @include('dashboard.partials.messages')
            
            @include('dashboard.partials.users')
        </main>
    </div>

    <!-- Script Global Sidebar Mobile Only -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');
            const openBtn = document.getElementById('open-sidebar-btn');
            const closeBtn = document.getElementById('close-sidebar-btn');

            function toggleSidebar() {
                sidebar.classList.toggle('-translate-x-full');
                overlay.classList.toggle('hidden');
            }

            if (openBtn) openBtn.addEventListener('click', toggleSidebar);
            if (closeBtn) closeBtn.addEventListener('click', toggleSidebar);
            if (overlay) overlay.addEventListener('click', toggleSidebar);
        });
    </script>

</body>
</html>