<!-- Section Pendidikan (03_EDUCATION) -->
<section id="education-section" class="space-y-6 pt-10 border-t border-gray-200/60">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between pb-3 border-b border-gray-200/60 gap-2">
        <div>
            <h3 class="text-xl font-bold text-gray-900">Pengaturan Pendidikan (Education)</h3>
            <p class="text-xs text-gray-500 mt-0.5">Kelola riwayat pendidikan formal dan latar belakang akademis.</p>
        </div>
        
        <button type="button" id="btn-add-education" class="px-4 py-2 rounded-xl bg-gray-100 hover:bg-gray-200 text-gray-700 text-xs font-semibold transition-all flex items-center justify-center gap-1.5 border border-gray-200/80">
            <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            <span>Tambah Pendidikan</span>
        </button>
    </div>

    <div class="grid grid-cols-1 xl:grid-cols-12 gap-8 items-start">
        <!-- Form Left -->
        <div class="xl:col-span-7 space-y-6">
            <form action="#" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div id="education-list-container" class="space-y-6">
                    @forelse($educations ?? [] as $edu)
                    @php
                        $detailsArr = is_array($edu->details) ?$edu->details : json_decode($edu->details, true);$detailsText = is_array($detailsArr) ? implode("\n", $detailsArr) : '';
                    @endphp
                    <div class="bg-white rounded-2xl border border-gray-100 p-5 shadow-sm space-y-4 edu-card" data-edu-id="edu-{{ $edu->id }}">
                        <div class="flex items-center justify-between pb-3 border-b border-gray-100">
                            <div class="flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-green-500"></span>
                                <span class="font-bold text-sm text-gray-900 uppercase">Data Pendidikan</span>
                            </div>
                            <button type="button" class="btn-delete-edu text-xs text-red-500 hover:text-red-600 font-medium">Hapus Data</button>
                        </div>
                        
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-[10px] font-semibold text-gray-500 mb-1">Tingkat Pendidikan (level_type)</label>
                                <input type="text" name="educations[{{ $edu->id }}][level_type]" data-edu-target="level" class="edu-input w-full bg-gray-50/60 border border-gray-200 rounded-xl px-3 py-2 text-xs text-gray-800 focus:outline-none focus:border-green-500 focus:bg-white transition-all" value="{{ $edu->level_type }}" placeholder="Contoh: Perguruan Tinggi">
                            </div>
                            <div>
                                <label class="block text-[10px] font-semibold text-gray-500 mb-1">Periode Waktu (period)</label>
                                <input type="text" name="educations[{{ $edu->id }}][period]" data-edu-target="period" class="edu-input w-full bg-gray-50/60 border border-gray-200 rounded-xl px-3 py-2 text-xs text-gray-800 focus:outline-none focus:border-green-500 focus:bg-white transition-all" value="{{ $edu->period }}" placeholder="Contoh: September 2025 - Sekarang">
                            </div>
                            <div class="sm:col-span-2">
                                <label class="block text-[10px] font-semibold text-gray-500 mb-1">Nama Institusi (institution_name)</label>
                                <input type="text" name="educations[{{ $edu->id }}][institution_name]" data-edu-target="institution" class="edu-input w-full bg-gray-50/60 border border-gray-200 rounded-xl px-3 py-2 text-xs text-gray-800 focus:outline-none focus:border-green-500 focus:bg-white transition-all" value="{{ $edu->institution_name }}" placeholder="Contoh: Universitas Pamulang">
                            </div>
                            <div class="sm:col-span-2">
                                <label class="block text-[10px] font-semibold text-gray-500 mb-1">Jurusan / Program Studi (major)</label>
                                <input type="text" name="educations[{{ $edu->id }}][major]" data-edu-target="major" class="edu-input w-full bg-gray-50/60 border border-gray-200 rounded-xl px-3 py-2 text-xs text-gray-800 focus:outline-none focus:border-green-500 focus:bg-white transition-all" value="{{ $edu->major }}" placeholder="Contoh: S1 Sistem Informasi">
                            </div>
                            <div class="sm:col-span-2">
                                <label class="block text-[10px] font-semibold text-gray-500 mb-1">Urutan Tampil (sort_order)</label>
                                <input type="number" name="educations[{{ $edu->id }}][sort_order]" data-edu-target="sort_order" class="edu-input w-full bg-gray-50/60 border border-gray-200 rounded-xl px-3 py-2 text-xs text-gray-800 focus:outline-none focus:border-green-500 focus:bg-white transition-all" value="{{ $edu->sort_order ?? 0 }}" placeholder="0">
                            </div>
                            <div class="sm:col-span-2">
                                <label class="block text-[10px] font-semibold text-gray-500 mb-1">Deskripsi Poin / Detail (details)</label>
                                <textarea name="educations[{{ $edu->id }}][details]" data-edu-target="desc" rows="3" class="edu-input w-full bg-gray-50/60 border border-gray-200 rounded-xl px-3 py-2 text-xs text-gray-800 focus:outline-none focus:border-green-500 focus:bg-white transition-all resize-none" placeholder="Tulis deskripsi atau mata kuliah relevan di sini (Pisahkan dengan Enter)...">{{ $detailsText }}</textarea>
                            </div>
                        </div>
                    </div>
                    @empty
                    <p class="text-xs text-gray-400 font-mono" id="empty-edu-msg">Belum ada riwayat pendidikan yang ditambahkan.</p>
                    @endforelse
                </div>

                <div id="submit-edu-btn-container" class="pt-2 flex justify-end">
                    <button type="submit" class="w-full sm:w-auto px-6 py-2.5 rounded-xl bg-green-600 hover:bg-green-700 text-white font-semibold text-xs transition-all shadow-sm flex items-center justify-center gap-2">
                        <span>Simpan Pendidikan</span>
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
                    Preview Latar Belakang Akademis
                </span>
                <span class="text-[10px] bg-gray-200/60 text-gray-600 px-2 py-0.5 rounded font-mono">Realtime</span>
            </div>

            <div class="border-l border-green-200 ml-2.5 pl-6 space-y-8 py-2" id="education-preview-container">
                @forelse($educations ?? [] as $edu)
                @php
                    $detailsArr = is_array($edu->details) ? $edu->details : json_decode($edu->details, true);
                @endphp
                <div class="relative preview-edu-card" id="preview-edu-{{ $edu->id }}">
                    <span class="absolute -left-[31px] top-1.5 w-3 h-3 rounded-full bg-white border-2 border-green-500"></span>
                    <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm space-y-3 relative z-10">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2">
                            <span class="text-[10px] font-bold text-green-600 uppercase tracking-widest preview-level">{{ $edu->level_type }}</span>
                            <span class="text-[10px] font-semibold text-green-700 bg-green-50 px-2.5 py-1 rounded-full preview-period">{{ $edu->period }}</span>
                        </div>
                        <h4 class="text-lg font-bold text-gray-900 preview-institution">{{ $edu->institution_name }}</h4>
                        <p class="text-sm font-semibold text-gray-800 preview-major">{{ $edu->major }}</p>
                        <ul class="text-xs text-gray-600 space-y-1.5 preview-desc">
                            @if(is_array($detailsArr))
                                @foreach($detailsArr as $detail)
                                <li class="relative pl-3 before:content-[''] before:absolute before:left-0 before:top-1.5 before:w-1 before:h-1 before:bg-green-500 before:rounded-full">{{ $detail }}</li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
                @empty
                <p class="text-xs text-gray-400 font-mono" id="empty-preview-msg">Preview timeline pendidikan akan muncul di sini.</p>
                @endforelse
            </div>
        </div>
    </div>
</section>

<!-- JavaScript Khusus Education -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const eduListContainer = document.getElementById('education-list-container');
        const eduPreviewContainer = document.getElementById('education-preview-container');
        const btnAddEdu = document.getElementById('btn-add-education');

        if (btnAddEdu) {
            btnAddEdu.addEventListener('click', () => {
                const emptyMsg = document.getElementById('empty-edu-msg');
                const emptyPreviewMsg = document.getElementById('empty-preview-msg');
                if (emptyMsg) emptyMsg.remove();
                if (emptyPreviewMsg) emptyPreviewMsg.remove();
                
                const timestamp = Date.now();
                const eduId = 'edu-' + timestamp;
                
                const formHTML = `
                    <div class="bg-white rounded-2xl border border-gray-100 p-5 shadow-sm space-y-4 edu-card" data-edu-id="${eduId}">
                        <div class="flex items-center justify-between pb-3 border-b border-gray-100">
                            <div class="flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-green-500"></span>
                                <span class="font-bold text-sm text-gray-900 uppercase">Data Pendidikan Baru</span>
                            </div>
                            <button type="button" class="btn-delete-edu text-xs text-red-500 hover:text-red-600 font-medium">Hapus Data</button>
                        </div>
                        
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-[10px] font-semibold text-gray-500 mb-1">Tingkat Pendidikan (level_type)</label>
                                <input type="text" name="educations[new_${timestamp}][level_type]" data-edu-target="level" class="edu-input w-full bg-gray-50/60 border border-gray-200 rounded-xl px-3 py-2 text-xs text-gray-800 focus:outline-none focus:border-green-500 focus:bg-white transition-all" placeholder="Contoh: Perguruan Tinggi">
                            </div>
                            <div>
                                <label class="block text-[10px] font-semibold text-gray-500 mb-1">Periode Waktu (period)</label>
                                <input type="text" name="educations[new_${timestamp}][period]" data-edu-target="period" class="edu-input w-full bg-gray-50/60 border border-gray-200 rounded-xl px-3 py-2 text-xs text-gray-800 focus:outline-none focus:border-green-500 focus:bg-white transition-all" placeholder="Contoh: September 2025 - Sekarang">
                            </div>
                            <div class="sm:col-span-2">
                                <label class="block text-[10px] font-semibold text-gray-500 mb-1">Nama Institusi (institution_name)</label>
                                <input type="text" name="educations[new_${timestamp}][institution_name]" data-edu-target="institution" class="edu-input w-full bg-gray-50/60 border border-gray-200 rounded-xl px-3 py-2 text-xs text-gray-800 focus:outline-none focus:border-green-500 focus:bg-white transition-all" placeholder="Contoh: Universitas Pamulang">
                            </div>
                            <div class="sm:col-span-2">
                                <label class="block text-[10px] font-semibold text-gray-500 mb-1">Jurusan / Program Studi (major)</label>
                                <input type="text" name="educations[new_${timestamp}][major]" data-edu-target="major" class="edu-input w-full bg-gray-50/60 border border-gray-200 rounded-xl px-3 py-2 text-xs text-gray-800 focus:outline-none focus:border-green-500 focus:bg-white transition-all" placeholder="Contoh: S1 Sistem Informasi">
                            </div>
                            <div class="sm:col-span-2">
                                <label class="block text-[10px] font-semibold text-gray-500 mb-1">Urutan Tampil (sort_order)</label>
                                <input type="number" name="educations[new_${timestamp}][sort_order]" data-edu-target="sort_order" class="edu-input w-full bg-gray-50/60 border border-gray-200 rounded-xl px-3 py-2 text-xs text-gray-800 focus:outline-none focus:border-green-500 focus:bg-white transition-all" placeholder="0">
                            </div>
                            <div class="sm:col-span-2">
                                <label class="block text-[10px] font-semibold text-gray-500 mb-1">Deskripsi Poin / Detail (details)</label>
                                <textarea name="educations[new_${timestamp}][details]" data-edu-target="desc" rows="3" class="edu-input w-full bg-gray-50/60 border border-gray-200 rounded-xl px-3 py-2 text-xs text-gray-800 focus:outline-none focus:border-green-500 focus:bg-white transition-all resize-none" placeholder="Tulis deskripsi atau mata kuliah relevan di sini (Pisahkan dengan Enter)..."></textarea>
                            </div>
                        </div>
                    </div>`;

                const previewHTML = `
                    <div class="relative preview-edu-card" id="preview-${eduId}">
                        <span class="absolute -left-[31px] top-1.5 w-3 h-3 rounded-full bg-white border-2 border-green-500"></span>
                        <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm space-y-3 relative z-10">
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2">
                                <span class="text-[10px] font-bold text-green-600 uppercase tracking-widest preview-level">PERGURUAN TINGGI</span>
                                <span class="text-[10px] font-semibold text-green-700 bg-green-50 px-2.5 py-1 rounded-full preview-period">PERIODE WAKTU</span>
                            </div>
                            <h4 class="text-lg font-bold text-gray-900 preview-institution">NAMA INSTITUSI</h4>
                            <p class="text-sm font-semibold text-gray-800 preview-major">JURUSAN / PROGRAM STUDI</p>
                            <ul class="text-xs text-gray-600 space-y-1.5 preview-desc">
                                <li class="relative pl-3 before:content-[''] before:absolute before:left-0 before:top-1.5 before:w-1 before:h-1 before:bg-green-500 before:rounded-full">Deskripsi akan muncul di sini.</li>
                            </ul>
                        </div>
                    </div>`;

                eduListContainer.insertAdjacentHTML('beforeend', formHTML);
                eduPreviewContainer.insertAdjacentHTML('beforeend', previewHTML);
            });
        }

        if (eduListContainer) {
            eduListContainer.addEventListener('click', (e) => {
                if (e.target.classList.contains('btn-delete-edu')) {
                    const card = e.target.closest('.edu-card');
                    const id = card.dataset.eduId;
                    card.remove();
                    const previewCard = document.getElementById(`preview-${id}`);
                    if (previewCard) previewCard.remove();
                }
            });

            eduListContainer.addEventListener('input', (e) => {
                if (e.target.classList.contains('edu-input')) {
                    const card = e.target.closest('.edu-card');
                    const id = card.dataset.eduId;
                    const targetClass = e.target.dataset.eduTarget;
                    const previewCard = document.getElementById(`preview-${id}`);
                    
                    if (!previewCard) return;

                    const previewElement = previewCard.querySelector(`.preview-${targetClass}`);
                    const val = e.target.value;

                    if (targetClass === 'desc') {
                        if (previewElement) {
                            previewElement.innerHTML = '';
                            val.split('\n').forEach(line => {
                                if (line.trim() !== '') {
                                    previewElement.innerHTML += `<li class="relative pl-3 before:content-[''] before:absolute before:left-0 before:top-1.5 before:w-1 before:h-1 before:bg-green-500 before:rounded-full">${line}</li>`;
                                }
                            });
                        }
                    } else if (targetClass !== 'sort_order') {
                        if (previewElement) {
                            previewElement.textContent = val.trim() || e.target.placeholder.replace('Contoh: ', '').toUpperCase();
                        }
                    }
                }
            });
        }
    });
</script>