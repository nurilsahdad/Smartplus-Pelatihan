<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth scroll-pt-20">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Masuk - CV. SMARTPLUS INDONESIA</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
    @endif
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-[#f4f6f9] text-slate-800 antialiased selection:bg-blue-500 selection:text-white overflow-x-hidden">

    <!-- Strip gradient di belakang navbar fixed (tinggi = h-20) -->
    <div class="h-20 bg-gradient-to-r from-[#2d5bf0] to-[#2d5bf0]">
        @include('partials.navbar')
    </div>

    <main class="py-10 sm:py-12 lg:py-20 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-16 items-center">

            <!-- KIRI: Informasi Portal -->
            <div class="lg:col-span-6 space-y-4 sm:space-y-6 text-left">
                <span class="inline-block bg-[#dce4fe] text-[#3b66f5] font-semibold text-xs sm:text-sm px-4 py-1.5 rounded-full">
                    PORTAL MASUK
                </span>

                <h1 class="text-2xl sm:text-4xl lg:text-5xl font-extrabold text-slate-900 tracking-tight leading-tight">
                    Selamat Datang Kembali di <span class="text-[#3cb759]">Smartplus Learning</span>
                </h1>

                <p class="text-slate-600 text-sm sm:text-lg leading-relaxed">
                    Akses dashboard pelatihan Anda untuk mengunduh modul, melihat progres sertifikasi, dan berinteraksi dengan mentor IoT & AI kami.
                </p>

                <div class="space-y-4 sm:space-y-6 pt-2 sm:pt-4">
                    <div class="flex items-start gap-3 sm:gap-4">
                        <div class="w-10 h-10 sm:w-11 sm:h-11 rounded-full bg-blue-50 text-[#3b66f5] border border-blue-100 flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-slate-900 text-sm sm:text-base">Materi & Modul Eksklusif</h3>
                            <p class="text-slate-500 text-xs sm:text-sm leading-relaxed mt-0.5">Dapatkan akses penuh ke materi pembelajaran terkini dan file tugas praktikum.</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3 sm:gap-4">
                        <div class="w-10 h-10 sm:w-11 sm:h-11 rounded-full bg-blue-50 text-[#3b66f5] border border-blue-100 flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-slate-900 text-sm sm:text-base">Sertifikat Digital Valid</h3>
                            <p class="text-slate-500 text-xs sm:text-sm leading-relaxed mt-0.5">Pantau status verifikasi sertifikat dan unduh sertifikat resmi setelah kelulusan.</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3 sm:gap-4">
                        <div class="w-10 h-10 sm:w-11 sm:h-11 rounded-full bg-blue-50 text-[#3b66f5] border border-blue-100 flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-slate-900 text-sm sm:text-base">Komunitas & Diskusi Mentor</h3>
                            <p class="text-slate-500 text-xs sm:text-sm leading-relaxed mt-0.5">Gabung dalam ruang diskusi bersama peserta lain dan dapatkan bimbingan langsung.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- KANAN: Form Login -->
            <div class="lg:col-span-6 flex justify-center lg:justify-end">
                <div class="bg-white rounded-3xl p-6 sm:p-9 shadow-xl border border-slate-100 w-full max-w-lg">
                    <div class="mb-6">
                        <h2 class="text-xl sm:text-2xl font-extrabold text-slate-900">Masuk Akun</h2>
                        <p class="text-slate-500 text-xs sm:text-sm mt-1">Masukkan email dan kata sandi Anda untuk melanjutkan.</p>
                    </div>

                    <form id="loginForm" action="{{ route('login') }}" method="POST" class="space-y-4">
                        @csrf

                        @if(session('success'))
                            <div class="p-3.5 bg-emerald-50 text-emerald-700 text-sm rounded-xl border border-emerald-200 font-medium">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div>
                            <label for="email" class="block text-xs sm:text-sm font-semibold text-slate-700 mb-1.5">Alamat Email</label>
                            <input type="email" id="email" name="email" required placeholder="nama@email.com" value="{{ old('email') }}"
                                   class="w-full px-4 py-3 rounded-xl border @error('email') border-red-400 @else border-slate-200 @enderror text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-[#3b66f5]/40 focus:border-[#3b66f5]">
                            @error('email')
                                <p class="text-xs text-red-500 font-medium mt-1">{{ $message }}</p>
                            @enderror
                            <p class="error text-xs text-red-500 font-medium mt-1 hidden"></p>
                        </div>

                        <div>
                            <label for="password" class="block text-xs sm:text-sm font-semibold text-slate-700 mb-1.5">Password</label>
                            <div class="relative">
                                <input type="password" id="password" name="password" required placeholder="Masukkan password Anda"
                                       class="w-full px-4 py-3 pr-11 rounded-xl border @error('password') border-red-400 @else border-slate-200 @enderror text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-[#3b66f5]/40 focus:border-[#3b66f5]">
                                <button type="button" id="togglePassword" class="absolute right-3.5 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600 focus:outline-none">
                                    <svg id="eyeIcon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                </button>
                            </div>
                            @error('password')
                                <p class="text-xs text-red-500 font-medium mt-1">{{ $message }}</p>
                            @enderror
                            <p class="error text-xs text-red-500 font-medium mt-1 hidden"></p>
                        </div>

                        <div class="flex items-center justify-between pt-1">
                            <label class="flex items-center space-x-2 cursor-pointer">
                                <input type="checkbox" name="remember" class="w-4 h-4 text-[#3b66f5] rounded border-slate-300 focus:ring-[#3b66f5]">
                                <span class="text-xs sm:text-sm text-slate-600">Ingat saya</span>
                            </label>
                            <a href="{{ route('password.request') }}" class="text-xs sm:text-sm text-[#3b66f5] hover:underline font-semibold">Lupa Password?</a>
                        </div>

                        <button type="submit"
                                class="w-full bg-[#3cb759] hover:bg-[#329d4c] text-white font-bold py-3.5 rounded-xl shadow-lg shadow-green-500/20 transition-all duration-200 hover:-translate-y-0.5 text-sm sm:text-base">
                            Masuk Sekarang
                        </button>

                        <p class="text-center text-xs sm:text-sm text-slate-500 pt-2">
                            Belum punya akun?
                            <a href="{{ route('register') }}" class="text-[#3b66f5] hover:underline font-semibold">Daftar sekarang</a>
                        </p>
                    </form>

                </div>
            </div>

        </div>
    </main>

    <!-- FOOTER -->
    @include('partials.footer')

    <!-- Script Validasi & Interactive UI (Frontend Only) -->
    <script>
        const form = document.getElementById('loginForm');
        const passwordInput = document.getElementById('password');
        const togglePassword = document.getElementById('togglePassword');

        // Toggle visibility password
        if (togglePassword && passwordInput) {
            togglePassword.addEventListener('click', () => {
                const isPassword = passwordInput.type === 'password';
                passwordInput.type = isPassword ? 'text' : 'password';
            });
        }

        function setError(input, message) {
            const p = input.parentElement.parentElement.querySelector('.error') || input.parentElement.querySelector('.error');
            if (p) {
                p.textContent = message;
                p.classList.toggle('hidden', !message);
            }
            input.classList.toggle('border-red-400', !!message);
            input.classList.toggle('border-slate-200', !message);
        }

        if (form) {
            form.addEventListener('submit', (e) => {
                const f = form.elements;
                let ok = true;
                const check = (input, cond, msg) => {
                    setError(input, cond ? '' : msg);
                    if (!cond) ok = false;
                };

                check(f.email, /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(f.email.value), 'Format email tidak valid.');
                check(f.password, f.password.value.length >= 1, 'Password tidak boleh kosong.');

                if (!ok) {
                    e.preventDefault();
                }
            });
        }
    </script>

</body>
</html>
