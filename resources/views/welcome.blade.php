<!DOCTYPE html>
<html lang="id" class="h-full bg-slate-50 text-slate-800">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full bg-slate-50 text-slate-800 font-sans antialiased selection:bg-emerald-500 selection:text-white">

    <div class="h-full flex flex-col md:flex-row overflow-hidden relative">
        <aside id="sidebar" class="fixed inset-y-0 left-0 z-50 w-64 bg-white border-r border-slate-200 flex flex-col justify-between shrink-0 shadow-lg md:shadow-sm -translate-x-full md:translate-x-0 md:static transition-transform duration-300 ease-in-out">
            <div>
                <div class="h-16 md:h-20 flex items-center justify-between px-6 border-b border-slate-100">
                    <div>
                        <h4 class="font-extrabold text-base tracking-wider text-slate-900">DASHBOARD</h4>
                        <p class="text-[10px] text-emerald-600 font-semibold tracking-widest uppercase">Central Gateway</p>
                    </div>
                    <button id="closeSidebarBtn" class="md:hidden text-slate-500 hover:text-slate-800 text-xl">
                        <i class="bi bi-x-lg"></i>
                    </button>
                </div>

                <nav class="p-4 space-y-1">
                    <p class="px-4 text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-2">Main Menu</p>
                    <a href="#" class="no-underline flex items-center gap-3 px-4 py-3 text-sm font-semibold rounded-xl bg-emerald-50 text-emerald-700 border border-emerald-200/80 shadow-sm">
                        <i class="bi bi-grid-1x2-fill"></i>
                        Aplikasi Digital
                    </a>
                    <a href="#" class="no-underline flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-xl text-slate-600 hover:bg-slate-100 hover:text-slate-900 transition">
                        <i class="bi bi-display-fill"></i>
                        Sesi Perangkat
                    </a>
                </nav>
            </div>

            <div class="p-4 border-t border-slate-100">
                <div class="flex items-center gap-3 px-3 py-2.5 rounded-xl bg-slate-50 border border-slate-200/80">
                    <div class="w-9 h-9 rounded-lg bg-emerald-600 text-white font-bold flex items-center justify-center text-sm shadow-sm">
                        SB
                    </div>
                    <div class="min-w-0 flex-1">
                        <p class="text-xs font-bold text-slate-900 truncate">Shaka Banuasta</p>
                        <p class="text-[10px] text-emerald-600 font-semibold truncate">Online</p>
                    </div>
                </div>
            </div>
        </aside>

        <div id="sidebarOverlay" class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm z-40 hidden md:hidden"></div>

        <div class="flex-1 flex flex-col min-w-0 h-full overflow-hidden">
            <header class="h-16 md:h-20 bg-white/80 backdrop-blur border-b border-slate-200 px-4 md:px-8 flex items-center justify-between shrink-0">
                <div class="flex items-center gap-3">
                    <button id="openSidebarBtn" class="md:hidden p-2 rounded-lg text-slate-600 hover:bg-slate-100 text-xl">
                        <i class="bi bi-list"></i>
                    </button>
                    <div class="flex items-center gap-2 text-xs md:text-sm text-slate-500 font-medium">
                        <i class="bi bi-calendar3 text-emerald-600"></i>
                        <span>Kamis, 17 September 2026</span>
                    </div>
                </div>
                <div class="flex items-center gap-2 md:gap-3">
                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-pulse"></span>
                    <span class="text-[11px] md:text-xs font-semibold text-emerald-700 tracking-wide">System Running</span>
                </div>
            </header>

            <main class="flex-1 overflow-y-auto p-4 md:p-8 space-y-6 md:space-y-8">
                <div class="space-y-1 md:space-y-2">
                    <h2 class="text-2xl md:text-3xl font-black text-slate-900 tracking-tight">
                        Semua Aplikasi dengan <span class="text-emerald-600">Satu Akun!</span>
                    </h2>
                    <p class="text-slate-500 text-xs md:text-sm max-w-2xl leading-relaxed">
                        Sekarang login aplikasi tinggal pilih jadi gaperlu pusing lupa password ataupun ribet login di aplikasi yang berbeda!
                    </p>
                </div>

                <div class="relative w-full max-w-3xl">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                        <i class="bi bi-search text-emerald-600"></i>
                    </div>
                    <input type="text" readonly
                        value="Halo Shaka, hari ini mau buka aplikasi apa?"
                        class="w-full pl-11 pr-4 py-3 md:py-3.5 bg-white border border-slate-200 rounded-2xl text-slate-700 text-xs md:text-sm focus:outline-none focus:border-emerald-500/50 transition shadow-sm truncate">
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6">
                    <a href="#" class="no-underline bg-white border border-slate-200/80 rounded-2xl p-5 md:p-6 hover:border-emerald-500/50 hover:shadow-md transition group cursor-pointer flex flex-col justify-between">
                        <div>
                            <div class="w-10 h-10 md:w-12 md:h-12 rounded-xl bg-emerald-50 border border-emerald-100 text-emerald-600 flex items-center justify-center text-lg md:text-xl font-bold mb-3 md:mb-4 group-hover:scale-105 transition">
                                <i class="bi bi-folder-symlink-fill"></i>
                            </div>
                            <h4 class="text-base md:text-lg font-extrabold text-slate-900 group-hover:text-emerald-600 transition">NAS</h4>
                            <p class="text-xs text-slate-500 mt-2 leading-relaxed">
                                Sistem informasi terpadu untuk pengelolaan data dan layanan aplikasi internal.
                            </p>
                        </div>
                        <div class="mt-5 md:mt-6 pt-3 md:pt-4 border-t border-slate-100 flex items-center justify-between text-xs text-emerald-600 font-semibold">
                            <span>Buka Aplikasi</span>
                            <i class="bi bi-arrow-right group-hover:translate-x-1 transition"></i>
                        </div>
                    </a>

                    <a href="#" class="no-underline bg-white border border-slate-200/80 rounded-2xl p-5 md:p-6 hover:border-emerald-500/50 hover:shadow-md transition group cursor-pointer flex flex-col justify-between">
                        <div>
                            <div class="w-10 h-10 md:w-12 md:h-12 rounded-xl bg-emerald-50 border border-emerald-100 text-emerald-600 flex items-center justify-center text-lg md:text-xl font-bold mb-3 md:mb-4 group-hover:scale-105 transition">
                                <i class="bi bi-journal-bookmark-fill"></i>
                            </div>
                            <h4 class="text-base md:text-lg font-extrabold text-slate-900 group-hover:text-emerald-600 transition">Dashboard Portofolio</h4>
                            <p class="text-xs text-slate-500 mt-2 leading-relaxed">
                                Manajemen terpadu pembelajaran online dan e-learning interaktif.
                            </p>
                        </div>
                        <div class="mt-5 md:mt-6 pt-3 md:pt-4 border-t border-slate-100 flex items-center justify-between text-xs text-emerald-600 font-semibold">
                            <span>Buka Aplikasi</span>
                            <i class="bi bi-arrow-right group-hover:translate-x-1 transition"></i>
                        </div>
                    </a>

                    <a href="#" class="no-underline bg-white border border-slate-200/80 rounded-2xl p-5 md:p-6 hover:border-emerald-500/50 hover:shadow-md transition group cursor-pointer flex flex-col justify-between">
                        <div>
                            <div class="w-10 h-10 md:w-12 md:h-12 rounded-xl bg-emerald-50 border border-emerald-100 text-emerald-600 flex items-center justify-center text-lg md:text-xl font-bold mb-3 md:mb-4 group-hover:scale-105 transition">
                                <i class="bi bi-shield-check"></i>
                            </div>
                            <h4 class="text-base md:text-lg font-extrabold text-slate-900 group-hover:text-emerald-600 transition">Minecraft</h4>
                            <p class="text-xs text-slate-500 mt-2 leading-relaxed">
                                Sistem pemeringkatan dan verifikasi prestasi internal terintegrasi.
                            </p>
                        </div>
                        <div class="mt-5 md:mt-6 pt-3 md:pt-4 border-t border-slate-100 flex items-center justify-between text-xs text-emerald-600 font-semibold">
                            <span>Buka Aplikasi</span>
                            <i class="bi bi-arrow-right group-hover:translate-x-1 transition"></i>
                        </div>
                    </a>
                </div>
            </main>
        </div>
    </div>

</body>
</html>