<!-- Section Pengguna (08_USERS) -->
<section id="users-section" class="space-y-6 pt-10 border-t border-gray-200/60 pb-12">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between pb-3 border-b border-gray-200/60 gap-2">
        <div>
            <h3 class="text-xl font-bold text-gray-900">Pengaturan Pengguna (Users)</h3>
            <p class="text-xs text-gray-500 mt-0.5">Kelola akun administrator, kredensial login, dan kata sandi.</p>
        </div>
    </div>

    <div class="grid grid-cols-1 xl:grid-cols-12 gap-8 items-start">
        <div class="xl:col-span-12 space-y-6">
            @foreach($users ?? [] as $user)
            <form action="#" method="POST" class="bg-white rounded-2xl border border-gray-100 p-6 shadow-sm space-y-6">
                @csrf
                @method('PUT')

                <div class="flex items-center justify-between pb-3 border-b border-gray-100">
                    <div class="flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-green-500"></span>
                        <span class="font-bold text-sm text-gray-900 uppercase">Akun Admin Aktif</span>
                    </div>
                    <span class="text-[10px] font-mono text-gray-400">ID: #{{ $user->id }}</span>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-[10px] font-semibold text-gray-500 mb-1">Nama Lengkap (name)</label>
                        <input type="text" name="name" class="w-full bg-gray-50/60 border border-gray-200 rounded-xl px-3.5 py-2.5 text-xs text-gray-800 focus:outline-none focus:border-green-500 focus:bg-white transition-all" value="{{ $user->name }}" placeholder="Shaka Banuasta">
                    </div>

                    <div>
                        <label class="block text-[10px] font-semibold text-gray-500 mb-1">Alamat Email Login (email)</label>
                        <input type="email" name="email" class="w-full bg-gray-50/60 border border-gray-200 rounded-xl px-3.5 py-2.5 text-xs text-gray-800 focus:outline-none focus:border-green-500 focus:bg-white transition-all" value="{{ $user->email }}" placeholder="sh4k4175@gmail.com">
                    </div>

                    <div>
                        <label class="block text-[10px] font-semibold text-gray-500 mb-1">Password Baru (password)</label>
                        <input type="password" name="password" class="w-full bg-gray-50/60 border border-gray-200 rounded-xl px-3.5 py-2.5 text-xs text-gray-800 focus:outline-none focus:border-green-500 focus:bg-white transition-all" placeholder="Kosongkan jika tidak ingin mengubah password">
                    </div>

                    <div>
                        <label class="block text-[10px] font-semibold text-gray-500 mb-1">Konfirmasi Password Baru</label>
                        <input type="password" name="password_confirmation" class="w-full bg-gray-50/60 border border-gray-200 rounded-xl px-3.5 py-2.5 text-xs text-gray-800 focus:outline-none focus:border-green-500 focus:bg-white transition-all" placeholder="Ulangi password baru">
                    </div>
                </div>

                <div class="pt-2 flex justify-end">
                    <button type="submit" class="w-full sm:w-auto px-6 py-2.5 rounded-xl bg-green-600 hover:bg-green-700 text-white font-semibold text-xs transition-all shadow-sm flex items-center justify-center gap-2">
                        <span>Perbarui Profil & Akun</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    </button>
                </div>
            </form>
            @endforeach
        </div>
    </div>
</section>