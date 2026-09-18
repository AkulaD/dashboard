<!-- Section Profil Utama (01_IDENTITY) -->
<section id="identity-section" class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between pb-4 border-b border-gray-200/60 gap-2">
        <div>
            <h3 class="text-xl font-bold text-gray-900">Pengaturan Profil Utama</h3>
            <p class="text-xs text-gray-500 mt-0.5">Kelola informasi identitas pribadi yang tampil di halaman depan.</p>
        </div>
        <p class="text-xs text-gray-400">
            Terakhir diperbarui: {{ isset($profile) && $profile->updated_at ? $profile->updated_at->format('d M Y, H:i') : '-' }}
        </p>
    </div>

    <div class="grid grid-cols-1 xl:grid-cols-12 gap-8 items-start">
        <!-- Form Left -->
        <div class="xl:col-span-7 bg-white rounded-2xl border border-gray-100 p-5 sm:p-7 shadow-sm space-y-6">
            <form action="#" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="space-y-4">
                    <h4 class="text-xs font-bold text-gray-400 uppercase tracking-wider border-b border-gray-100 pb-2">Identitas & Status</h4>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="sm:col-span-2">
                            <label class="block text-xs font-semibold text-gray-700 mb-1.5">Nama Lengkap</label>
                            <input type="text" id="input-full-name" name="full_name" value="{{ old('full_name', $profile->full_name ?? '') }}" required class="w-full bg-gray-50/50 border border-gray-200 rounded-xl px-3.5 py-2 text-xs text-gray-800 focus:outline-none focus:border-green-500 focus:bg-white transition-all">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-700 mb-1.5">Nama Panggilan</label>
                            <input type="text" id="input-nickname" name="nickname" value="{{ old('nickname', $profile->nickname ?? '') }}" class="w-full bg-gray-50/50 border border-gray-200 rounded-xl px-3.5 py-2 text-xs text-gray-800 focus:outline-none focus:border-green-500 focus:bg-white transition-all">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-700 mb-1.5">Status Profil</label>
                            <input type="text" id="input-status-badge" name="status_badge" value="{{ old('status_badge', $profile->status_badge ?? '') }}" class="w-full bg-gray-50/50 border border-gray-200 rounded-xl px-3.5 py-2 text-xs text-gray-800 focus:outline-none focus:border-green-500 focus:bg-white transition-all">
                        </div>
                    </div>
                </div>

                <div class="space-y-4">
                    <h4 class="text-xs font-bold text-gray-400 uppercase tracking-wider border-b border-gray-100 pb-2">Deskripsi Ringkas</h4>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-semibold text-gray-700 mb-1.5">Judul Utama (Headline)</label>
                            <input type="text" id="input-headline" name="headline" value="{{ old('headline', $profile->headline ?? '') }}" class="w-full bg-gray-50/50 border border-gray-200 rounded-xl px-3.5 py-2 text-xs text-gray-800 focus:outline-none focus:border-green-500 focus:bg-white transition-all">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-700 mb-1.5">Bio / Deskripsi Lengkap</label>
                            <textarea id="input-bio" name="bio" rows="3" class="w-full bg-gray-50/50 border border-gray-200 rounded-xl px-3.5 py-2 text-xs text-gray-800 focus:outline-none focus:border-green-500 focus:bg-white transition-all resize-none">{{ old('bio', $profile->bio ?? '') }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="space-y-4">
                    <h4 class="text-xs font-bold text-gray-400 uppercase tracking-wider border-b border-gray-100 pb-2">Informasi Akademis</h4>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-gray-700 mb-1.5">Semester Saat Ini</label>
                            <input type="number" id="input-semester" name="current_semester" value="{{ old('current_semester', $profile->current_semester ?? 3) }}" class="w-full bg-gray-50/50 border border-gray-200 rounded-xl px-3.5 py-2 text-xs text-gray-800 focus:outline-none focus:border-green-500 focus:bg-white transition-all">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-700 mb-1.5">Nama Universitas</label>
                            <input type="text" id="input-university" name="university" value="{{ old('university', $profile->university ?? '') }}" class="w-full bg-gray-50/50 border border-gray-200 rounded-xl px-3.5 py-2 text-xs text-gray-800 focus:outline-none focus:border-green-500 focus:bg-white transition-all">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-700 mb-1.5">Fakultas</label>
                            <input type="text" id="input-faculty" name="faculty" value="{{ old('faculty', $profile->faculty ?? '') }}" class="w-full bg-gray-50/50 border border-gray-200 rounded-xl px-3.5 py-2 text-xs text-gray-800 focus:outline-none focus:border-green-500 focus:bg-white transition-all">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-700 mb-1.5">Program Studi</label>
                            <input type="text" id="input-study-program" name="study_program" value="{{ old('study_program', $profile->study_program ?? '') }}" class="w-full bg-gray-50/50 border border-gray-200 rounded-xl px-3.5 py-2 text-xs text-gray-800 focus:outline-none focus:border-green-500 focus:bg-white transition-all">
                        </div>
                        <div class="sm:col-span-2">
                            <label class="block text-xs font-semibold text-gray-700 mb-1.5">Fokus Utama</label>
                            <input type="text" id="input-focus-area" name="focus_area" value="{{ old('focus_area', $profile->focus_area ?? '') }}" class="w-full bg-gray-50/50 border border-gray-200 rounded-xl px-3.5 py-2 text-xs text-gray-800 focus:outline-none focus:border-green-500 focus:bg-white transition-all">
                        </div>
                    </div>
                </div>

                <div class="pt-3 border-t border-gray-100 flex justify-end">
                    <button type="submit" class="w-full sm:w-auto px-6 py-2.5 rounded-xl bg-green-600 hover:bg-green-700 text-white font-semibold text-xs transition-all shadow-sm flex items-center justify-center gap-2">
                        <span>Simpan Profil</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    </button>
                </div>
            </form>
        </div>

        <!-- Preview Right -->
        <div class="xl:col-span-5 sticky top-6 space-y-3">
            <div class="flex items-center justify-between">
                <span class="text-xs font-bold text-gray-400 uppercase tracking-wider flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-green-500 animate-ping"></span>
                    Preview Tampilan Utama
                </span>
                <span class="text-[10px] bg-gray-200/60 text-gray-600 px-2 py-0.5 rounded font-mono">Realtime</span>
            </div>

            <div class="bg-white rounded-3xl border border-gray-200/80 p-6 shadow-xl shadow-gray-100/80 space-y-6 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-24 h-24 bg-green-500/5 rounded-full blur-xl"></div>
                
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-green-100/80 border border-green-200 text-green-700 text-[11px] font-medium">
                    <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                    <span id="preview-status-badge">{{ $profile->status_badge ?? 'Available for Projects' }}</span>
                </div>

                <div>
                    <h3 class="text-xl font-extrabold text-gray-900 leading-snug">
                        Halo, Saya <br/>
                        <span id="preview-full-name" class="text-transparent bg-clip-text bg-gradient-to-r from-green-500 via-emerald-600 to-teal-600">
                            {{ $profile->full_name ?? 'Shaka Banuasta' }}
                        </span>
                    </h3>
                    <p id="preview-bio" class="text-xs text-gray-600 mt-2 leading-relaxed">
                        {{ $profile->bio ?? 'Deskripsi singkat...' }}
                    </p>
                </div>

                <div class="pt-4 border-t border-gray-100 space-y-3 text-xs">
                    <h4 class="text-[10px] font-mono font-bold text-gray-400 uppercase tracking-widest">QUICK OVERVIEW</h4>
                    
                    <div class="p-3.5 rounded-2xl bg-gray-50/80 border border-gray-100 space-y-2.5">
                        <div class="flex items-center gap-3">
                            <div id="preview-semester" class="px-2.5 py-1 rounded-xl bg-green-50 text-green-600 font-bold text-sm">
                                0{{ $profile->current_semester ?? 3 }}
                            </div>
                            <div>
                                <h5 class="font-bold text-gray-800">Semester Saat Ini</h5>
                                <p id="preview-study-program" class="text-[11px] text-gray-500">Program Studi {{ $profile->study_program ?? 'Sistem Informasi' }}</p>
                            </div>
                        </div>

                        <div class="border-t border-gray-200/60 pt-2.5 flex items-center gap-3">
                            <div class="p-2 rounded-xl bg-green-50 text-green-600">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0112 20.055a11.952 11.952 0 01-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/></svg>
                            </div>
                            <div>
                                <h5 id="preview-university" class="font-bold text-gray-800">{{ $profile->university ?? 'Universitas Pamulang' }}</h5>
                                <p id="preview-faculty" class="text-[11px] text-gray-500">{{ $profile->faculty ?? 'Fakultas Ilmu Komputer' }}</p>
                            </div>
                        </div>

                        <div class="border-t border-gray-200/60 pt-2.5 flex items-center gap-3">
                            <div class="p-2 rounded-xl bg-green-50 text-green-600">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                            </div>
                            <div>
                                <h5 class="font-bold text-gray-800">Fokus Utama</h5>
                                <p id="preview-focus-area" class="text-[11px] text-gray-500">{{ $profile->focus_area ?? 'Web Development' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        function syncInputToPreview(inputId, previewId, prefix = '', suffix = '') {
            const inputElem = document.getElementById(inputId);
            const previewElem = document.getElementById(previewId);
            if (inputElem && previewElem) {
                inputElem.addEventListener('input', (e) => {
                    const val = e.target.value.trim();
                    previewElem.textContent = val ? `${prefix}${val}${suffix}` : previewElem.dataset.default || '';
                });
                previewElem.dataset.default = previewElem.textContent;
            }
        }

        syncInputToPreview('input-full-name', 'preview-full-name');
        syncInputToPreview('input-status-badge', 'preview-status-badge');
        syncInputToPreview('input-bio', 'preview-bio');
        syncInputToPreview('input-semester', 'preview-semester', '0');
        syncInputToPreview('input-study-program', 'preview-study-program', 'Program Studi ');
        syncInputToPreview('input-university', 'preview-university');
        syncInputToPreview('input-faculty', 'preview-faculty');
        syncInputToPreview('input-focus-area', 'preview-focus-area');
    });
</script>