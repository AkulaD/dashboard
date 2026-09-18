<!-- Section Pesan Masuk (07_MESSAGES) -->
<section id="messages-section" class="space-y-6 pt-10 border-t border-gray-200/60">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between pb-3 border-b border-gray-200/60 gap-2">
        <div>
            <h3 class="text-xl font-bold text-gray-900">Pesan Masuk (Messages)</h3>
            <p class="text-xs text-gray-500 mt-0.5">Daftar pesan dan formulir kontak yang dikirim oleh pengunjung web.</p>
        </div>
        
        <span class="px-3 py-1 rounded-full bg-green-50 text-green-700 text-xs font-mono font-bold border border-green-200/60 w-fit">
            Total: {{ count($messages ?? []) }} Pesan
        </span>
    </div>

    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
        <div class="divide-y divide-gray-100">
            @forelse($messages ?? [] as $msg)
            <div class="p-5 hover:bg-gray-50/50 transition-colors space-y-3">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2">
                    <div class="flex items-center gap-2.5">
                        <span class="w-2.5 h-2.5 rounded-full {{ $msg->is_read ? 'bg-gray-300' : 'bg-green-500 animate-pulse' }}"></span>
                        <h4 class="text-sm font-bold text-gray-900">{{ $msg->name }}</h4>
                        <a href="mailto:{{ $msg->email }}" class="text-xs text-gray-400 hover:text-green-600 font-mono transition-colors">&lt;{{ $msg->email }}&gt;</a>
                    </div>
                    
                    <div class="flex items-center gap-3">
                        <span class="text-[10px] font-mono text-gray-400">{{ $msg->created_at ? $msg->created_at->diffForHumans() : '-' }}</span>
                        <button type="button" class="text-xs text-red-500 hover:text-red-600 font-medium">Hapus</button>
                    </div>
                </div>

                <div class="bg-gray-50/70 p-3.5 rounded-xl border border-gray-100/80 text-xs text-gray-700 leading-relaxed font-sans">
                    {{ $msg->message }}
                </div>
            </div>
            @empty
            <div class="p-8 text-center space-y-2">
                <div class="w-10 h-10 rounded-full bg-gray-50 text-gray-400 flex items-center justify-center mx-auto">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2h14a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                </div>
                <p class="text-xs text-gray-400 font-mono">Belum ada pesan masuk dari pengunjung.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>