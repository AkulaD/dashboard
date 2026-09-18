<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $profile->full_name ?? 'Shaka Banuasta' }} | Portofolio</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white text-gray-800 antialiased selection:bg-green-500 selection:text-white relative overflow-x-hidden">

    <!-- Navbar -->
    <nav id="navbar" class="fixed w-full bg-white/80 backdrop-blur-md z-50 py-4 transition-all duration-300 animate-fade-in-down border-b border-gray-100/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center">
            <div class="flex items-center gap-3">
                <span id="realtime-clock" class="text-xl font-bold font-mono text-green-600 tracking-wider bg-green-50 px-3 py-1 rounded-lg border border-green-200/60">--:--:--</span>
            </div>
            
            <div class="hidden md:flex space-x-8 text-xs font-mono font-semibold tracking-wider text-gray-500">
                <a href="#identity" class="nav-link hover:text-green-600 transition-colors">01_IDENTITY</a>
                <a href="#skills" class="nav-link hover:text-green-600 transition-colors">02_SKILLS</a>
                <a href="#education" class="nav-link hover:text-green-600 transition-colors">03_EDUCATION</a>
                <a href="#certificates" class="nav-link hover:text-green-600 transition-colors">04_CERTIFICATES</a>
                <a href="#work-logs" class="nav-link hover:text-green-600 transition-colors">05_WORK_LOGS</a>
                <a href="#projects" class="nav-link hover:text-green-600 transition-colors">06_PROJECTS</a>
                <a href="#connect" class="nav-link hover:text-green-600 transition-colors">07_CONNECT</a>
            </div>
        </div>
    </nav>

    <!-- Background Decorative Glow -->
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full max-w-7xl h-[500px] bg-gradient-to-b from-green-50/60 via-green-50/20 to-transparent pointer-events-none -z-10 blur-3xl"></div>

    <!-- Header / Identity Section -->
    <header id="identity" class="min-h-screen flex flex-col justify-center pt-24 pb-12 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                
                <!-- Main Intro (Left Column) -->
                <div class="lg:col-span-7 text-left animate-fade-in-up">
                    <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-green-100/80 border border-green-200 text-green-700 text-xs font-medium mb-6">
                        <span class="w-2 h-2 rounded-full bg-green-500 animate-ping"></span>
                        <span class="w-2 h-2 rounded-full bg-green-500 -ml-4"></span>
                        <span>{{ $profile->status_badge ?? 'Available for Projects & Collaboration' }}</span>
                    </div>

                    <h1 class="text-4xl sm:text-6xl lg:text-7xl font-extrabold text-gray-900 mb-6 leading-none tracking-tight">
                        Halo, Saya <br/>
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-green-500 via-emerald-600 to-teal-600">{{ $profile->full_name ?? 'Shaka Banuasta' }}</span>
                    </h1>

                    <p class="text-base sm:text-lg text-gray-600 mb-8 max-w-xl leading-relaxed">
                        {{ $profile->bio ?? 'Mahasiswa Sistem Informasi Semester 3 di Universitas Pamulang dengan passion tinggi dalam eksplorasi teknologi, analisis sistem, dan pengembangan aplikasi web yang responsif serta intuitif.' }}
                    </p>

                    <div class="flex flex-wrap items-center justify-start gap-4">
                        <a href="#projects" class="px-7 py-3.5 rounded-xl bg-green-600 text-white font-medium hover:bg-green-700 transition-all shadow-lg shadow-green-600/25 hover:shadow-green-600/40 transform hover:-translate-y-0.5 flex items-center gap-2">
                            <span>Lihat Proyek</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                        <a href="#connect" class="px-7 py-3.5 rounded-xl bg-white border border-gray-200 text-gray-700 font-medium hover:border-green-500 hover:text-green-600 transition-all transform hover:-translate-y-0.5 shadow-sm">
                            Hubungi Saya
                        </a>
                    </div>
                </div>

                <!-- Info Cards / Highlight (Right Column) -->
                <div class="lg:col-span-5 animate-fade-in-up" style="animation-delay: 0.2s;">
                    <div class="p-8 rounded-3xl bg-white border border-gray-100 shadow-xl shadow-gray-100/80 relative overflow-hidden">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-green-500/5 rounded-full blur-2xl"></div>
                        
                        <h2 class="text-xs font-mono font-bold text-gray-400 uppercase tracking-widest mb-7">Quick Overview</h2>
                        
                        <div class="space-y-2">
                            <div class="flex items-start gap-4">
                                <div class="p-3 rounded-2xl bg-green-50 text-green-600 font-bold text-xl">0{{ $profile->current_semester ?? 3 }}</div>
                                <div>
                                    <h3 class="font-semibold text-gray-900">Semester Saat Ini</h3>
                                    <p class="text-sm text-gray-500">Program Studi {{ $profile->study_program ?? 'Sistem Informasi' }}</p>
                                </div>
                            </div>

                            <div class="border-t border-gray-100 pt-4 flex items-start gap-4">
                                <div class="p-3 rounded-2xl bg-green-50 text-green-600">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0112 20.055a11.952 11.952 0 01-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/></svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-900">{{ $profile->university ?? 'Universitas Pamulang' }}</h3>
                                    <p class="text-sm text-gray-500">{{ $profile->faculty ?? 'Fakultas Ilmu Komputer' }}</p>
                                </div>
                            </div>

                            <div class="border-t border-gray-100 pt-4 flex items-start gap-4">
                                <div class="p-3 rounded-2xl bg-green-50 text-green-600">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-900">Fokus Utama</h3>
                                    <p class="text-sm text-gray-500">{{ $profile->focus_area ?? 'Web Development & Business Process Analysis' }}</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-6 left-1/2 -translate-x-1/2 hidden md:flex flex-col items-center gap-2 text-gray-400">
            <span class="text-[10px] font-mono tracking-widest uppercase">Scroll Down</span>
            <div class="w-5 h-8 border-2 border-gray-300 rounded-full flex justify-center pt-1">
                <div class="w-1 h-2 bg-green-500 rounded-full animate-bounce"></div>
            </div>
        </div>
    </header>

    <!-- Skills Section -->
    <section id="skills" class="py-24 bg-gray-50/50 relative border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-4">
                <div>
                    <span class="text-xs font-mono font-bold tracking-widest text-green-600 uppercase bg-green-100/60 px-3 py-1 rounded-md">02 / KEAHLIAN</span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mt-3">Tech Stack & Kompetensi</h2>
                </div>
                <p class="text-gray-500 text-sm sm:text-base max-w-md">
                    Kombinasi teknologi pengembang web dan kemampuan analisis sistem yang saya pelajari dan kembangkan.
                </p>
            </div>

            <!-- Skills Dynamic Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($skills as $category => $items)
                <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-sm hover:shadow-xl hover:shadow-green-500/5 transition-all duration-300 group">
                    <div class="w-12 h-12 rounded-2xl bg-green-50 text-green-600 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-6">{{ $category }}</h3>
                    
                    <div class="space-y-4">
                        @foreach($items as $skill)
                        <div>
                            <div class="flex justify-between text-xs font-semibold mb-1">
                                <span class="text-gray-700">{{ $skill->skill_name }}</span>
                                <span class="text-green-600">{{ $skill->percentage }}%</span>
                            </div>
                            <div class="w-full h-2 bg-gray-100 rounded-full overflow-hidden">
                                <div class="h-full bg-green-500 rounded-full" style="width: {{ $skill->percentage }}%;"></div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Education Section -->
    <section id="education" class="py-24 bg-white relative border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-4">
                <div>
                    <span class="text-xs font-mono font-bold tracking-widest text-green-600 uppercase bg-green-100/60 px-3 py-1 rounded-md">03 / PENDIDIKAN</span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mt-3">Latar Belakang Akademis</h2>
                </div>
                <p class="text-gray-500 text-sm sm:text-base max-w-md">
                    Riwayat pendidikan formal yang membentuk fondasi keahlian teknis dan pemikiran analitis saya.
                </p>
            </div>

            <div class="relative border-l-2 border-green-200 ml-4 md:ml-32 space-y-12">
                @foreach($educations as $edu)
                <div class="relative pl-8 md:pl-10 group">
                    <div class="absolute -left-[9px] top-1.5 w-4 h-4 rounded-full bg-white border-4 border-green-500 group-hover:scale-125 group-hover:bg-green-500 transition-all duration-300"></div>
                    
                    <div class="bg-gray-50/70 p-6 sm:p-8 rounded-3xl border border-gray-100 hover:border-green-200 hover:bg-white hover:shadow-xl hover:shadow-green-500/5 transition-all duration-300">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-4 gap-2">
                            <div>
                                <span class="text-xs font-mono font-bold text-green-600 uppercase tracking-wider">{{ $edu->level_type }}</span>
                                <h3 class="text-xl sm:text-2xl font-bold text-gray-900 mt-0.5">{{ $edu->institution_name }}</h3>
                            </div>
                            <span class="inline-block px-3 py-1 rounded-full bg-green-100 text-green-700 font-mono text-xs font-semibold w-fit">
                                {{ $edu->period }}
                            </span>
                        </div>

                        <p class="text-base font-semibold text-gray-800 mb-4">{{ $edu->major }}</p>

                        @if($edu->details)
                        <ul class="space-y-2 text-sm text-gray-600 mb-2">
                            @foreach(is_array($edu->details) ? $edu->details : json_decode($edu->details, true) as $detail)
                            <li class="flex items-start gap-2">
                                <span class="text-green-500 font-bold">•</span>
                                <span>{{ $detail }}</span>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Certificates Section -->
    <section id="certificates" class="py-24 bg-gray-50/50 relative border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-4">
                <div>
                    <span class="text-xs font-mono font-bold tracking-widest text-green-600 uppercase bg-green-100/60 px-3 py-1 rounded-md">04 / SERTIFIKAT</span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mt-3">Lisensi & Sertifikasi</h2>
                </div>
                <p class="text-gray-500 text-sm sm:text-base max-w-md">
                    Bukti kompetensi dan pelatihan profesional yang telah diselesaikan untuk menunjang keahlian teknis.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($certificates as $cert)
                <div class="bg-white p-7 rounded-3xl border border-gray-100 shadow-sm hover:shadow-xl hover:shadow-green-500/5 hover:border-green-200 transition-all duration-300 flex flex-col justify-between group">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-xs font-mono font-semibold text-green-600 bg-green-50 px-2.5 py-1 rounded-md border border-green-200/50">{{ $cert->year }}</span>
                            <div class="p-2 rounded-xl bg-gray-50 text-gray-400 group-hover:text-green-600 group-hover:bg-green-50 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
                            </div>
                        </div>
                        <h4 class="text-lg font-bold text-gray-900 mb-1 leading-snug group-hover:text-green-600 transition-colors">{{ $cert->title }}</h4>
                        <p class="text-sm text-gray-500 mb-6">Penerbit: {{ $cert->issuer }}</p>
                    </div>

                    <a href="{{ $cert->file_path ?? '#' }}" target="_blank" class="w-full py-2.5 px-4 rounded-xl bg-gray-50 hover:bg-green-600 text-gray-700 hover:text-white font-medium text-xs font-mono transition-all flex items-center justify-center gap-2 group/btn border border-gray-200/80 hover:border-green-600">
                        <span>VIEW CERTIFICATE</span>
                        <svg class="w-3.5 h-3.5 transform group-hover/btn:translate-x-0.5 group-hover/btn:-translate-y-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Work Logs Section -->
    <section id="work-logs" class="py-24 bg-white relative border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-4">
                <div>
                    <span class="text-xs font-mono font-bold tracking-widest text-green-600 uppercase bg-green-100/60 px-3 py-1 rounded-md">05 / PENGALAMAN KERJA</span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mt-3">Work Logs & Pengalaman</h2>
                </div>
                <p class="text-gray-500 text-sm sm:text-base max-w-md">
                    Rekam jejak kontribusi profesional dan pengalaman praktis dalam industri teknologi serta administrasi bisnis.
                </p>
            </div>

            <div class="space-y-8">
                @foreach($workExperiences as $work)
                <div class="p-8 rounded-3xl bg-gray-50/70 border border-gray-100 hover:border-green-200 hover:bg-white hover:shadow-xl hover:shadow-green-500/5 transition-all duration-300 group">
                    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4 mb-6">
                        <div>
                            <div class="flex items-center gap-3 mb-1">
                                <h3 class="text-xl sm:text-2xl font-bold text-gray-900">{{ $work->company_name }}</h3>
                                <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-mono font-semibold">{{ $work->employment_type }}</span>
                            </div>
                            <p class="text-base font-medium text-green-600">{{ $work->position }}</p>
                        </div>
                        <div class="text-xs font-mono font-semibold text-gray-500 bg-white px-4 py-2 rounded-xl border border-gray-200/80 w-fit">
                            {{ $work->period }}
                        </div>
                    </div>

                    @if($work->bullet_points)
                    <ul class="space-y-3 text-sm sm:text-base text-gray-600">
                        @foreach(is_array($work->bullet_points) ? $work->bullet_points : json_decode($work->bullet_points, true) as $bullet)
                        <li class="flex items-start gap-3">
                            <span class="text-green-500 font-bold mt-1">•</span>
                            <span>{{ $bullet }}</span>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Projects Section -->
    <section id="projects" class="py-24 bg-gray-50/50 relative border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-4">
                <div>
                    <span class="text-xs font-mono font-bold tracking-widest text-green-600 uppercase bg-green-100/60 px-3 py-1 rounded-md">06 / PROYEK</span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mt-3">Proyek</h2>
                </div>
                <p class="text-gray-500 text-sm sm:text-base max-w-md">
                    Kumpulan hasil karya pengembangan web dan sistem informasi yang telah dirancang serta diimplementasikan.
                </p>
            </div>

            <div class="relative border-l-2 border-green-200 ml-4 md:ml-32 space-y-8">
                @foreach($projects as $project)
                <div class="project-item relative pl-8 md:pl-10 group">
                    <div class="absolute -left-[9px] top-6 w-4 h-4 rounded-full bg-white border-4 border-green-500 group-hover:scale-125 group-hover:bg-green-500 transition-all duration-300"></div>
                    <div class="bg-white p-6 sm:p-8 rounded-3xl border border-gray-100 shadow-sm hover:border-green-200 hover:shadow-xl hover:shadow-green-500/5 transition-all duration-300">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-4 gap-2">
                            <div>
                                <span class="text-xs font-mono font-bold text-green-600 uppercase tracking-wider">{{ $project->category }}</span>
                                <h3 class="text-xl sm:text-2xl font-bold text-gray-900 mt-0.5">{{ $project->title }}</h3>
                            </div>
                            <span class="inline-block px-3 py-1 rounded-full bg-green-100 text-green-700 font-mono text-xs font-semibold w-fit">{{ $project->year }}</span>
                        </div>
                        <p class="text-xs font-semibold text-gray-400 mb-4">{{ $project->subtitle }}</p>
                        
                        @if($project->bullet_points)
                        <ul class="space-y-2 text-sm text-gray-600 mb-6">
                            @foreach(is_array($project->bullet_points) ? $project->bullet_points : json_decode($project->bullet_points, true) as $bullet)
                            <li class="flex items-start gap-2"><span class="text-green-500 font-bold">•</span><span>{{ $bullet }}</span></li>
                            @endforeach
                        </ul>
                        @endif

                        <div class="pt-4 border-t border-gray-100 flex items-center justify-between">
                            <span class="text-xs font-mono text-gray-400">{{ $project->tech_stack }}</span>
                            <a href="{{ $project->project_url ?? '#' }}" target="_blank" class="text-xs font-mono font-bold text-green-600 hover:text-green-700 flex items-center gap-1 group/link">
                                <span>VIEW PROJECT</span>
                                <svg class="w-3.5 h-3.5 transform group-hover/link:translate-x-0.5 group-hover/link:-translate-y-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div id="toggle-projects-container" class="mt-12 text-center hidden">
                <button id="toggle-projects-btn" class="px-8 py-3 rounded-full text-green-600 font-medium font-mono text-xs transition-all shadow-green-500/10">
                    ----- SHOW ALL PROJECTS -----
                </button>
            </div>

        </div>
    </section>

    <!-- Connect / Contact Section -->
    <section id="connect" class="py-24 bg-white relative border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-4">
                <div>
                    <span class="text-xs font-mono font-bold tracking-widest text-green-600 uppercase bg-green-100/60 px-3 py-1 rounded-md">07 / HUBUNGI SAYA</span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mt-3">Mari Terhubung</h2>
                </div>
                <p class="text-gray-500 text-sm sm:text-base max-w-md">
                    Punya ide proyek, tawaran kolaborasi, atau sekadar ingin menyapa? Kirim pesan langsung melalui formulir di bawah ini.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
                
                <!-- Contact Info -->
                <div class="lg:col-span-5 space-y-8">
                    <div class="bg-gray-50/70 p-8 rounded-3xl border border-gray-100 shadow-sm">
                        <h3 class="text-xs font-mono font-bold text-gray-400 uppercase tracking-widest mb-6">Informasi Kontak</h3>
                        
                        <div class="space-y-6">
                            <a href="mailto:{{ $profile->email ?? 'sh4k4175@gmail.com' }}" class="flex items-center gap-4 group p-3 rounded-2xl hover:bg-white transition-all border border-transparent hover:border-gray-100">
                                <div class="p-3 rounded-2xl bg-green-50 text-green-600 group-hover:scale-110 transition-transform">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2h14a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                                </div>
                                <div class="overflow-hidden">
                                    <span class="text-xs font-mono font-bold text-gray-400 uppercase block">Email</span>
                                    <span class="text-sm sm:text-base font-semibold text-gray-800 group-hover:text-green-600 transition-colors truncate block">{{ $profile->email ?? 'sh4k4175@gmail.com' }}</span>
                                </div>
                            </a>

                            <a href="{{ $profile->github_url ?? 'https://github.com/AkulaD' }}" target="_blank" class="flex items-center gap-4 group p-3 rounded-2xl hover:bg-white transition-all border border-transparent hover:border-gray-100">
                                <div class="p-3 rounded-2xl bg-green-50 text-green-600 group-hover:scale-110 transition-transform">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.53 1.032 1.53 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"/></svg>
                                </div>
                                <div>
                                    <span class="text-xs font-mono font-bold text-gray-400 uppercase block">GitHub</span>
                                    <span class="text-sm sm:text-base font-semibold text-gray-800 group-hover:text-green-600 transition-colors">GitHub Profile</span>
                                </div>
                            </a>

                            <a href="{{ $profile->linkedin_url ?? 'https://www.linkedin.com/in/shaka-banuasta-798129309/' }}" target="_blank" class="flex items-center gap-4 group p-3 rounded-2xl hover:bg-white transition-all border border-transparent hover:border-gray-100">
                                <div class="p-3 rounded-2xl bg-green-50 text-green-600 group-hover:scale-110 transition-transform">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                                </div>
                                <div>
                                    <span class="text-xs font-mono font-bold text-gray-400 uppercase block">LinkedIn</span>
                                    <span class="text-sm sm:text-base font-semibold text-gray-800 group-hover:text-green-600 transition-colors">LinkedIn Profile</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="lg:col-span-7">
                    <form action="{{ route('contact.store') }}" method="POST" class="bg-gray-50/70 p-6 sm:p-8 rounded-3xl border border-gray-100 shadow-sm space-y-6 font-mono">
                        @csrf
                        <div class="flex items-center justify-between border-b border-gray-200/80 pb-4 mb-2">
                            <span class="text-xs text-gray-400 font-mono">KIRIM PESAN</span>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-xs text-green-600 mb-2 font-bold uppercase tracking-wider">NAMA</label>
                                <input type="text" id="name" name="name" required placeholder="Nama" class="w-full bg-white border border-gray-200 rounded-2xl px-4 py-3 text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500 transition-all shadow-sm">
                            </div>

                            <div>
                                <label for="email" class="block text-xs text-green-600 mb-2 font-bold uppercase tracking-wider">EMAIL</label>
                                <input type="email" id="email" name="email" required placeholder="email@mail.com" class="w-full bg-white border border-gray-200 rounded-2xl px-4 py-3 text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500 transition-all shadow-sm">
                            </div>
                        </div>

                        <div>
                            <label for="message" class="block text-xs text-green-600 mb-2 font-bold uppercase tracking-wider">PESAN</label>
                            <textarea id="message" name="message" rows="5" required placeholder="Informasi..." class="w-full bg-white border border-gray-200 rounded-2xl px-4 py-3 text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500 transition-all resize-none shadow-sm"></textarea>
                        </div>

                        <button type="submit" class="w-full py-3.5 rounded-2xl bg-green-500 hover:bg-green-600 text-white font-bold text-sm tracking-wider uppercase transition-all shadow-lg shadow-green-500/20 hover:shadow-green-500/40 flex items-center justify-center gap-2 group">
                            <span>KIRIM PESAN</span>
                            <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-8 bg-white border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs font-mono text-gray-400">
            <p>© {{ date('Y') }} {{ $profile->full_name ?? 'Shaka Banuasta' }}. All rights reserved.</p>
            <p class="flex items-center gap-1">
                <span>Designed & Built with</span>
                <span class="text-green-500">♥</span>
            </p>
        </div>
    </footer>

</body>
</html>