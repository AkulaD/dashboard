<!-- Section Sertifikat (04_CERTIFICATES) -->
<section id="certificates-section" class="space-y-6 pt-10 border-t border-gray-200/60">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between pb-3 border-b border-gray-200/60 gap-2">
        <div>
            <h3 class="text-xl font-bold text-gray-900">Pengaturan Sertifikat (Certificates)</h3>
            <p class="text-xs text-gray-500 mt-0.5">Kelola lisensi, sertifikat pelatihan, dan bukti kompetensi profesional.</p>
        </div>
        
        <button type="button" id="btn-add-certificate" class="px-4 py-2 rounded-xl bg-gray-100 hover:bg-gray-200 text-gray-700 text-xs font-semibold transition-all flex items-center justify-center gap-1.5 border border-gray-200/80">
            <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            <span>Tambah Sertifikat</span>
        </button>
    </div>

    <div class="grid grid-cols-1 xl:grid-cols-12 gap-8 items-start">
        <!-- Form Left -->
        <div class="xl:col-span-7 space-y-6">
            <!-- PENTING: enctype="multipart/form-data" ditambahkan agar bisa upload file -->
            <form action="#" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <div id="cert-list-container" class="space-y-6">
                    @forelse($certificates ?? [] as $cert)
                    <div class="bg-white rounded-2xl border border-gray-100 p-5 shadow-sm space-y-4 cert-card" data-cert-id="cert-{{ $cert->id }}">
                        <div class="flex items-center justify-between pb-3 border-b border-gray-100">
                            <div class="flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-green-500"></span>
                                <span class="font-bold text-sm text-gray-900 uppercase">Data Sertifikat</span>
                            </div>
                            <button type="button" class="btn-delete-cert text-xs text-red-500 hover:text-red-600 font-medium">Hapus Data</button>
                        </div>
                        
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="sm:col-span-2">
                                <label class="block text-[10px] font-semibold text-gray-500 mb-1">Nama Sertifikat (title)</label>
                                <input type="text" name="certificates[{{ $cert->id }}][title]" data-cert-target="title" class="cert-input w-full bg-gray-50/60 border border-gray-200 rounded-xl px-3 py-2 text-xs text-gray-800 focus:outline-none focus:border-green-500 focus:bg-white transition-all" value="{{ $cert->title }}" placeholder="Contoh: Pengembangan Web Tingkat Lanjut">
                            </div>
                            <div>
                                <label class="block text-[10px] font-semibold text-gray-500 mb-1">Penerbit (issuer)</label>
                                <input type="text" name="certificates[{{ $cert->id }}][issuer]" data-cert-target="issuer" class="cert-input w-full bg-gray-50/60 border border-gray-200 rounded-xl px-3 py-2 text-xs text-gray-800 focus:outline-none focus:border-green-500 focus:bg-white transition-all" value="{{ $cert->issuer }}" placeholder="Contoh: Dicoding Indonesia">
                            </div>
                            <div>
                                <label class="block text-[10px] font-semibold text-gray-500 mb-1">Tahun (year)</label>
                                <input type="number" min="1900" max="2099" name="certificates[{{ $cert->id }}][year]" data-cert-target="year" class="cert-input w-full bg-gray-50/60 border border-gray-200 rounded-xl px-3 py-2 text-xs text-gray-800 focus:outline-none focus:border-green-500 focus:bg-white transition-all" value="{{ $cert->year }}" placeholder="2026">
                            </div>
                            <div class="sm:col-span-2">
                                <label class="block text-[10px] font-semibold text-gray-500 mb-1">Urutan Tampil (sort_order)</label>
                                <input type="number" name="certificates[{{ $cert->id }}][sort_order]" data-cert-target="sort_order" class="cert-input w-full bg-gray-50/60 border border-gray-200 rounded-xl px-3 py-2 text-xs text-gray-800 focus:outline-none focus:border-green-500 focus:bg-white transition-all" value="{{ $cert->sort_order ?? 0 }}" placeholder="0">
                            </div>

                            <!-- Bidang Upload File & Dokumen (file_path) -->
                            <div class="sm:col-span-2 space-y-2">
                                <label class="block text-[10px] font-semibold text-gray-500">Berkas / Dokumen Sertifikat (file_path)</label>
                                
                                <div class="relative border-2 border-dashed border-gray-200 rounded-2xl p-4 hover:border-green-500 bg-gray-50/40 hover:bg-green-50/20 transition-all text-center group cursor-pointer">
                                    <input type="file" name="certificates[{{ $cert->id }}][file_document]" data-cert-target="file" class="cert-file-input absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" accept="image/*,.pdf">
                                    
                                    <div class="flex flex-col items-center justify-center space-y-1.5 pointer-events-none">
                                        <div class="p-2.5 rounded-full bg-green-50 text-green-600 group-hover:scale-110 transition-transform">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/></svg>
                                        </div>
                                        <p class="text-xs font-semibold text-gray-700">Klik atau seret file dokumen sertifikat ke sini</p>
                                        <p class="text-[10px] text-gray-400 font-mono">Format yang didukung: PDF, PNG, JPG, WEBP (Maks. 5MB)</p>
                                        <span class="file-name-indicator text-xs font-mono font-bold text-green-600 bg-white px-2.5 py-1 rounded-md border border-gray-200 mt-1 shadow-sm hidden"></span>
                                    </div>
                                </div>

                                <!-- Opsi Link Eksternal Cadangan -->
                                <div class="pt-1">
                                    <details class="text-[11px] text-gray-500 cursor-pointer">
                                        <summary class="hover:text-green-600 transition-colors font-medium">Atau gunakan URL / Link Eksternal (Google Drive / Cloud)</summary>
                                        <input type="text" name="certificates[{{ $cert->id }}][file_path]" data-cert-target="url" class="cert-input mt-2 w-full bg-gray-50/60 border border-gray-200 rounded-xl px-3 py-1.5 text-xs text-gray-800 focus:outline-none focus:border-green-500 focus:bg-white transition-all" value="{{ $cert->file_path }}" placeholder="https://drive.google.com/... atau https://...">
                                    </details>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <p class="text-xs text-gray-400 font-mono" id="empty-cert-msg">Belum ada data sertifikat yang ditambahkan.</p>
                    @endforelse
                </div>

                <div id="submit-cert-btn-container" class="pt-2 flex justify-end">
                    <button type="submit" class="w-full sm:w-auto px-6 py-2.5 rounded-xl bg-green-600 hover:bg-green-700 text-white font-semibold text-xs transition-all shadow-sm flex items-center justify-center gap-2">
                        <span>Simpan Sertifikat</span>
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
                    Preview Kartu Sertifikat
                </span>
                <span class="text-[10px] bg-gray-200/60 text-gray-600 px-2 py-0.5 rounded font-mono">Realtime</span>
            </div>

            <div class="grid grid-cols-1 gap-4" id="cert-preview-container">
                @forelse($certificates ?? [] as $cert)
                <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm space-y-4 preview-cert-card" id="preview-cert-{{ $cert->id }}">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-mono font-semibold text-green-600 bg-green-50 px-2.5 py-1 rounded-md border border-green-200/50 preview-year">{{ $cert->year }}</span>
                        <div class="p-2 rounded-xl bg-gray-50 text-gray-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
                        </div>
                    </div>
                    <div>
                        <h4 class="text-base font-bold text-gray-900 leading-snug preview-title">{{ $cert->title }}</h4>
                        <p class="text-xs text-gray-500 mt-1">Penerbit: <span class="preview-issuer">{{ $cert->issuer }}</span></p>
                    </div>
                    <a href="{{ $cert->file_path ?? '#' }}" target="_blank" class="w-full py-2 px-3 rounded-xl bg-gray-50 hover:bg-green-600 text-gray-700 hover:text-white font-medium text-xs font-mono transition-all flex items-center justify-center gap-2 border border-gray-200/80 preview-link">
                        <span>VIEW CERTIFICATE</span>
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    </a>
                </div>
                @empty
                <p class="text-xs text-gray-400 font-mono" id="empty-cert-preview-msg">Preview kartu sertifikat akan muncul di sini.</p>
                @endforelse
            </div>
        </div>
    </div>
</section>

<!-- JavaScript Khusus Certificates -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const certListContainer = document.getElementById('cert-list-container');
        const certPreviewContainer = document.getElementById('cert-preview-container');
        const btnAddCert = document.getElementById('btn-add-certificate');

        if (btnAddCert) {
            btnAddCert.addEventListener('click', () => {
                const emptyMsg = document.getElementById('empty-cert-msg');
                const emptyPreviewMsg = document.getElementById('empty-cert-preview-msg');
                if (emptyMsg) emptyMsg.remove();
                if (emptyPreviewMsg) emptyPreviewMsg.remove();
                
                const certId = 'cert-' + Date.now();
                
                const formHTML = `
                    <div class="bg-white rounded-2xl border border-gray-100 p-5 shadow-sm space-y-4 cert-card" data-cert-id="${certId}">
                        <div class="flex items-center justify-between pb-3 border-b border-gray-100">
                            <div class="flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-green-500"></span>
                                <span class="font-bold text-sm text-gray-900 uppercase">Data Sertifikat</span>
                            </div>
                            <button type="button" class="btn-delete-cert text-xs text-red-500 hover:text-red-600 font-medium">Hapus Data</button>
                        </div>
                        
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="sm:col-span-2">
                                <label class="block text-[10px] font-semibold text-gray-500 mb-1">Nama Sertifikat (title)</label>
                                <input type="text" name="certificates[new_${Date.now()}][title]" data-cert-target="title" class="cert-input w-full bg-gray-50/60 border border-gray-200 rounded-xl px-3 py-2 text-xs text-gray-800 focus:outline-none focus:border-green-500 focus:bg-white transition-all" placeholder="Contoh: Pengembangan Web Tingkat Lanjut">
                            </div>
                            <div>
                                <label class="block text-[10px] font-semibold text-gray-500 mb-1">Penerbit (issuer)</label>
                                <input type="text" name="certificates[new_${Date.now()}][issuer]" data-cert-target="issuer" class="cert-input w-full bg-gray-50/60 border border-gray-200 rounded-xl px-3 py-2 text-xs text-gray-800 focus:outline-none focus:border-green-500 focus:bg-white transition-all" placeholder="Contoh: Dicoding Indonesia">
                            </div>
                            <div>
                                <label class="block text-[10px] font-semibold text-gray-500 mb-1">Tahun (year)</label>
                                <input type="number" min="1900" max="2099" name="certificates[new_${Date.now()}][year]" data-cert-target="year" class="cert-input w-full bg-gray-50/60 border border-gray-200 rounded-xl px-3 py-2 text-xs text-gray-800 focus:outline-none focus:border-green-500 focus:bg-white transition-all" placeholder="2026">
                            </div>
                            <div class="sm:col-span-2">
                                <label class="block text-[10px] font-semibold text-gray-500 mb-1">Urutan Tampil (sort_order)</label>
                                <input type="number" name="certificates[new_${Date.now()}][sort_order]" data-cert-target="sort_order" class="cert-input w-full bg-gray-50/60 border border-gray-200 rounded-xl px-3 py-2 text-xs text-gray-800 focus:outline-none focus:border-green-500 focus:bg-white transition-all" placeholder="0">
                            </div>

                            <div class="sm:col-span-2 space-y-2">
                                <label class="block text-[10px] font-semibold text-gray-500">Berkas / Dokumen Sertifikat (file_path)</label>
                                <div class="relative border-2 border-dashed border-gray-200 rounded-2xl p-4 hover:border-green-500 bg-gray-50/40 hover:bg-green-50/20 transition-all text-center group cursor-pointer">
                                    <input type="file" name="certificates[new_${Date.now()}][file_document]" data-cert-target="file" class="cert-file-input absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" accept="image/*,.pdf">
                                    <div class="flex flex-col items-center justify-center space-y-1.5 pointer-events-none">
                                        <div class="p-2.5 rounded-full bg-green-50 text-green-600 group-hover:scale-110 transition-transform">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/></svg>
                                        </div>
                                        <p class="text-xs font-semibold text-gray-700">Klik atau seret file dokumen sertifikat ke sini</p>
                                        <p class="text-[10px] text-gray-400 font-mono">Format yang didukung: PDF, PNG, JPG, WEBP (Maks. 5MB)</p>
                                        <span class="file-name-indicator text-xs font-mono font-bold text-green-600 bg-white px-2.5 py-1 rounded-md border border-gray-200 mt-1 shadow-sm hidden"></span>
                                    </div>
                                </div>
                                <div class="pt-1">
                                    <details class="text-[11px] text-gray-500 cursor-pointer">
                                        <summary class="hover:text-green-600 transition-colors font-medium">Atau gunakan URL / Link Eksternal (Google Drive / Cloud)</summary>
                                        <input type="text" name="certificates[new_${Date.now()}][file_path]" data-cert-target="url" class="cert-input mt-2 w-full bg-gray-50/60 border border-gray-200 rounded-xl px-3 py-1.5 text-xs text-gray-800 focus:outline-none focus:border-green-500 focus:bg-white transition-all" placeholder="https://drive.google.com/... atau https://...">
                                    </details>
                                </div>
                            </div>
                        </div>
                    </div>`;

                const previewHTML = `
                    <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm space-y-4 preview-cert-card" id="preview-${certId}">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-mono font-semibold text-green-600 bg-green-50 px-2.5 py-1 rounded-md border border-green-200/50 preview-year">2026</span>
                            <div class="p-2 rounded-xl bg-gray-50 text-gray-400">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
                            </div>
                        </div>
                        <div>
                            <h4 class="text-base font-bold text-gray-900 leading-snug preview-title">Pengembangan Web Tingkat Lanjut</h4>
                            <p class="text-xs text-gray-500 mt-1">Penerbit: <span class="preview-issuer">Dicoding Indonesia</span></p>
                        </div>
                        <a href="#" target="_blank" class="w-full py-2 px-3 rounded-xl bg-gray-50 hover:bg-green-600 text-gray-700 hover:text-white font-medium text-xs font-mono transition-all flex items-center justify-center gap-2 border border-gray-200/80 preview-link">
                            <span>VIEW CERTIFICATE</span>
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                        </a>
                    </div>`;

                certListContainer.insertAdjacentHTML('beforeend', formHTML);
                certPreviewContainer.insertAdjacentHTML('beforeend', previewHTML);
            });
        }

        if (certListContainer) {
            certListContainer.addEventListener('click', (e) => {
                if (e.target.classList.contains('btn-delete-cert')) {
                    const card = e.target.closest('.cert-card');
                    const id = card.dataset.certId;
                    card.remove();
                    const previewCard = document.getElementById(`preview-${id}`);
                    if (previewCard) previewCard.remove();
                }
            });

            // Handler perubahan file upload
            certListContainer.addEventListener('change', (e) => {
                if (e.target.classList.contains('cert-file-input')) {
                    const fileInput = e.target;
                    const card = fileInput.closest('.cert-card');
                    const id = card.dataset.certId;
                    const indicator = card.querySelector('.file-name-indicator');
                    const previewCard = document.getElementById(`preview-${id}`);

                    if (fileInput.files && fileInput.files[0]) {
                        const file = fileInput.files[0];
                        if (indicator) {
                            indicator.textContent = `File dipilih: ${file.name}`;
                            indicator.classList.remove('hidden');
                        }

                        // Buat Object URL sementara untuk preview tautan realtime
                        if (previewCard) {
                            const linkElem = previewCard.querySelector('.preview-link');
                            if (linkElem) {
                                linkElem.href = URL.createObjectURL(file);
                            }
                        }
                    }
                }
            });

            // Handler input teks
            certListContainer.addEventListener('input', (e) => {
                if (e.target.classList.contains('cert-input')) {
                    const card = e.target.closest('.cert-card');
                    const id = card.dataset.certId;
                    const targetClass = e.target.dataset.certTarget;
                    const previewCard = document.getElementById(`preview-${id}`);
                    
                    if (!previewCard) return;

                    const val = e.target.value.trim();

                    if (targetClass === 'url') {
                        const linkElem = previewCard.querySelector('.preview-link');
                        if (linkElem) linkElem.href = val || '#';
                    } else if (targetClass !== 'sort_order') {
                        const previewElement = previewCard.querySelector(`.preview-${targetClass}`);
                        if (previewElement) {
                            previewElement.textContent = val || e.target.placeholder.replace('Contoh: ', '');
                        }
                    }
                }
            });
        }
    });
</script>