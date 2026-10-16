<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Pelatihan Industrial Internet of Things - CV. SMARTPLUS INDONESIA</title>

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Vite Styles and Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        fontFamily: {
                            sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                        },
                        colors: {
                            brand: {
                                blue: '#3b66f5',
                                green: '#3cb759',
                                darkgreen: '#329d4c',
                                badge: '#dce4fe',
                                darkfooter: '#2a2e33'
                            }
                        }
                    }
                }
            }
        </script>
    @endif
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>
<body class="bg-white text-slate-800 antialiased selection:bg-blue-500 selection:text-white overflow-x-hidden">

    <!-- HERO SECTION WITH GRADIENT & HEADER -->
    <div class="relative bg-gradient-to-b from-[#2d5bf0] via-[#4873f7]/85 to-white pb-12 sm:pb-20 pt-20 overflow-hidden">
        
        <!-- HEADER / NAVIGATION -->
        @include('partials.navbar')

        <!-- HERO MAIN CONTENT -->
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-6 sm:pt-10 lg:pt-16 pb-8 sm:pb-12">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">
                
                <!-- Hero Text Left -->
                <div class="lg:col-span-6 text-center lg:text-left space-y-4 sm:space-y-6">
                    <!-- Badge -->
                    <div class="inline-block">
                        <span class="bg-[#e8f7ec] text-[#3cb759] font-semibold text-xs sm:text-sm px-4 py-1.5 rounded-full border border-emerald-200">
                            PRODUCT PELATIHAN
                        </span>
                    </div>

                    <!-- Title -->
                    <h1 class="text-2xl sm:text-4xl lg:text-5xl font-extrabold text-slate-900 tracking-tight leading-tight sm:leading-tight">
                        Industrial Internet <br class="hidden sm:inline" />
                        <span class="text-[#3cb759]">of Things</span>
                    </h1>

                    <!-- Subtitle -->
                    <p class="text-slate-600 text-sm sm:text-lg max-w-xl mx-auto lg:mx-0 font-normal leading-relaxed">
                        Pelajari penerapan IIoT dalam lingkungan industri, mulai dari sensor, konektivitas, pengumpulan data, hingga monitoring sistem secara real-time.
                    </p>

                    <!-- CTA Button -->
                    <div class="pt-2">
                        <a href="{{ route('program.enroll', 'industrial-iot') }}" class="w-full sm:w-auto inline-flex items-center justify-center bg-[#3cb759] hover:bg-[#329d4c] text-white font-bold px-8 py-3.5 rounded-xl shadow-lg shadow-green-500/20 hover:shadow-green-500/30 transition-all duration-200 transform hover:-translate-y-0.5 text-sm sm:text-base">
                            Daftar Sekarang
                        </a>
                    </div>
                </div>

                <!-- Hero Graphic Right: Product Pelatihan Asset Image -->
                <div class="lg:col-span-6 flex justify-center relative mt-4 lg:mt-0">
                    <div class="relative w-full max-w-md lg:max-w-none">
                        <div class="absolute -inset-1 bg-gradient-to-r from-blue-400 to-green-400 rounded-3xl blur-2xl opacity-25 animate-pulse"></div>
                        <img src="{{ asset('images/industrial-IoT.png') }}" alt="Product Pelatihan Industrial Internet of Things" class="relative rounded-3xl w-full h-auto max-h-[360px] sm:max-h-[460px] object-contain drop-shadow-2xl mx-auto border border-white/40 bg-white/10 backdrop-blur-sm p-2">
                    </div>
                </div>

            </div>
        </section>
    </div>

    <!-- SECTION 2: KENAPA HARUS BELAJAR PROGRAM INI? -->
    <section class="py-12 sm:py-16 lg:py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-10 sm:mb-16 space-y-2 sm:space-y-3">
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-900 tracking-tight">
                    Kenapa Harus Belajar Program Ini?
                </h2>
                <p class="text-slate-600 text-xs sm:text-base leading-relaxed">
                    Materi kurikulum kami ramah pemula dan berorientasi penuh pada studi kasus bisnis nyata agar Anda langsung siap kerja.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 sm:gap-8">
                <!-- Card 1 -->
                <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-100 shadow-sm hover:shadow-md transition-shadow duration-300">
                    <div class="w-12 h-12 sm:w-14 sm:h-14 bg-emerald-50 text-[#3cb759] rounded-xl flex items-center justify-center mb-6 mx-auto sm:mx-0">
                        <svg class="w-6 h-6 sm:w-7 sm:h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-base sm:text-lg font-bold text-slate-900 mb-2">40 Jam Pelajaran</h3>
                    <p class="text-slate-500 text-xs sm:text-sm leading-relaxed">
                        Materi terstruktur dari dasar hingga mahir, dirancang untuk industri.
                    </p>
                </div>

                <!-- Card 2 -->
                <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-100 shadow-sm hover:shadow-md transition-shadow duration-300">
                    <div class="w-12 h-12 sm:w-14 sm:h-14 bg-emerald-50 text-[#3cb759] rounded-xl flex items-center justify-center mb-6 mx-auto sm:mx-0">
                        <svg class="w-6 h-6 sm:w-7 sm:h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                        </svg>
                    </div>
                    <h3 class="text-base sm:text-lg font-bold text-slate-900 mb-2">10+ Proyek Nyata</h3>
                    <p class="text-slate-500 text-xs sm:text-sm leading-relaxed">
                        Membangun sistem otomasi langsung yang siap digunakan di dunia kerja.
                    </p>
                </div>

                <!-- Card 3 -->
                <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-100 shadow-sm hover:shadow-md transition-shadow duration-300">
                    <div class="w-12 h-12 sm:w-14 sm:h-14 bg-emerald-50 text-[#3cb759] rounded-xl flex items-center justify-center mb-6 mx-auto sm:mx-0">
                        <svg class="w-6 h-6 sm:w-7 sm:h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                        </svg>
                    </div>
                    <h3 class="text-base sm:text-lg font-bold text-slate-900 mb-2">Sertifikasi Resmi</h3>
                    <p class="text-slate-500 text-xs sm:text-sm leading-relaxed">
                        Sertifikat kelulusan kredibel sebagai bukti peningkatan keahlian Anda.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 3: SILABUS MATERI / KURIKULUM -->
    <section class="py-12 sm:py-16 lg:py-24 bg-slate-50/60 border-y border-slate-100">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-10 sm:mb-16 space-y-3">
                <span class="bg-blue-50 text-[#3b66f5] font-bold text-xs px-4 py-1.5 rounded-full uppercase tracking-wider">
                    SILABUS MATERI
                </span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900">
                    Kurikulum yang Komprehensif
                </h2>
            </div>

            <!-- Dynamic Syllabus Cards from Database -->
            <div class="space-y-4">
                @forelse ($syllabuses as $index => $syllabus)
                <div class="bg-white rounded-2xl p-5 sm:p-7 border border-slate-200/70 shadow-sm hover:shadow-md transition-shadow">
                    <div class="flex flex-col sm:flex-row sm:items-start gap-4">
                        <div class="shrink-0">
                            <span class="inline-block text-[#3cb759] font-bold text-xs bg-emerald-50 px-3 py-1 rounded-md border border-emerald-100">
                                Modul {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                            </span>
                        </div>
                        <div>
                            <h3 class="text-base sm:text-lg font-bold text-slate-900 mb-1">{{ $syllabus->title }}</h3>
                            @if ($syllabus->description)
                            <p class="text-slate-500 text-xs sm:text-sm leading-relaxed">{{ $syllabus->description }}</p>
                            @endif

                        </div>
                    </div>
                </div>
                @empty
                <div class="bg-white rounded-2xl p-5 sm:p-7 border border-slate-200/70 shadow-sm text-center text-slate-400 text-sm">
                    Kurikulum sedang dalam penyusunan. Silakan cek kembali nanti.
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- SECTION 4: INVESTASI BELAJAR & SOSIAL MEDIA -->
    <section class="py-12 sm:py-16 lg:py-24 bg-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 sm:gap-8">
                
                <!-- Card 1: Investasi Belajar -->
                <div class="bg-white rounded-3xl p-6 sm:p-9 border-2 border-emerald-400 shadow-md flex flex-col justify-between space-y-6">
                    <div>
                        <div class="flex items-center gap-2 mb-4">
                            <span class="text-blue-500 text-lg">💎</span>
                            <h3 class="text-base sm:text-lg font-bold text-slate-900">Investasi Belajar</h3>
                        </div>
                        <div class="flex items-baseline gap-2 mb-6">
                            <span class="text-2xl sm:text-4xl font-extrabold text-[#3cb759]">{{ $program->price ?? 'Rp 100.000' }}</span>
                            <span class="text-slate-400 text-xs sm:text-sm font-medium">/ nett</span>
                        </div>
                        <ul class="space-y-2 text-xs sm:text-sm text-slate-500">
                            <li>* Biaya sudah termasuk modul praktis, source code rib, dan e-sertifikat resmi.</li>
                            <li>* Tersedia opsi pembayaran cicilan ringan.</li>
                        </ul>
                    </div>
                </div>

                <!-- Card 2: Ikuti Kami di Sosial Media -->
                <div class="bg-white rounded-3xl p-6 sm:p-9 border-2 border-emerald-400 shadow-md flex flex-col justify-between space-y-6">
                    <div>
                        <h3 class="text-base sm:text-lg font-bold text-slate-900 mb-2">Ikuti Kami di Sosial Media</h3>
                        <p class="text-slate-500 text-xs sm:text-sm leading-relaxed mb-6">
                            Dapatkan update terbaru, tips dan informasi menarik lainnya.
                        </p>
                        <div class="flex items-center gap-4 pt-2">
                            <!-- Facebook -->
                            <a href="#" class="w-10 h-10 sm:w-12 sm:h-12 rounded-2xl bg-blue-600 text-white flex items-center justify-center hover:opacity-90 transition-opacity shadow-md">
                                <svg class="w-5 h-5 sm:w-6 sm:h-6 fill-current" viewBox="0 0 24 24">
                                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                </svg>
                            </a>
                            <!-- YouTube -->
                            <a href="#" class="w-10 h-10 sm:w-12 sm:h-12 rounded-2xl bg-red-600 text-white flex items-center justify-center hover:opacity-90 transition-opacity shadow-md">
                                <svg class="w-5 h-5 sm:w-6 sm:h-6 fill-current" viewBox="0 0 24 24">
                                    <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                                </svg>
                            </a>
                            <!-- Instagram -->
                            <a href="#" class="w-10 h-10 sm:w-12 sm:h-12 rounded-2xl bg-gradient-to-tr from-amber-500 via-rose-500 to-purple-600 text-white flex items-center justify-center hover:opacity-90 transition-opacity shadow-md">
                                <svg class="w-5 h-5 sm:w-6 sm:h-6 fill-current" viewBox="0 0 24 24">
                                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- SECTION 5: CTA BANNER -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-12 sm:pb-16">
        <div class="bg-gradient-to-r from-[#2d5bf0] via-[#3b66f5] to-[#254edb] rounded-3xl p-6 sm:p-12 text-white flex flex-col md:flex-row items-center justify-between gap-6 sm:gap-8 shadow-xl">
            <div class="space-y-2 text-center md:text-left max-w-xl">
                <h2 class="text-xl sm:text-3xl font-extrabold tracking-tight">
                    Siap Menguasai Otomasi Berbasis AI?
                </h2>
                <p class="text-white/80 text-xs sm:text-base leading-relaxed">
                    Gabung hari ini dan mulailah membangun workflow otomatis perusahaan Anda tanpa batas. Kuota terbatas 25 peserta per batch!
                </p>
            </div>
            <div class="shrink-0 w-full sm:w-auto">
                <a href="{{ route('program.enroll', 'industrial-iot') }}" class="w-full sm:w-auto inline-flex items-center justify-center bg-white hover:bg-slate-100 text-[#2d5bf0] font-bold px-8 py-3.5 rounded-full shadow-md transition-all duration-200 text-sm sm:text-base">
                    Daftar Sekarang Juga
                </a>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    @include('partials.footer')

</body>
</html>
