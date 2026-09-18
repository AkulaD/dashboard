<!-- Section Work Logs (05_WORK_LOGS) -->
<section id="work-logs-section" class="space-y-6 pt-10 border-t border-gray-200/60">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between pb-3 border-b border-gray-200/60 gap-2">
        <div>
            <h3 class="text-xl font-bold text-gray-900">Pengaturan Pengalaman Kerja (Work Logs)</h3>
            <p class="text-xs text-gray-500 mt-0.5">Kelola riwayat pekerjaan, posisi, jenis pekerjaan, dan deskripsi kontribusi.</p>
        </div>
        
        <button type="button" id="btn-add-work" class="px-4 py-2 rounded-xl bg-gray-100 hover:bg-gray-200 text-gray-700 text-xs font-semibold transition-all flex items-center justify-center gap-1.5 border border-gray-200/80">
            <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            <span>Tambah Pengalaman</span>
        </button>
    </div>

    <div class="grid grid-cols-1 xl:grid-cols-12 gap-8 items-start">
        <!-- Form Left -->
        <div class="xl:col-span-7 space-y-6">
            <form action="#" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div id="work-list-container" class="space-y-6">
                    @forelse($workExperiences ?? [] as $work)
                    @php
                        $bulletsArr = is_array($work->bullet_points) ?$work->bullet_points : json_decode($work->bullet_points, true);$bulletsText = is_array($bulletsArr) ? implode("\n", $bulletsArr) : '';
                    @endphp
                    <div class="bg-white rounded-2xl border border-gray-100 p-5 shadow-sm space-y-4 work-card" data-work-id="work-{{ $work->id }}">
                        <div class="flex items-center justify-between pb-3 border-b border-gray-100">
                            <div class="flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-green-500"></span>
                                <span class="font-bold text-sm text-gray-900 uppercase">Data Pengalaman Kerja</span>
                            </div>
                            <button type="button" class="btn-delete-work text-xs text-red-500 hover:text-red-600 font-medium">Hapus Data</button>
                        </div>
                        
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-[10px] font-semibold text-gray-500 mb-1">Nama Perusahaan (company_name)</label>
                                <input type="text" name="work_experiences[{{ $work->id }}][company_name]" data-work-target="company" class="work-input w-full bg-gray-50/60 border border-gray-200 rounded-xl px-3 py-2 text-xs text-gray-800 focus:outline-none focus:border-green-500 focus:bg-white transition-all" value="{{ $work->company_name }}" placeholder="Contoh: PT. O'Clock Kreasi Utama Garment">
                            </div>
                            <div>
                                <label class="block text-[10px] font-semibold text-gray-500 mb-1">Jenis Pekerjaan (employment_type)</label>
                                <input type="text" name="work_experiences[{{ $work->id }}][employment_type]" data-work-target="type" class="work-input w-full bg-gray-50/60 border border-gray-200 rounded-xl px-3 py-2 text-xs text-gray-800 focus:outline-none focus:border-green-500 focus:bg-white transition-all" value="{{ $work->employment_type }}" placeholder="Contoh: Magang / Full-time">
                            </div>
                            <div>
                                <label class="block text-[10px] font-semibold text-gray-500 mb-1">Posisi / Jabatan (position)</label>
                                <input type="text" name="work_experiences[{{ $work->id }}][position]" data-work-target="position" class="work-input w-full bg-gray-50/60 border border-gray-200 rounded-xl px-3 py-2 text-xs text-gray-800 focus:outline-none focus:border-green-500 focus:bg-white transition-all" value="{{ $work->position }}" placeholder="Contoh: Administrasi & Pemrosesan Pembayaran">
                            </div>
                            <div>
                                <label class="block text-[10px] font-semibold text-gray-500 mb-1">Periode Waktu (period)</label>
                                <input type="text" name="work_experiences[{{ $work->id }}][period]" data-work-target="period" class="work-input w-full bg-gray-50/60 border border-gray-200 rounded-xl px-3 py-2 text-xs text-gray-800 focus:outline-none focus:border-green-500 focus:bg-white transition-all" value="{{ $work->period }}" placeholder="Contoh: Juni 2025 - Juli 2026">
                            </div>
                            <div class="sm:col-span-2">
                                <label class="block text-[10px] font-semibold text-gray-500 mb-1">Urutan Tampil (sort_order)</label>
                                <input type="number" name="work_experiences[{{ $work->id }}][sort_order]" data-work-target="sort_order" class="work-input w-full bg-gray-50/60 border border-gray-200 rounded-xl px-3 py-2 text-xs text-gray-800 focus:outline-none focus:border-green-500 focus:bg-white transition-all" value="{{ $work->sort_order ?? 0 }}" placeholder="0">
                            </div>
                            <div class="sm:col-span-2">
                                <label class="block text-[10px] font-semibold text-gray-500 mb-1">Poin Deskripsi / Kontribusi (bullet_points - Pisahkan dengan Enter)</label>
                                <textarea name="work_experiences[{{ $work->id }}][bullet_points]" data-work-target="bullets" rows="3" class="work-input w-full bg-gray-50/60 border border-gray-200 rounded-xl px-3 py-2 text-xs text-gray-800 focus:outline-none focus:border-green-500 focus:bg-white transition-all resize-none" placeholder="Tulis tugas dan pencapaian pekerjaan di sini (Pisahkan dengan Enter)...">{{ $bulletsText }}</textarea>
                            </div>
                        </div>
                    </div>
                    @empty
                    <p class="text-xs text-gray-400 font-mono" id="empty-work-msg">Belum ada pengalaman kerja yang ditambahkan.</p>
                    @endforelse
                </div>

                <div id="submit-work-btn-container" class="pt-2 flex justify-end">
                    <button type="submit" class="w-full sm:w-auto px-6 py-2.5 rounded-xl bg-green-600 hover:bg-green-700 text-white font-semibold text-xs transition-all shadow-sm flex items-center justify-center gap-2">
                        <span>Simpan Pengalaman</span>
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
                    Preview Work Logs
                </span>
                <span class="text-[10px] bg-gray-200/60 text-gray-600 px-2 py-0.5 rounded font-mono">Realtime</span>
            </div>

            <div class="space-y-4" id="work-preview-container">
                @forelse($workExperiences ?? [] as $work)
                @php
                    $bulletsArr = is_array($work->bullet_points) ? $work->bullet_points : json_decode($work->bullet_points, true);
                @endphp
                <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm space-y-3 preview-work-card" id="preview-work-{{ $work->id }}">
                    <div class="flex flex-col gap-1">
                        <div class="flex items-center justify-between gap-2">
                            <h4 class="text-base font-bold text-gray-900 preview-company">{{ $work->company_name }}</h4>
                            <span class="px-2.5 py-0.5 rounded-full bg-green-100 text-green-700 text-[10px] font-mono font-semibold preview-type">{{ $work->employment_type }}</span>
                        </div>
                        <p class="text-xs font-semibold text-green-600 preview-position">{{ $work->position }}</p>
                        <div class="text-[10px] font-mono text-gray-500 bg-gray-50 px-2.5 py-1 rounded-lg border border-gray-200/60 w-fit mt-1 preview-period">
                            {{ $work->period }}
                        </div>
                    </div>

                    <ul class="text-xs text-gray-600 space-y-1.5 pt-2 border-t border-gray-100 preview-bullets">
                        @if(is_array($bulletsArr))
                            @foreach($bulletsArr as $bullet)
                            <li class="relative pl-3 before:content-[''] before:absolute before:left-0 before:top-1.5 before:w-1 before:h-1 before:bg-green-500 before:rounded-full">{{ $bullet }}</li>
                            @endforeach
                        @endif
                    </ul>
                </div>
                @empty
                <p class="text-xs text-gray-400 font-mono" id="empty-work-preview-msg">Preview pengalaman kerja akan muncul di sini.</p>
                @endforelse
            </div>
        </div>
    </div>
</section>

<!-- JavaScript Khusus Work Logs -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const workListContainer = document.getElementById('work-list-container');
        const workPreviewContainer = document.getElementById('work-preview-container');
        const btnAddWork = document.getElementById('btn-add-work');

        if (btnAddWork) {
            btnAddWork.addEventListener('click', () => {
                const emptyMsg = document.getElementById('empty-work-msg');
                const emptyPreviewMsg = document.getElementById('empty-work-preview-msg');
                if (emptyMsg) emptyMsg.remove();
                if (emptyPreviewMsg) emptyPreviewMsg.remove();
                
                const timestamp = Date.now();
                const workId = 'work-' + timestamp;
                
                const formHTML = `
                    <div class="bg-white rounded-2xl border border-gray-100 p-5 shadow-sm space-y-4 work-card" data-work-id="${workId}">
                        <div class="flex items-center justify-between pb-3 border-b border-gray-100">
                            <div class="flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-green-500"></span>
                                <span class="font-bold text-sm text-gray-900 uppercase">Data Pengalaman Kerja Baru</span>
                            </div>
                            <button type="button" class="btn-delete-work text-xs text-red-500 hover:text-red-600 font-medium">Hapus Data</button>
                        </div>
                        
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-[10px] font-semibold text-gray-500 mb-1">Nama Perusahaan (company_name)</label>
                                <input type="text" name="work_experiences[new_${timestamp}][company_name]" data-work-target="company" class="work-input w-full bg-gray-50/60 border border-gray-200 rounded-xl px-3 py-2 text-xs text-gray-800 focus:outline-none focus:border-green-500 focus:bg-white transition-all" placeholder="Contoh: PT. O'Clock Kreasi Utama Garment">
                            </div>
                            <div>
                                <label class="block text-[10px] font-semibold text-gray-500 mb-1">Jenis Pekerjaan (employment_type)</label>
                                <input type="text" name="work_experiences[new_${timestamp}][employment_type]" data-work-target="type" class="work-input w-full bg-gray-50/60 border border-gray-200 rounded-xl px-3 py-2 text-xs text-gray-800 focus:outline-none focus:border-green-500 focus:bg-white transition-all" placeholder="Contoh: Magang / Full-time">
                            </div>
                            <div>
                                <label class="block text-[10px] font-semibold text-gray-500 mb-1">Posisi / Jabatan (position)</label>
                                <input type="text" name="work_experiences[new_${timestamp}][position]" data-work-target="position" class="work-input w-full bg-gray-50/60 border border-gray-200 rounded-xl px-3 py-2 text-xs text-gray-800 focus:outline-none focus:border-green-500 focus:bg-white transition-all" placeholder="Contoh: Administrasi & Pemrosesan Pembayaran">
                            </div>
                            <div>
                                <label class="block text-[10px] font-semibold text-gray-500 mb-1">Periode Waktu (period)</label>
                                <input type="text" name="work_experiences[new_${timestamp}][period]" data-work-target="period" class="work-input w-full bg-gray-50/60 border border-gray-200 rounded-xl px-3 py-2 text-xs text-gray-800 focus:outline-none focus:border-green-500 focus:bg-white transition-all" placeholder="Contoh: Juni 2025 - Juli 2026">
                            </div>
                            <div class="sm:col-span-2">
                                <label class="block text-[10px] font-semibold text-gray-500 mb-1">Urutan Tampil (sort_order)</label>
                                <input type="number" name="work_experiences[new_${timestamp}][sort_order]" data-work-target="sort_order" class="work-input w-full bg-gray-50/60 border border-gray-200 rounded-xl px-3 py-2 text-xs text-gray-800 focus:outline-none focus:border-green-500 focus:bg-white transition-all" placeholder="0">
                            </div>
                            <div class="sm:col-span-2">
                                <label class="block text-[10px] font-semibold text-gray-500 mb-1">Poin Deskripsi / Kontribusi (bullet_points - Pisahkan dengan Enter)</label>
                                <textarea name="work_experiences[new_${timestamp}][bullet_points]" data-work-target="bullets" rows="3" class="work-input w-full bg-gray-50/60 border border-gray-200 rounded-xl px-3 py-2 text-xs text-gray-800 focus:outline-none focus:border-green-500 focus:bg-white transition-all resize-none" placeholder="Tulis tugas dan pencapaian pekerjaan di sini (Pisahkan dengan Enter)..."></textarea>
                            </div>
                        </div>
                    </div>`;

                const previewHTML = `
                    <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm space-y-3 preview-work-card" id="preview-${workId}">
                        <div class="flex flex-col gap-1">
                            <div class="flex items-center justify-between gap-2">
                                <h4 class="text-base font-bold text-gray-900 preview-company">NAMA PERUSAHAAN</h4>
                                <span class="px-2.5 py-0.5 rounded-full bg-green-100 text-green-700 text-[10px] font-mono font-semibold preview-type">MAGANG</span>
                            </div>
                            <p class="text-xs font-semibold text-green-600 preview-position">POSISI / JABATAN</p>
                            <div class="text-[10px] font-mono text-gray-500 bg-gray-50 px-2.5 py-1 rounded-lg border border-gray-200/60 w-fit mt-1 preview-period">
                                PERIODE WAKTU
                            </div>
                        </div>
                        <ul class="text-xs text-gray-600 space-y-1.5 pt-2 border-t border-gray-100 preview-bullets">
                            <li class="relative pl-3 before:content-[''] before:absolute before:left-0 before:top-1.5 before:w-1 before:h-1 before:bg-green-500 before:rounded-full">Poin kontribusi akan muncul di sini.</li>
                        </ul>
                    </div>`;

                workListContainer.insertAdjacentHTML('beforeend', formHTML);
                workPreviewContainer.insertAdjacentHTML('beforeend', previewHTML);
            });
        }

        if (workListContainer) {
            workListContainer.addEventListener('click', (e) => {
                if (e.target.classList.contains('btn-delete-work')) {
                    const card = e.target.closest('.work-card');
                    const id = card.dataset.workId;
                    card.remove();
                    const previewCard = document.getElementById(`preview-${id}`);
                    if (previewCard) previewCard.remove();
                }
            });

            workListContainer.addEventListener('input', (e) => {
                if (e.target.classList.contains('work-input')) {
                    const card = e.target.closest('.work-card');
                    const id = card.dataset.workId;
                    const targetClass = e.target.dataset.workTarget;
                    const previewCard = document.getElementById(`preview-${id}`);
                    
                    if (!previewCard) return;

                    const previewElement = previewCard.querySelector(`.preview-${targetClass}`);
                    const val = e.target.value;

                    if (targetClass === 'bullets') {
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
                            previewElement.textContent = val.trim() || e.target.placeholder.replace('Contoh: ', '');
                        }
                    }
                }
            });
        }
    });
</script>