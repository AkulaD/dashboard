<!-- Section Keahlian (02_SKILLS) -->
<section id="skills-section" class="space-y-6 pt-6">
    
    <!-- Judul Bagian & Tombol Tambah Kategori -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between pb-3 border-b border-gray-200/60 gap-2">
        <div>
            <h3 class="text-xl font-bold text-gray-900">Pengaturan Keahlian (Skills)</h3>
            <p class="text-xs text-gray-500 mt-0.5">Kelola kategori teknologi, nama skill, dan tingkat penguasaan.</p>
        </div>
        
        <button type="button" id="btn-add-category" class="px-4 py-2 rounded-xl bg-gray-100 hover:bg-gray-200 text-gray-700 text-xs font-semibold transition-all flex items-center justify-center gap-1.5 border border-gray-200/80">
            <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            <span>Tambah Kategori</span>
        </button>
    </div>

    <!-- Layout 2 Kolom -->
    <div class="grid grid-cols-1 xl:grid-cols-12 gap-8 items-start">
        
        <!-- Kolom Kiri: Form Input -->
        <div class="xl:col-span-7 space-y-6">
            <form action="#" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                @forelse($skills as $category =>$items)
                <div class="bg-white rounded-2xl border border-gray-100 p-5 shadow-sm space-y-4 category-card" data-category-id="cat-{{ $loop->index }}">
                    
                    <!-- Header Kategori -->
                    <div class="flex items-center justify-between pb-3 border-b border-gray-100">
                        <div class="flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-green-500"></span>
                            <span class="text-xs font-semibold text-gray-400">KATEGORI (category):</span>
                            <input type="text"
                                class="category-name-input font-bold text-sm text-gray-900 uppercase bg-transparent border-b border-transparent hover:border-gray-300 focus:border-green-500 focus:outline-none transition-all px-1 py-0.5" 
                                value="{{ $category }}">
                        </div>
                        <button type="button" class="btn-delete-category text-xs text-red-500 hover:text-red-600 font-medium">
                            Hapus Kategori
                        </button>
                    </div>

                    <!-- Tabel Input Skill -->
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="text-[11px] font-semibold text-gray-400 uppercase border-b border-gray-100">
                                    <th class="pb-2 pl-1 w-5/12">Nama Skill (skill_name)</th>
                                    <th class="pb-2 px-1 w-2/12">Urutan (sort_order)</th>
                                    <th class="pb-2 pr-1 w-5/12 text-right">Tingkat / Percentage (%)</th>
                                </tr>
                            </thead>
                            <tbody class="skill-items-tbody divide-y divide-gray-50">
                                @foreach($items as $skill)
                                <tr class="skill-row" data-skill-id="{{ $skill->id }}">
                                    <!-- Tersembunyi untuk kategori agar konsisten per baris -->
                                    <input type="hidden" name="skills[{{ $skill->id }}][category]" class="hidden-category-input" value="{{ $category }}">

                                    <td class="py-2.5 pr-2">
                                        <input type="text"
                                            name="skills[{{ $skill->id }}][skill_name]"
                                            data-skill-id="{{ $skill->id }}"
                                            class="skill-name-input w-full bg-gray-50/60 border border-gray-200 rounded-xl px-3 py-1.5 text-xs text-gray-800 focus:outline-none focus:border-green-500 focus:bg-white transition-all" 
                                            value="{{ $skill->skill_name }}">
                                    </td>
                                    <td class="py-2.5 px-1">
                                        <input type="number"
                                            name="skills[{{ $skill->id }}][sort_order]"
                                            class="w-full bg-gray-50/60 border border-gray-200 rounded-xl px-2 py-1.5 text-xs text-gray-800 text-center focus:outline-none focus:border-green-500 focus:bg-white transition-all" 
                                            value="{{ $skill->sort_order ?? 0 }}">
                                    </td>
                                    <td class="py-2.5 pl-2">
                                        <div class="flex items-center gap-2 justify-end">
                                            <input type="range"
                                                min="0" max="100"
                                                name="skills[{{ $skill->id }}][percentage]"
                                                data-skill-id="{{ $skill->id }}"
                                                class="skill-percent-input w-24 sm:w-28 accent-green-600 cursor-pointer"
                                                value="{{ $skill->percentage }}">
                                            <span class="text-xs font-bold text-green-600 min-w-[32px] text-right skill-percent-label"
                                                id="percent-label-{{ $skill->id }}">
                                                {{ $skill->percentage }}%
                                            </span>
                                            <button type="button" class="btn-delete-skill-item text-red-400 hover:text-red-600 ml-1">✕</button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Tombol Tambah Item Skill -->
                    <div class="pt-2 flex justify-start">
                        <button type="button" class="btn-add-skill-item text-xs font-semibold text-green-600 hover:text-green-700 flex items-center gap-1">
                            <svg class="w-3.5 h-3.5 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                            <span class="pointer-events-none">Tambah Item Skill</span>
                        </button>
                    </div>

                </div>
                @empty
                <p class="text-xs text-gray-400 font-mono">Belum ada data keahlian.</p>
                @endforelse

                <div id="submit-btn-container" class="pt-2 flex justify-end">
                    <button type="submit" class="w-full sm:w-auto px-6 py-2.5 rounded-xl bg-green-600 hover:bg-green-700 text-white font-semibold text-xs transition-all shadow-sm flex items-center justify-center gap-2">
                        <span>Simpan Keahlian</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    </button>
                </div>
            </form>
        </div>

        <!-- Kolom Kanan: Preview -->
        <div class="xl:col-span-5 sticky top-6 space-y-3">
            <div class="flex items-center justify-between">
                <span class="text-xs font-bold text-gray-400 uppercase tracking-wider flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-green-500 animate-ping"></span>
                    Preview Keahlian
                </span>
                <span class="text-[10px] bg-gray-200/60 text-gray-600 px-2 py-0.5 rounded font-mono">Realtime</span>
            </div>

            <div class="space-y-4">
                @forelse($skills as $category =>$items)
                <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm space-y-4 preview-category-card" id="preview-card-cat-{{ $loop->index }}">
                    <div class="flex items-center gap-2">
                        <div class="p-1.5 rounded-lg bg-green-50 text-green-600">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                        </div>
                        <h4 class="text-sm font-bold text-gray-900 preview-category-title">{{ $category }}</h4>
                    </div>

                    <div class="space-y-3 preview-skills-list">
                        @foreach($items as $skill)
                        <div id="preview-skill-wrapper-{{ $skill->id }}">
                            <div class="flex justify-between text-xs font-semibold mb-1">
                                <span class="text-gray-700" id="preview-skill-name-{{ $skill->id }}">{{ $skill->skill_name }}</span>
                                <span class="text-green-600" id="preview-skill-percent-text-{{ $skill->id }}">{{ $skill->percentage }}%</span>
                            </div>
                            <div class="w-full h-2 bg-gray-100 rounded-full overflow-hidden">
                                <div class="h-full bg-green-500 rounded-full transition-all duration-150"
                                    id="preview-skill-bar-{{ $skill->id }}"
                                    style="width: {{ $skill->percentage }}%;"></div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @empty
                <div class="p-4 bg-white rounded-2xl border border-gray-100 text-xs text-gray-400">
                    Preview belum tersedia.
                </div>
                @endforelse
            </div>
        </div>

    </div>
</section>

<!-- JavaScript Khusus Skills -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const skillsFormContainer = document.querySelector('#skills-section form');
        const skillsPreviewContainer = document.querySelector('#skills-section .xl\\:col-span-5 .space-y-4');

        if (!skillsFormContainer) return;

        const addCategoryBtn = document.getElementById('btn-add-category');
        if (addCategoryBtn) {
            addCategoryBtn.addEventListener('click', () => {
                const timestamp = Date.now();
                const categoryId = 'cat-' + timestamp;
                const skillId = 'new_' + timestamp;
                
                const categoryFormHTML = `
                    <div class="bg-white rounded-2xl border border-gray-100 p-5 shadow-sm space-y-4 category-card" data-category-id="${categoryId}">
                        <div class="flex items-center justify-between pb-3 border-b border-gray-100">
                            <div class="flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-green-500"></span>
                                <span class="text-xs font-semibold text-gray-400">KATEGORI (category):</span>
                                <input type="text" class="category-name-input font-bold text-sm text-gray-900 uppercase bg-transparent border-b border-transparent hover:border-gray-300 focus:border-green-500 focus:outline-none transition-all px-1 py-0.5" value="KATEGORI BARU">
                            </div>
                            <button type="button" class="btn-delete-category text-xs text-red-500 hover:text-red-600 font-medium">Hapus Kategori</button>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse">
                                <thead>
                                    <tr class="text-[11px] font-semibold text-gray-400 uppercase border-b border-gray-100">
                                        <th class="pb-2 pl-1 w-5/12">Nama Skill (skill_name)</th>
                                        <th class="pb-2 px-1 w-2/12">Urutan (sort_order)</th>
                                        <th class="pb-2 pr-1 w-5/12 text-right">Tingkat / Percentage (%)</th>
                                    </tr>
                                </thead>
                                <tbody class="skill-items-tbody divide-y divide-gray-50">
                                    ${createSkillRowHTML(categoryId, skillId, 'Skill Baru', 80, 'KATEGORI BARU')}
                                </tbody>
                            </table>
                        </div>
                        <div class="pt-2 flex justify-start">
                            <button type="button" class="btn-add-skill-item text-xs font-semibold text-green-600 hover:text-green-700 flex items-center gap-1">
                                <svg class="w-3.5 h-3.5 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                                <span class="pointer-events-none">Tambah Item Skill</span>
                            </button>
                        </div>
                    </div>`;

                const categoryPreviewHTML = `
                    <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm space-y-4 preview-category-card" id="preview-card-${categoryId}">
                        <div class="flex items-center gap-2">
                            <div class="p-1.5 rounded-lg bg-green-50 text-green-600">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                            </div>
                            <h4 class="text-sm font-bold text-gray-900 preview-category-title">KATEGORI BARU</h4>
                        </div>
                        <div class="space-y-3 preview-skills-list">
                            ${createSkillPreviewHTML(skillId, 'Skill Baru', 80)}
                        </div>
                    </div>`;

                const submitBtnContainer = document.getElementById('submit-btn-container');
                if (submitBtnContainer) submitBtnContainer.insertAdjacentHTML('beforebegin', categoryFormHTML);
                if (skillsPreviewContainer) skillsPreviewContainer.insertAdjacentHTML('beforeend', categoryPreviewHTML);
            });
        }

        function createSkillRowHTML(categoryId, skillId, name, percent, categoryName) {
            return `
                <tr class="skill-row" data-skill-id="${skillId}">
                    <input type="hidden" name="skills[${skillId}][category]" class="hidden-category-input" value="${categoryName}">
                    <td class="py-2.5 pr-2">
                        <input type="text" name="skills[${skillId}][skill_name]" data-skill-id="${skillId}" class="skill-name-input w-full bg-gray-50/60 border border-gray-200 rounded-xl px-3 py-1.5 text-xs text-gray-800 focus:outline-none focus:border-green-500 focus:bg-white transition-all" value="${name}">
                    </td>
                    <td class="py-2.5 px-1">
                        <input type="number" name="skills[${skillId}][sort_order]" class="w-full bg-gray-50/60 border border-gray-200 rounded-xl px-2 py-1.5 text-xs text-gray-800 text-center focus:outline-none focus:border-green-500 focus:bg-white transition-all" value="0">
                    </td>
                    <td class="py-2.5 pl-2">
                        <div class="flex items-center gap-2 justify-end">
                            <input type="range" min="0" max="100" name="skills[${skillId}][percentage]" data-skill-id="${skillId}" class="skill-percent-input w-24 sm:w-28 accent-green-600 cursor-pointer" value="${percent}">
                            <span class="text-xs font-bold text-green-600 min-w-[32px] text-right skill-percent-label" id="percent-label-${skillId}">${percent}%</span>
                            <button type="button" class="btn-delete-skill-item text-red-400 hover:text-red-600 ml-1">✕</button>
                        </div>
                    </td>
                </tr>`;
        }

        function createSkillPreviewHTML(skillId, name, percent) {
            return `
                <div id="preview-skill-wrapper-${skillId}">
                    <div class="flex justify-between text-xs font-semibold mb-1">
                        <span class="text-gray-700" id="preview-skill-name-${skillId}">${name}</span>
                        <span class="text-green-600" id="preview-skill-percent-text-${skillId}">${percent}%</span>
                    </div>
                    <div class="w-full h-2 bg-gray-100 rounded-full overflow-hidden">
                        <div class="h-full bg-green-500 rounded-full transition-all duration-150" id="preview-skill-bar-${skillId}" style="width: ${percent}%;"></div>
                    </div>
                </div>`;
        }

        skillsFormContainer.addEventListener('click', (e) => {
            const btnDeleteCat = e.target.closest('.btn-delete-category');
            if (btnDeleteCat) {
                const categoryCard = btnDeleteCat.closest('.category-card');
                const categoryId = categoryCard.dataset.categoryId;
                categoryCard.remove();
                const previewCard = document.getElementById(`preview-card-${categoryId}`);
                if (previewCard) previewCard.remove();
                return;
            }

            const btnAddSkill = e.target.closest('.btn-add-skill-item');
            if (btnAddSkill) {
                const categoryCard = btnAddSkill.closest('.category-card');
                const categoryId = categoryCard.dataset.categoryId;
                const categoryNameInput = categoryCard.querySelector('.category-name-input');
                const categoryName = categoryNameInput ? categoryNameInput.value : 'KATEGORI';
                
                const tbody = categoryCard.querySelector('.skill-items-tbody');
                const previewList = document.querySelector(`#preview-card-${categoryId} .preview-skills-list`);
                const skillId = 'new_' + Date.now();

                if (tbody) tbody.insertAdjacentHTML('beforeend', createSkillRowHTML(categoryId, skillId, 'Skill Baru', 75, categoryName));
                if (previewList) previewList.insertAdjacentHTML('beforeend', createSkillPreviewHTML(skillId, 'Skill Baru', 75));
                return;
            }

            const btnDeleteSkill = e.target.closest('.btn-delete-skill-item');
            if (btnDeleteSkill) {
                const row = btnDeleteSkill.closest('.skill-row');
                const skillId = row.dataset.skillId;
                row.remove();
                const previewWrapper = document.getElementById(`preview-skill-wrapper-${skillId}`);
                if (previewWrapper) previewWrapper.remove();
            }
        });

        skillsFormContainer.addEventListener('input', (e) => {
            if (e.target.classList.contains('category-name-input')) {
                const categoryCard = e.target.closest('.category-card');
                const categoryId = categoryCard.dataset.categoryId;
                const newCatVal = e.target.value;
                
                // Update judul preview
                const previewTitle = document.querySelector(`#preview-card-${categoryId} .preview-category-title`);
                if (previewTitle) previewTitle.textContent = newCatVal.toUpperCase() || 'KATEGORI BARU';

                // Synchronize hidden category inputs
                const hiddenInputs = categoryCard.querySelectorAll('.hidden-category-input');
                hiddenInputs.forEach(input => input.value = newCatVal);
            }

            if (e.target.classList.contains('skill-name-input')) {
                const skillId = e.target.dataset.skillId;
                const previewName = document.getElementById(`preview-skill-name-${skillId}`);
                if (previewName) previewName.textContent = e.target.value.trim() || 'Nama Skill';
            }

            if (e.target.classList.contains('skill-percent-input')) {
                const skillId = e.target.dataset.skillId;
                const val = e.target.value;
                const label = document.getElementById(`percent-label-${skillId}`);
                const previewText = document.getElementById(`preview-skill-percent-text-${skillId}`);
                const previewBar = document.getElementById(`preview-skill-bar-${skillId}`);

                if (label) label.textContent = `${val}%`;
                if (previewText) previewText.textContent = `${val}%`;
                if (previewBar) previewBar.style.width = `${val}%`;
            }
        });
    });
</script>