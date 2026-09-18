<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin | Portofolio</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-800 antialiased min-h-screen flex items-center justify-center p-4 relative overflow-hidden">

    <!-- Background Glow Decorative -->
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] bg-gradient-to-tr from-green-100/60 to-emerald-100/40 rounded-full blur-3xl -z-10 pointer-events-none"></div>

    <div class="w-full max-w-md">
        
        <!-- Header / Logo -->
        <div class="text-center mb-8">
            <span class="text-xs font-mono font-bold tracking-widest text-green-600 uppercase bg-green-100/80 px-3 py-1 rounded-md border border-green-200/50">
                ADMIN ACCESS
            </span>
            <h1 class="text-2xl font-extrabold text-gray-900 mt-3">Masuk ke Dashboard</h1>
            <p class="text-xs text-gray-500 font-mono mt-1">Silakan masukkan kredensial akun milikmu</p>
        </div>

        <!-- Card Form Login -->
        <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-xl shadow-gray-100/80">
            
            <!-- Alert Session Status / Error -->
            @if(session('error'))
                <div class="mb-6 p-4 rounded-2xl bg-red-50 border border-red-100 text-red-600 text-xs font-mono flex items-center gap-2">
                    <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span>{{ session('error') }}</span>
                </div>
            @endif

            @if($errors->any())
                <div class="mb-6 p-4 rounded-2xl bg-red-50 border border-red-100 text-red-600 text-xs font-mono space-y-1">
                    @foreach($errors->all() as $error)
                        <p class="flex items-center gap-2">
                            <span class="font-bold">•</span>
                            <span>{{ $error }}</span>
                        </p>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('login.perform') }}" method="POST" class="space-y-6 font-mono">
                @csrf

                <!-- Input Email -->
                <div>
                    <label for="email" class="block text-xs text-green-600 mb-2 font-bold uppercase tracking-wider">EMAIL_ADDRESS</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus placeholder="sh4k4175@gmail.com" class="w-full bg-gray-50/50 border border-gray-200 rounded-2xl px-4 py-3 text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500 transition-all shadow-sm">
                </div>

                <!-- Input Password -->
                <div>
                    <label for="password" class="block text-xs text-green-600 mb-2 font-bold uppercase tracking-wider">PASSWORD</label>
                    <input type="password" id="password" name="password" required placeholder="••••••••" class="w-full bg-gray-50/50 border border-gray-200 rounded-2xl px-4 py-3 text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500 transition-all shadow-sm">
                </div>

                <!-- Remember Me Checkbox -->
                <div class="flex items-center justify-between text-xs">
                    <label class="flex items-center gap-2 text-gray-500 cursor-pointer">
                        <input type="checkbox" name="remember" class="rounded border-gray-300 text-green-600 focus:ring-green-500">
                        <span>Ingat Saya</span>
                    </label>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full py-3.5 rounded-2xl bg-green-500 hover:bg-green-600 text-white font-bold text-sm tracking-wider uppercase transition-all shadow-lg shadow-green-500/20 hover:shadow-green-500/40 flex items-center justify-center gap-2 group">
                    <span>AUTHENTICATE</span>
                    <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </button>
            </form>
        </div>

        <!-- Back to Website Link -->
        <div class="text-center mt-6">
            <a href="{{ route('portfolio.index') }}" class="text-xs font-mono text-gray-400 hover:text-green-600 transition-colors inline-flex items-center gap-1">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                <span>Kembali ke Halaman Utama</span>
            </a>
        </div>

    </div>

</body>
</html>