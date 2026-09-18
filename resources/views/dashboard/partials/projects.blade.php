<!-- Section Proyek (06_PROJECTS) -->
<section id="projects-section" class="space-y-6 pt-10 border-t border-gray-200/60">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between pb-3 border-b border-gray-200/60 gap-2">
        <div>
            <h3 class="text-xl font-bold text-gray-900">Pengaturan Proyek (Projects)</h3>
            <p class="text-xs text-gray-500 mt-0.5">Kelola karya pengembangan web, aplikasi, dan sistem yang telah dikerjakan.</p>
        </div>
        
        <button type="button" id="btn-add-project" class="px-4 py-2 rounded-xl bg-gray-100 hover:bg-gray-200 text-gray-700 text-xs font-semibold transition-all flex items-center justify-center gap-1.5 border border-gray-200/80">
            <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            <span>Tambah Proyek</span>
        </button>
    </div>

    <div class="grid grid-cols-1 xl:grid-cols-12 gap-8 items-start">
        <!-- Form Left -->
        <div class="xl:col-span-7 space-y-6">
            <form action="#" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div id="project-list-container" class="space-y-6">
                    @forelse($projects ?? [] as $project)
                    @php
                        $bulletsArr = is_array($project->bullet_points) ?$project->bullet_points : json_decode($project->bullet_points, true);$bulletsText = is_array($bulletsArr) ? implode("\n", $bulletsArr) : '';
                    @endphp
                    <div class="bg-white rounded-2xl border border-gray-100 p-5 shadow-sm space-y-4 project-card" data-project-id="project-{{ $project->id }}">
                        <div class="flex items-center justify-between pb-3 border-b border-gray-100">
                            <div class="flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-green-500"></span>
                                <span class="font-bold text-sm text-gray-900 uppercase">Data Proyek</span>
                            </div>
                            <button type="button" class="btn-delete-project text-xs text-red-500 hover:text-red-600 font-medium">Hapus Data</button>
                        </div>
                        
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-[10px] font-semibold text-gray-500 mb-1">Judul Proyek (title)</label>
                                <input type="text" name="projects[{{ $project->id }}][title]" data-project-target="title" class="project-input w-full bg-gray-50/60 border border-gray-200 rounded-xl px-3 py-2 text-xs text-gray-800 focus:outline-none focus:border-green-500 focus:bg-white transition-all" value="{{ $project->title }}" placeholder="Contoh: Web Resmi Perusahaan">
                            </div>
                            <div>
                                <label class="block text-[10px] font-semibold text-gray-500 mb-1">Kategori Proyek (category)</label>
                                <input type="text" name="projects[{{ $project->id }}][category]" data-project-target="category" class="project-input w-full bg-gray-50/60 border border-gray-200 rounded-xl px-3 py-2 text-xs text-gray-800 focus:outline-none focus:border-green-500 focus:bg-white transition-all" value="{{ $project->category }}" placeholder="Contoh: Company Profile">
                            </div>
                            <div>
                                <label class="block text-[10px] font-semibold text-gray-500 mb-1">Sub-Judul / Klien (subtitle)</label>
                                <input type="text" name="projects[{{ $project->id }}][subtitle]" data-project-target="subtitle" class="project-input w-full bg-gray-50/60 border border-gray-200 rounded-xl px-3 py-2 text-xs text-gray-800 focus:outline-none focus:border-green-500 focus:bg-white transition-all" value="{{ $project->subtitle }}" placeholder="Contoh: PT Redision Teknologi Indonesia">
                            </div>
                            <div>
                                <label class="block text-[10px] font-semibold text-gray-500 mb-1">Tahun (year)</label>
                                <input type="number" min="1900" max="2099" name="projects[{{ $project->id }}][year]" data-project-target="year" class="project-input w-full bg-gray-50/60 border border-gray-200 rounded-xl px-3 py-2 text-xs text-gray-800 focus:outline-none focus:border-green-500 focus:bg-white transition-all" value="{{ $project->year }}" placeholder="2024">
                            </div>
                            <div>
                                <label class="block text-[10px] font-semibold text-gray-500 mb-1">Tech Stack (tech_stack)</label>
                                <input type="text" name="projects[{{ $project->id }}][tech_stack]" data-project-target="tech" class="project-input w-full bg-gray-50/60 border border-gray-200 rounded-xl px-3 py-2 text-xs text-gray-800 focus:outline-none focus:border-green-500 focus:bg-white transition-all" value="{{ $project->tech_stack }}" placeholder="Contoh: Laravel / Tailwind">
                            </div>
                            <div>
                                <label class="block text-[10px] font-semibold text-gray-500 mb-1">URL / Link Proyek (project_url)</label>
                                <input type="text" name="projects[{{ $project->id }}][project_url]" data-project-target="url" class="project-input w-full bg-gray-50/60 border border-gray-200 rounded-xl px-3 py-2 text-xs text-gray-800 focus:outline-none focus:border-green-500 focus:bg-white transition-all" value="{{ $project->project_url }}" placeholder="https://... atau #">
                            </div>
                            <div class="sm:col-span-2">
                                <label class="block text-[10px] font-semibold text-gray-500 mb-1">Urutan Tampil (sort_order)</label>
                                <input type="number" name="projects[{{ $project->id }}][sort_order]" data-project-target="sort_order" class="project-input w-full bg-gray-50/60 border border-gray-200 rounded-xl px-3 py-2 text-xs text-gray-800 focus:outline-none focus:border-green-500 focus:bg-white transition-all" value="{{ $project->sort_order ?? 0 }}" placeholder="0">
                            </div>
                            <div class="sm:col-span-2">
                                <label class="block text-[10px] font-semibold text-gray-500 mb-1">Poin Deskripsi / Fitur Utama (bullet_points - Pisahkan dengan Enter)</label>
                                <textarea name="projects[{{ $project->id }}][bullet_points]" data-project-target="bullets" rows="3" class="project-input w-full bg-gray-50/60 border border-gray-200 rounded-xl px-3 py-2 text-xs text-gray-800 focus:outline-none focus:border-green-500 focus:bg-white transition-all resize-none" placeholder="Tulis fitur atau pencapaian proyek di sini (Pisahkan dengan Enter)...">{{ $bulletsText }}</textarea>
                            </div>
                        </div>
                    </div>
                    @empty
                    <p class="text-xs text-gray-400 font-mono" id="empty-project-msg">Belum ada proyek yang ditambahkan.</p>
                    @endforelse
                </div>

                <div id="submit-project-btn-container" class="pt-2 flex justify-end">
                    <button type="submit" class="w-full sm:w-auto px-6 py-2.5 rounded-xl bg-green-600 hover:bg-green-700 text-white font-semibold text-xs transition-all shadow-sm flex items-center justify-center gap-2">
                        <span>Simpan Proyek</span>
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
                    Preview Proyek
                </span>
                <span class="text-[10px] bg-gray-200/60 text-gray-600 px-2 py-0.5 rounded font-mono">Realtime</span>
            </div>

            <div class="space-y-4" id="project-preview-container">
                @forelse($projects ?? [] as $project)
                @php
                    $bulletsArr = is_array($project->bullet_points) ? $project->bullet_points : json_decode($project->bullet_points, true);
                @endphp
                <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm space-y-4 preview-project-card" id="preview-project-{{ $project->id }}">
                    <div class="flex flex-col gap-1">
                        <div class="flex items-center justify-between gap-2">
                            <span class="text-[10px] font-bold text-green-600 uppercase tracking-wider preview-category">{{ $project->category }}</span>
                            <span class="px-2.5 py-0.5 rounded-full bg-green-100 text-green-700 text-[10px] font-mono font-semibold preview-year">{{ $project->year }}</span>
                        </div>
                        <h4 class="text-base font-bold text-gray-900 preview-title">{{ $project->title }}</h4>
                        <p class="text-xs font-semibold text-gray-400 preview-subtitle">{{ $project->subtitle }}</p>
                    </div>

                    <ul class="text-xs text-gray-600 space-y-1.5 pt-2 border-t border-gray-100 preview-bullets">
                        @if(is_array($bulletsArr))
                            @foreach($bulletsArr as $bullet)
                            <li class="relative pl-3 before:content-[''] before:absolute before:left-0 before:top-1.5 before:w-1 before:h-1 before:bg-green-500 before:rounded-full">{{ $bullet }}</li>
                            @endforeach
                        @endif
                    </ul>

                    <div class="pt-3 border-t border-gray-100 flex items-center justify-between">
                        <span class="text-[10px] font-mono text-gray-400 preview-tech">{{ $project->tech_stack }}</span>
                        <a href="{{ $project->project_url ?? '#' }}" target="_blank" class="text-[10px] font-mono font-bold text-green-600 hover:text-green-700 flex items-center gap-1 preview-link">
                            <span>VIEW PROJECT</span>
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                        </a>
                    </div>
                </div>
                @empty
                <p class="text-xs text-gray-400 font-mono" id="empty-project-preview-msg">Preview kartu proyek akan muncul di sini.</p>
                @endforelse
            </div>
        </div>
    </div>
</section>

<!-- JavaScript Khusus Projects -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const projectListContainer = document.getElementById('project-list-container');
        const projectPreviewContainer = document.getElementById('project-preview-container');
        const btnAddProject = document.getElementById('btn-add-project');

        if (btnAddProject) {
            btnAddProject.addEventListener('click', () => {
                const emptyMsg = document.getElementById('empty-project-msg');
                const emptyPreviewMsg = document.getElementById('empty-project-preview-msg');
                if (emptyMsg) emptyMsg.remove();
                if (emptyPreviewMsg) emptyPreviewMsg.remove();
                
                const timestamp = Date.now();
                const projectId = 'project-' + timestamp;
                
                const formHTML = `
                    <div class="bg-white rounded-2xl border border-gray-100 p-5 shadow-sm space-y-4 project-card" data-project-id="${projectId}">
                        <div class="flex items-center justify-between pb-3 border-b border-gray-100">
                            <div class="flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-green-500"></span>
                                <span class="font-bold text-sm text-gray-900 uppercase">Data Proyek Baru</span>
                            </div>
                            <button type="button" class="btn-delete-project text-xs text-red-500 hover:text-red-600 font-medium">Hapus Data</button>
                        </div>
                        
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-[10px] font-semibold text-gray-500 mb-1">Judul Proyek (title)</label>
                                <input type="text" name="projects[new_${timestamp}][title]" data-project-target="title" class="project-input w-full bg-gray-50/60 border border-gray-200 rounded-xl px-3 py-2 text-xs text-gray-800 focus:outline-none focus:border-green-500 focus:bg-white transition-all" placeholder="Contoh: Web Resmi Perusahaan">
                            </div>
                            <div>
                                <label class="block text-[10px] font-semibold text-gray-500 mb-1">Kategori Proyek (category)</label>
                                <input type="text" name="projects[new_${timestamp}][category]" data-project-target="category" class="project-input w-full bg-gray-50/60 border border-gray-200 rounded-xl px-3 py-2 text-xs text-gray-800 focus:outline-none focus:border-green-500 focus:bg-white transition-all" placeholder="Contoh: Company Profile">
                            </div>
                            <div>
                                <label class="block text-[10px] font-semibold text-gray-500 mb-1">Sub-Judul / Klien (subtitle)</label>
                                <input type="text" name="projects[new_${timestamp}][subtitle]" data-project-target="subtitle" class="project-input w-full bg-gray-50/60 border border-gray-200 rounded-xl px-3 py-2 text-xs text-gray-800 focus:outline-none focus:border-green-500 focus:bg-white transition-all" placeholder="Contoh: PT Redision Teknologi Indonesia">
                            </div>
                            <div>
                                <label class="block text-[10px] font-semibold text-gray-500 mb-1">Tahun (year)</label>
                                <input type="number" min="1900" max="2099" name="projects[new_${timestamp}][year]" data-project-target="year" class="project-input w-full bg-gray-50/60 border border-gray-200 rounded-xl px-3 py-2 text-xs text-gray-800 focus:outline-none focus:border-green-500 focus:bg-white transition-all" placeholder="2024">
                            </div>
                            <div>
                                <label class="block text-[10px] font-semibold text-gray-500 mb-1">Tech Stack (tech_stack)</label>
                                <input type="text" name="projects[new_${timestamp}][tech_stack]" data-project-target="tech" class="project-input w-full bg-gray-50/60 border border-gray-200 rounded-xl px-3 py-2 text-xs text-gray-800 focus:outline-none focus:border-green-500 focus:bg-white transition-all" placeholder="Contoh: Laravel / Tailwind">
                            </div>
                            <div>
                                <label class="block text-[10px] font-semibold text-gray-500 mb-1">URL / Link Proyek (project_url)</label>
                                <input type="text" name="projects[new_${timestamp}][project_url]" data-project-target="url" class="project-input w-full bg-gray-50/60 border border-gray-200 rounded-xl px-3 py-2 text-xs text-gray-800 focus:outline-none focus:border-green-500 focus:bg-white transition-all" placeholder="https://... atau #">
                            </div>
                            <div class="sm:col-span-2">
                                <label class="block text-[10px] font-semibold text-gray-500 mb-1">Urutan Tampil (sort_order)</label>
                                <input type="number" name="projects[new_${timestamp}][sort_order]" data-project-target="sort_order" class="project-input w-full bg-gray-50/60 border border-gray-200 rounded-xl px-3 py-2 text-xs text-gray-800 focus:outline-none focus:border-green-500 focus:bg-white transition-all" placeholder="0">
                            </div>
                            <div class="sm:col-span-2">
                                <label class="block text-[10px] font-semibold text-gray-500 mb-1">Poin Deskripsi / Fitur Utama (bullet_points - Pisahkan dengan Enter)</label>
                                <textarea name="projects[new_${timestamp}][bullet_points]" data-project-target="bullets" rows="3" class="project-input w-full bg-gray-50/60 border border-gray-200 rounded-xl px-3 py-2 text-xs text-gray-800 focus:outline-none focus:border-green-500 focus:bg-white transition-all resize-none" placeholder="Tulis fitur atau pencapaian proyek di sini (Pisahkan dengan Enter)..."></textarea>
                            </div>
                        </div>
                    </div>`;

                const previewHTML = `
                    <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm space-y-4 preview-project-card" id="preview-${projectId}">
                        <div class="flex flex-col gap-1">
                            <div class="flex items-center justify-between gap-2">
                                <span class="text-[10px] font-bold text-green-600 uppercase tracking-wider preview-category">COMPANY PROFILE</span>
                                <span class="px-2.5 py-0.5 rounded-full bg-green-100 text-green-700 text-[10px] font-mono font-semibold preview-year">2024</span>
                            </div>
                            <h4 class="text-base font-bold text-gray-900 preview-title">JUDUL PROYEK</h4>
                            <p class="text-xs font-semibold text-gray-400 preview-subtitle">SUB-JUDUL / KLIEN</p>
                        </div>
                        <ul class="text-xs text-gray-600 space-y-1.5 pt-2 border-t border-gray-100 preview-bullets">
                            <li class="relative pl-3 before:content-[''] before:absolute before:left-0 before:top-1.5 before:w-1 before:h-1 before:bg-green-500 before:rounded-full">Poin deskripsi proyek akan muncul di sini.</li>
                        </ul>
                        <div class="pt-3 border-t border-gray-100 flex items-center justify-between">
                            <span class="text-[10px] font-mono text-gray-400 preview-tech">Laravel / Tailwind</span>
                            <a href="#" target="_blank" class="text-[10px] font-mono font-bold text-green-600 hover:text-green-700 flex items-center gap-1 preview-link">
                                <span>VIEW PROJECT</span>
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                            </a>
                        </div>
                    </div>`;

                projectListContainer.insertAdjacentHTML('beforeend', formHTML);
                projectPreviewContainer.insertAdjacentHTML('beforeend', previewHTML);
            });
        }

        if (projectListContainer) {
            projectListContainer.addEventListener('click', (e) => {
                if (e.target.classList.contains('btn-delete-project')) {
                    const card = e.target.closest('.project-card');
                    const id = card.dataset.projectId;
                    card.remove();
                    const previewCard = document.getElementById(`preview-${id}`);
                    if (previewCard) previewCard.remove();
                }
            });

            projectListContainer.addEventListener('input', (e) => {
                if (e.target.classList.contains('project-input')) {
                    const card = e.target.closest('.project-card');
                    const id = card.dataset.projectId;
                    const targetClass = e.target.dataset.projectTarget;
                    const previewCard = document.getElementById(`preview-${id}`);
                    
                    if (!previewCard) return;

                    const val = e.target.value.trim();

                    if (targetClass === 'url') {
                        const linkElem = previewCard.querySelector('.preview-link');
                        if (linkElem) linkElem.href = val || '#';
                    } else if (targetClass === 'bullets') {
                        const previewElement = previewCard.querySelector('.preview-bullets');
                        if (previewElement) {
                            previewElement.innerHTML = '';
                            val.split('\n').forEach(line => {
                                if (line.trim() !== '') {
                                    previewElement.innerHTML += `<li class="relative pl-3 before:content-[''] before:absolute before:left-0 before:top-1.5 before:w-1 before:h-1 before:bg-green-500 before:rounded-full">${line}</li>`;
                                }
                            });
                        }
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