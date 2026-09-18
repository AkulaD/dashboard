<!-- Sidebar Navigasi Kiri (Sticky & Fixed Desktop) -->
<aside id="sidebar" class="fixed md:sticky top-0 inset-y-0 left-0 w-60 h-screen bg-white border-r border-gray-100 flex flex-col justify-between z-50 transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out shrink-0 overflow-y-auto">
    <div>
        <div class="h-16 px-6 flex items-center justify-between border-b border-gray-100 sticky top-0 bg-white/95 backdrop-blur-sm z-10">
            <div class="flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-green-500"></span>
                <span class="font-bold text-gray-800 text-sm tracking-wide">Panel Admin</span>
            </div>
            <button id="close-sidebar-btn" class="md:hidden text-gray-400 hover:text-gray-600">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        <nav class="p-4 space-y-1 text-xs font-medium">
            <a href="#identity-section" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl bg-green-50 text-green-700 font-semibold border border-green-100 transition-all">
                <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7m0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                <span>Profil Utama</span>
            </a>
            <a href="#skills-section" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-gray-500 hover:text-green-600 hover:bg-gray-50 transition-all">
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                <span>Keahlian</span>
            </a>
            <a href="#education-section" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-gray-500 hover:text-green-600 hover:bg-gray-50 transition-all">
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0112 20.055a11.952 11.952 0 01-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/></svg>
                <span>Pendidikan</span>
            </a>
            <a href="#certificates-section" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-gray-500 hover:text-green-600 hover:bg-gray-50 transition-all">
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
                <span>Sertifikat</span>
            </a>
            <a href="#work-logs-section" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-gray-500 hover:text-green-600 hover:bg-gray-50 transition-all">
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                <span>Pengalaman</span>
            </a>
            <a href="#projects-section" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-gray-500 hover:text-green-600 hover:bg-gray-50 transition-all">
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                <span>Proyek</span>
            </a>
            <a href="#messages-section" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-gray-500 hover:text-green-600 hover:bg-gray-50 transition-all">
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2h14a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                <span>Pesan Masuk</span>
            </a>
            <a href="#users-section" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-gray-500 hover:text-green-600 hover:bg-gray-50 transition-all">
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                <span>Pengguna</span>
            </a>
        </nav>
    </div>

    <div class="p-4 border-t border-gray-100 space-y-2 text-xs font-medium bg-white sticky bottom-0">
        <a href="{{ route('portfolio.index') }}" target="_blank" class="w-full py-2 px-3 rounded-lg bg-gray-50 hover:bg-gray-100 text-gray-600 transition-all flex items-center justify-between group border border-gray-100">
            <span>Lihat Website</span>
            <svg class="w-3.5 h-3.5 text-gray-400 group-hover:text-green-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
        </a>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="w-full py-2 px-3 rounded-lg bg-red-50 hover:bg-red-100 text-red-600 transition-all flex items-center justify-between border border-red-100">
                <span>Keluar</span>
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
            </button>
        </form>
    </div>
</aside>