<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth scroll-pt-20">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Pelatihan - CV. SMARTPLUS INDONESIA</title>

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

            <!-- KIRI: Informasi -->
            <div class="lg:col-span-6 space-y-4 sm:space-y-6 text-left">
                <span class="inline-block bg-[#dce4fe] text-[#3b66f5] font-semibold text-xs sm:text-sm px-4 py-1.5 rounded-full">
                    FORMULIR PENDAFTARAN
                </span>

                <h1 class="text-2xl sm:text-4xl lg:text-5xl font-extrabold text-slate-900 tracking-tight leading-tight">
                    Daftar untuk mengikuti pelatihan <span class="text-[#3cb759]">IoT & AI</span> bersama kami.
                </h1>

                <p class="text-slate-600 text-sm sm:text-lg leading-relaxed">
                    Langkah awal untuk menguasai kompetensi teknologi masa depan. Silakan isi data diri Anda dengan lengkap untuk memulai perjalanan sertifikasi Anda.
                </p>

                <div class="space-y-4 sm:space-y-6 pt-2 sm:pt-4">
                    <div class="flex items-start gap-3 sm:gap-4">
                        <div class="w-10 h-10 sm:w-11 sm:h-11 rounded-full bg-emerald-50 text-emerald-600 border border-emerald-100 flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0112 20.055a11.952 11.952 0 01-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-slate-900 text-sm sm:text-base">Instruktur Berpengalaman</h3>
                            <p class="text-slate-500 text-xs sm:text-sm leading-relaxed mt-0.5">Belajar langsung dari para praktisi ahli industri dan akademisi berpengalaman.</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3 sm:gap-4">
                        <div class="w-10 h-10 sm:w-11 sm:h-11 rounded-full bg-emerald-50 text-emerald-600 border border-emerald-100 flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-slate-900 text-sm sm:text-base">Kurikulum Praktis & Terkini</h3>
                            <p class="text-slate-500 text-xs sm:text-sm leading-relaxed mt-0.5">Materi yang selalu up-to-date dengan kebutuhan industri masa kini disertai modul interaktif.</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3 sm:gap-4">
                        <div class="w-10 h-10 sm:w-11 sm:h-11 rounded-full bg-emerald-50 text-emerald-600 border border-emerald-100 flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-slate-900 text-sm sm:text-base">Sertifikat Resmi</h3>
                            <p class="text-slate-500 text-xs sm:text-sm leading-relaxed mt-0.5">Dapatkan sertifikat kompetensi resmi setelah sukses menyelesaikan program pelatihan.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- KANAN: Form / Success Card -->
            <div class="lg:col-span-6 flex justify-center lg:justify-end">
                <div class="bg-white rounded-3xl p-6 sm:p-9 shadow-xl border border-slate-100 w-full max-w-lg">
                    @if(session('success'))
                        <!-- Tampilan Pendaftaran Berhasil -->
                        <div class="py-6 sm:py-8 px-2 sm:px-4 text-center space-y-4 sm:space-y-6">
                            <!-- Circle Check Icon -->
                            <div class="w-20 h-20 sm:w-24 sm:h-24 mx-auto rounded-full bg-[#768ee8] flex items-center justify-center shadow-lg shadow-blue-500/25 ring-8 ring-blue-50/80">
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round" class="w-10 h-10 sm:w-12 sm:h-12 text-white block">
                                    <path d="M20 6L9 17l-5-5"></path>
                                </svg>
                            </div>

                            <!-- Text Content -->
                            <div class="space-y-2 pt-2">
                                <h2 class="text-xl sm:text-2xl font-extrabold text-[#2d3748] tracking-tight">
                                    Selamat! Pendaftaran Anda Berhasil
                                </h2>
                                <p class="text-slate-500 text-xs sm:text-sm leading-relaxed max-w-sm mx-auto">
                                    Harap masuk kembali menggunakan akun Anda untuk melanjutkan.
                                </p>
                            </div>

                            <!-- Action Button -->
                            <div class="pt-2 sm:pt-4">
                                <a href="{{ route('login') }}"
                                   class="inline-block w-full sm:w-auto px-8 py-3.5 bg-[#2d5bf0] hover:bg-[#234bd4] text-white font-bold text-sm sm:text-base rounded-2xl shadow-lg shadow-blue-500/25 transition-all duration-200 hover:-translate-y-0.5">
                                    Kembali ke Halaman Masuk
                                </a>
                            </div>
                        </div>
                    @else
                        <h2 class="text-xl sm:text-2xl font-extrabold text-slate-900 mb-6">Daftar</h2>

                        <form id="registerForm" action="{{ route('register') }}" method="POST" class="space-y-4">
                            @csrf

                            <div>
                                <label for="name" class="block text-xs sm:text-sm font-semibold text-slate-700 mb-1.5">Nama Lengkap</label>
                                <input type="text" id="name" name="name" required placeholder="Masukkan nama lengkap Anda" value="{{ old('name') }}"
                                       class="w-full px-4 py-3 rounded-xl border @error('name') border-red-400 @else border-slate-200 @enderror text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-[#3b66f5]/40 focus:border-[#3b66f5]">
                                @error('name')
                                    <p class="text-xs text-red-500 font-medium mt-1">{{ $message }}</p>
                                @enderror
                                <p class="error text-xs text-red-500 font-medium mt-1 hidden"></p>
                            </div>

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
                                <label for="phone" class="block text-xs sm:text-sm font-semibold text-slate-700 mb-1.5">Nomor Telepon / WhatsApp</label>
                                <input type="tel" id="phone" name="phone" required placeholder="Contoh: 08123456789" value="{{ old('phone') }}"
                                       class="w-full px-4 py-3 rounded-xl border @error('phone') border-red-400 @else border-slate-200 @enderror text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-[#3b66f5]/40 focus:border-[#3b66f5]">
                                @error('phone')
                                    <p class="text-xs text-red-500 font-medium mt-1">{{ $message }}</p>
                                @enderror
                                <p class="error text-xs text-red-500 font-medium mt-1 hidden"></p>
                            </div>

                            <div>
                                <label for="password" class="block text-xs sm:text-sm font-semibold text-slate-700 mb-1.5">Password</label>
                                <input type="password" id="password" name="password" required placeholder="Minimal 8 karakter"
                                       class="w-full px-4 py-3 rounded-xl border @error('password') border-red-400 @else border-slate-200 @enderror text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-[#3b66f5]/40 focus:border-[#3b66f5]">
                                @error('password')
                                    <p class="text-xs text-red-500 font-medium mt-1">{{ $message }}</p>
                                @enderror
                                <p class="error text-xs text-red-500 font-medium mt-1 hidden"></p>
                            </div>

                            <div>
                                <label for="password_confirmation" class="block text-xs sm:text-sm font-semibold text-slate-700 mb-1.5">Konfirmasi Password</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" required placeholder="Ulangi password"
                                       class="w-full px-4 py-3 rounded-xl border border-slate-200 text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-[#3b66f5]/40 focus:border-[#3b66f5]">
                                <p class="error text-xs text-red-500 font-medium mt-1 hidden"></p>
                            </div>

                            <button type="submit"
                                    class="w-full bg-[#3cb759] hover:bg-[#329d4c] text-[#ffffff] font-bold py-3.5 rounded-xl shadow-lg shadow-green-500/20 transition-all duration-200 hover:-translate-y-0.5 text-sm sm:text-base">
                                Daftar Sekarang
                            </button>

                            <p class="text-center text-xs sm:text-sm text-slate-500 pt-1">
                                Sudah punya akun?
                                <a href="{{ route('login') }}" class="text-[#3b66f5] hover:underline font-semibold">Log in</a>
                            </p>
                        </form>
                    @endif

                </div>
            </div>

        </div>
    </main>

    <!-- FOOTER -->
    @include('partials.footer')

    <!-- Validasi frontend -->
    <script>
        const form = document.getElementById('registerForm');

        function setError(input, message) {
            const p = input.parentElement.querySelector('.error');
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

                check(f.name, f.name.value.trim().length >= 3, 'Nama minimal 3 karakter.');
                check(f.email, /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(f.email.value), 'Format email tidak valid.');
                check(f.phone, /^(\+62|62|0)8[0-9]{8,12}$/.test(f.phone.value.trim()), 'Format nomor tidak valid. Contoh: 08123456789');
                check(f.password, f.password.value.length >= 8, 'Password minimal 8 karakter.');
                check(f.password_confirmation, f.password_confirmation.value === f.password.value, 'Konfirmasi password tidak sama.');

                if (!ok) {
                    e.preventDefault();
                }
            });
        }
    </script>

</body>
</html>