<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Pelatihan Agentik AI N8N - CV. SMARTPLUS INDONESIA</title>

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
                        Agentik <span class="text-[#3cb759]">AI</span> <br class="hidden sm:inline" />
                        <span class="text-[#3cb759]">N8N</span>
                    </h1>

                    <!-- Subtitle -->
                    <p class="text-slate-600 text-sm sm:text-lg max-w-xl mx-auto lg:mx-0 font-normal leading-relaxed">
                        Pelajari cara membangun asisten otonom (AI Agent) dan mengotomasi sistem operasional perusahaan Anda tanpa ribet coding menggunakan platform n8n.
                    </p>

                    <!-- CTA Button -->
                    <div class="pt-2">
                        <a href="{{ route('program.enroll', 'agentik-ai') }}" class="w-full sm:w-auto inline-flex items-center justify-center bg-[#3cb759] hover:bg-[#329d4c] text-white font-bold px-8 py-3.5 rounded-xl shadow-lg shadow-green-500/20 hover:shadow-green-500/30 transition-all duration-200 transform hover:-translate-y-0.5 text-sm sm:text-base">
                            Daftar Sekarang
                        </a>
                    </div>
                </div>

                <!-- Hero Graphic Right: Product Pelatihan Asset Image -->
                <div class="lg:col-span-6 flex justify-center relative mt-4 lg:mt-0">
                    <div class="relative w-full max-w-md lg:max-w-none">
                        <div class="absolute -inset-1 bg-gradient-to-r from-blue-400 to-green-400 rounded-3xl blur-2xl opacity-25 animate-pulse"></div>
                        <img src="{{ asset('images/AssetsN8N.png') }}" alt="Product Pelatihan Agentik AI N8N" class="relative rounded-3xl w-full h-auto max-h-[360px] sm:max-h-[460px] object-contain drop-shadow-2xl mx-auto border border-white/40 bg-white/10 backdrop-blur-sm p-2">
                    </div>
                </div>

            </div>
        </section>
    </div>

    <!-- SECTION 2: KENAPA HARUS BELAJAR PROGRAM INI? -->
    <section class="py-12 sm:py-16 lg:py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Section Header -->
            <div class="text-center max-w-3xl mx-auto mb-10 sm:mb-16 space-y-2 sm:space-y-3">
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-900 tracking-tight">
                    Kenapa Harus Belajar Program Ini?
                </h2>
                <p class="text-slate-600 text-xs sm:text-base font-normal">
                    Materi kurikulum kami ramah pemula dan berorientasi penuh pada studi kasus bisnis nyata agar Anda langsung siap kerja.
                </p>
            </div>

            <!-- 3 Benefit Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 sm:gap-8">
                
                <!-- Card 1 -->
                <div class="bg-white p-6 sm:p-8 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition-shadow text-center space-y-4">
                    <div class="w-12 h-12 sm:w-14 sm:h-14 bg-emerald-50 rounded-2xl flex items-center justify-center mx-auto text-emerald-600 border border-emerald-100">
                        <svg class="w-6 h-6 sm:w-7 sm:h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-base sm:text-lg font-bold text-slate-900">40 Jam Pelajaran</h3>
                    <p class="text-slate-500 text-xs sm:text-sm leading-relaxed">
                        Materi terstruktur dari dasar hingga mahir, dirancang untuk industri.
                    </p>
                </div>

                <!-- Card 2 -->
                <div class="bg-white p-6 sm:p-8 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition-shadow text-center space-y-4">
                    <div class="w-12 h-12 sm:w-14 sm:h-14 bg-emerald-50 rounded-2xl flex items-center justify-center mx-auto text-emerald-600 border border-emerald-100">
                        <svg class="w-6 h-6 sm:w-7 sm:h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                    </div>
                    <h3 class="text-base sm:text-lg font-bold text-slate-900">10+ Proyek Nyata</h3>
                    <p class="text-slate-500 text-xs sm:text-sm leading-relaxed">
                        Membangun sistem otomasi langsung yang siap diterapkan di dunia kerja.
                    </p>
                </div>

                <!-- Card 3 -->
                <div class="bg-white p-6 sm:p-8 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition-shadow text-center space-y-4">
                    <div class="w-12 h-12 sm:w-14 sm:h-14 bg-emerald-50 rounded-2xl flex items-center justify-center mx-auto text-emerald-600 border border-emerald-100">
                        <svg class="w-6 h-6 sm:w-7 sm:h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                        </svg>
                    </div>
                    <h3 class="text-base sm:text-lg font-bold text-slate-900">Sertifikasi Resmi</h3>
                    <p class="text-slate-500 text-xs sm:text-sm leading-relaxed">
                        Sertifikat kelulusan kredibel sebagai bukti peningkatan keahlian Anda.
                    </p>
                </div>

            </div>

        </div>
    </section>

    <!-- SECTION 3: KURIKULUM YANG KOMPREHENSIF -->
    <section class="py-12 sm:py-16 lg:py-24 bg-[#f8f9fe]">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Badge & Title -->
            <div class="text-center mb-10 sm:mb-16 space-y-3 sm:space-y-4">
                <div class="inline-block">
                    <span class="bg-[#dce4fe] text-[#3b66f5] font-semibold text-xs sm:text-sm px-4 py-1.5 rounded-full">
                        KURIKULUM MATERI
                    </span>
                </div>
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-900 tracking-tight">
                    Kurikulum yang Komprehensif
                </h2>
            </div>

            <!-- Dynamic Syllabus Cards from Database -->
            <div class="space-y-4 sm:space-y-6">
                @forelse ($syllabuses as $index => $syllabus)
                <div class="bg-white rounded-2xl p-5 sm:p-8 border border-slate-200/80 shadow-sm hover:shadow-md transition-shadow">
                    <div class="space-y-3 sm:space-y-4">
                        <div class="flex flex-wrap items-center gap-3">
                            <span class="text-[#3cb759] font-bold text-xs sm:text-sm bg-emerald-50 px-3 py-1 rounded-lg border border-emerald-100">
                                Modul {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                            </span>
                            <h3 class="text-base sm:text-xl font-bold text-slate-900">{{ $syllabus->title }}</h3>
                        </div>
                        @if ($syllabus->description)
                        <p class="text-slate-600 text-xs sm:text-sm leading-relaxed">{{ $syllabus->description }}</p>
                        @endif

                    </div>
                </div>
                @empty
                <div class="bg-white rounded-2xl p-5 sm:p-8 border border-slate-200/80 shadow-sm text-center text-slate-400 text-sm">
                    Kurikulum sedang dalam penyusunan. Silakan cek kembali nanti.
                </div>
                @endforelse
            </div>

        </div>
    </section>

    <!-- SECTION 4: PRICING & SOCIAL MEDIA CARDS -->
    <section class="py-12 sm:py-16 bg-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 sm:gap-8 items-stretch">
                
                <!-- Left Box: Investasi Belajar -->
                <div class="lg:col-span-6 bg-emerald-50/40 border border-emerald-300 rounded-3xl p-6 sm:p-8 flex flex-col justify-between space-y-6">
                    <div class="space-y-4">
                        <div class="flex items-center gap-2 text-slate-900 font-bold text-base sm:text-lg">
                            <span>💎</span>
                            <h3>Investasi Belajar</h3>
                        </div>

                        <div class="flex items-baseline gap-2">
                            <span class="text-2xl sm:text-4xl font-extrabold text-[#3cb759]">{{ $program->price ?? 'Rp 100.000' }}</span>
                            <span class="text-slate-500 font-medium text-xs sm:text-sm">/ nett</span>
                        </div>

                        <div class="space-y-2 pt-2 text-xs sm:text-sm text-slate-600">
                            <p class="leading-relaxed">* Biaya sudah termasuk modul praktis, source code n8n, dan sertifikat resmi.</p>
                            <p class="leading-relaxed">* Tersedia opsi pembayaran cicilan ringan.</p>
                        </div>
                    </div>
                </div>

                <!-- Right Box: Ikuti Kami di Sosial Media -->
                <div class="lg:col-span-6 bg-white border border-emerald-300 rounded-3xl p-6 sm:p-8 flex flex-col justify-between space-y-6">
                    <div class="space-y-3">
                        <h3 class="text-slate-900 font-bold text-base sm:text-lg">Ikuti Kami di Sosial Media</h3>
                        <p class="text-slate-500 text-xs sm:text-sm leading-relaxed">
                            Dapatkan update terbaru, tips dan informasi menarik lainnya.
                        </p>
                    </div>

                    <!-- Social Icons -->
                    <div class="flex items-center space-x-4 pt-2">
                        <!-- Facebook -->
                        <a href="#" class="w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-[#1877f2] text-white flex items-center justify-center shadow-md hover:opacity-90 transition-opacity">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </a>
                        <!-- YouTube -->
                        <a href="#" class="w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-[#ff0000] text-white flex items-center justify-center shadow-md hover:opacity-90 transition-opacity">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                            </svg>
                        </a>
                        <!-- Instagram -->
                        <a href="#" class="w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-gradient-to-tr from-amber-500 via-rose-500 to-purple-600 text-white flex items-center justify-center shadow-md hover:opacity-90 transition-opacity">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- SECTION 5: BLUE/PURPLE CTA BANNER -->
    <section id="daftar" class="py-8 sm:py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-gradient-to-r from-blue-600 via-indigo-600 to-blue-700 rounded-3xl p-6 sm:p-12 text-white flex flex-col md:flex-row justify-between items-center gap-6 sm:gap-8 shadow-xl">
                <div class="space-y-2 text-center md:text-left max-w-2xl">
                    <h2 class="text-xl sm:text-3xl font-extrabold tracking-tight">
                        Siap Menguasai Otomasi Berbasis AI?
                    </h2>
                    <p class="text-blue-100 text-xs sm:text-base font-normal leading-relaxed">
                        Gabung hari ini dan mulailah membangun workflow otomatis perusahaan Anda tanpa batas. Kuota terbatas 25 peserta per batch!
                    </p>
                </div>
                <div class="shrink-0 w-full sm:w-auto">
                    <a href="{{ route('program.enroll', 'agentik-ai') }}" class="w-full sm:w-auto inline-flex items-center justify-center bg-white text-blue-600 hover:bg-slate-100 font-bold px-8 py-3.5 rounded-full shadow-lg transition-all transform hover:-translate-y-0.5 text-sm sm:text-base">
                        Daftar Sekarang Juga
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 6: FOOTER -->
    @include('partials.footer')

</body>
</html>
