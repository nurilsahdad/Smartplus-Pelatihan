<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sertifikat Saya - CV. SMARTPLUS INDONESIA</title>

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Playfair+Display:ital,wght@0,600;0,700;1,600&display=swap" rel="stylesheet">

    <!-- Vite Styles and Scripts / Tailwind Fallback -->
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
                            serif: ['"Playfair Display"', 'serif'],
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
<body class="bg-[#f4f7fe] text-slate-800 antialiased min-h-screen flex flex-col pt-20">

    <!-- TOP NAVBAR -->
    @include('partials.navbar')

    <!-- DASHBOARD CONTAINER WITH SIDEBAR & MAIN CONTENT -->
    <div class="flex-1 flex flex-col md:flex-row w-full min-h-[calc(100vh-5rem)]">

        <!-- LEFT SIDEBAR PANEL -->
        <aside class="w-full md:w-64 bg-white border-b md:border-b-0 md:border-r border-slate-100 p-4 sm:p-6 shrink-0 shadow-sm md:sticky md:top-20 md:h-[calc(100vh-5rem)] md:overflow-y-auto">
            <div class="flex md:flex-col overflow-x-auto md:overflow-visible gap-2 md:space-y-2 whitespace-nowrap pb-1 md:pb-0">
                <!-- Dashboard Item -->
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3.5 px-4 py-3 text-slate-500 hover:text-slate-900 hover:bg-slate-50 font-medium rounded-xl transition-colors shrink-0 text-xs sm:text-sm">
                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                    </svg>
                    <span>Dashboard</span>
                </a>

                <!-- Profile Item -->
                <a href="{{ route('profile') }}" class="flex items-center gap-3.5 px-4 py-3 text-slate-500 hover:text-slate-900 hover:bg-slate-50 font-medium rounded-xl transition-colors shrink-0 text-xs sm:text-sm">
                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    <span>Profile</span>
                </a>

                <!-- Jadwal Pelatihan Item -->
                <a href="{{ route('schedules') }}" class="flex items-center gap-3.5 px-4 py-3 text-slate-500 hover:text-slate-900 hover:bg-slate-50 font-medium rounded-xl transition-colors shrink-0 text-xs sm:text-sm">
                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <span>Jadwal Pelatihan</span>
                </a>

                <!-- Sertifikat Item (Active) -->
                <a href="{{ route('certificates') }}" class="flex items-center gap-3.5 px-4 py-3 bg-[#e8f0fe] text-[#2b54f5] font-bold rounded-xl transition-all shrink-0 text-xs sm:text-sm">
                    <svg class="w-5 h-5 text-[#2b54f5]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                    </svg>
                    <span>Sertifikat</span>
                </a>

                <!-- Riwayat Pembayaran Item -->
                <a href="#" class="flex items-center gap-3.5 px-4 py-3 text-slate-500 hover:text-slate-900 hover:bg-slate-50 font-medium rounded-xl transition-colors shrink-0 text-xs sm:text-sm">
                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    <span>Riwayat Pembayaran</span>
                </a>
            </div>
        </aside>

        <!-- RIGHT MAIN CONTENT -->
        <main class="flex-1 p-6 sm:p-8 space-y-6 max-w-7xl">

            <!-- PAGE HEADER -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div>
                    <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight flex items-center gap-2.5">
                        <span class="p-2 bg-emerald-100 text-[#3cb759] rounded-2xl text-xl">📜</span>
                        Sertifikat Pelatihan Saya
                    </h1>
                    <p class="text-slate-500 text-xs sm:text-sm font-normal mt-1">Daftar sertifikat kompetensi resmi yang telah Anda selesaikan di Smartplus Indonesia</p>
                </div>

                <div class="inline-flex items-center gap-2 bg-white px-4 py-2.5 rounded-2xl border border-slate-200/80 shadow-xs">
                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-pulse"></span>
                    <span class="text-xs font-bold text-slate-700">Total: {{ $certificates->count() }} Sertifikat</span>
                </div>
            </div>

            <!-- CERTIFICATE CARDS GRID -->
            @if($certificates->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                    @foreach($certificates as $cert)
                        <div class="bg-white rounded-3xl border border-slate-100 shadow-sm hover:shadow-lg transition-all overflow-hidden flex flex-col justify-between group">
                            
                            <!-- PREVIEW GAMBAR SERTIFIKAT -->
                            <a href="{{ route('certificates.show', $cert->id) }}" target="_blank" class="block relative aspect-[16/10] bg-slate-100 overflow-hidden group/img border-b border-slate-100">
                                @if($cert->file_path && $cert->isImage())
                                    <img src="{{ asset($cert->file_path) }}" 
                                         alt="{{ $cert->program_name }}" 
                                         class="w-full h-full object-cover sm:object-contain bg-slate-50 group-hover/img:scale-105 transition-transform duration-300">
                                @elseif($cert->file_path && $cert->isPdf())
                                    <div class="w-full h-full flex flex-col items-center justify-center bg-gradient-to-br from-slate-100 to-slate-200 p-6 text-slate-600 group-hover/img:scale-105 transition-transform duration-300">
                                        <div class="w-16 h-16 bg-red-100 text-red-600 rounded-2xl flex items-center justify-center shadow-sm mb-2">
                                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                        </div>
                                        <span class="text-xs font-bold text-slate-700">Dokumen Sertifikat PDF</span>
                                        <span class="text-[10px] text-slate-400 mt-0.5">Klik untuk melihat berkas</span>
                                    </div>
                                @else
                                    <div class="w-full h-full flex flex-col items-center justify-center bg-emerald-50/50 p-6 text-emerald-800">
                                        <div class="w-16 h-16 bg-emerald-100 text-[#3cb759] rounded-2xl flex items-center justify-center shadow-sm mb-2 text-2xl">
                                            📜
                                        </div>
                                        <span class="text-xs font-bold text-slate-700">Sertifikat Kelulusan Resmi</span>
                                        <span class="text-[10px] text-slate-400 mt-0.5">CV. SMARTPLUS INDONESIA</span>
                                    </div>
                                @endif

                                <!-- Hover Quick View Overlay Badge -->
                                <div class="absolute inset-0 bg-slate-900/30 opacity-0 group-hover/img:opacity-100 transition-opacity flex items-center justify-center">
                                    <span class="inline-flex items-center gap-1.5 bg-white/95 text-slate-900 text-xs font-bold px-3.5 py-2 rounded-xl shadow-lg transform translate-y-1 group-hover/img:translate-y-0 transition-transform">
                                        <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                        Lihat Sertifikat
                                    </span>
                                </div>
                            </a>

                            <!-- JUDUL PROGRAM -->
                            <div class="p-5 sm:p-6 space-y-2">
                                <h2 class="text-base sm:text-lg font-extrabold text-slate-900 group-hover:text-[#2b54f5] transition-colors leading-snug">
                                    {{ $cert->program_name }}
                                </h2>
                            </div>

                            <!-- CARD BOTTOM ACTION BUTTONS -->
                            <div class="p-5 sm:p-6 pt-0 flex flex-col sm:flex-row items-center gap-2.5">
                                <a href="{{ route('certificates.show', $cert->id) }}" target="_blank"
                                   class="w-full sm:flex-1 inline-flex items-center justify-center gap-2 bg-[#2b54f5] hover:bg-[#1a44e6] text-white font-bold text-xs py-3 px-4 rounded-xl shadow-md shadow-blue-500/10 transition-all hover:-translate-y-0.5">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                    Lihat Sertifikat
                                </a>

                                @if($cert->file_path)
                                    <a href="{{ asset($cert->file_path) }}" download
                                       class="w-full sm:w-auto inline-flex items-center justify-center gap-1.5 bg-emerald-50 hover:bg-emerald-100 border border-emerald-200 text-emerald-700 font-bold text-xs py-3 px-4 rounded-xl transition-all" title="Unduh Berkas Asli yang Diunggah Admin">
                                        <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                        Unduh
                                    </a>
                                @endif
                            </div>

                        </div>
                    @endforeach
                </div>
            @else
                <!-- EMPTY STATE -->
                <div class="bg-white rounded-3xl border border-slate-100 shadow-sm p-12 text-center max-w-xl mx-auto space-y-5">
                    <div class="w-20 h-20 bg-emerald-50 text-[#3cb759] rounded-3xl flex items-center justify-center mx-auto text-3xl shadow-inner">
                        🎓
                    </div>
                    <div>
                        <h3 class="text-xl font-extrabold text-slate-900">Belum Ada Sertifikat yang Diterbitkan</h3>
                        <p class="text-xs sm:text-sm text-slate-500 mt-2 leading-relaxed">
                            Selesaikan modul dan pelatihan yang Anda ikuti. Setelah instruktur atau admin mengonfirmasi kelulusan pelatihan Anda, sertifikat digital resmi akan otomatis tersedia di halaman ini.
                        </p>
                    </div>
                    <div class="pt-2">
                        <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-2 bg-[#2b54f5] hover:bg-[#1a44e6] text-white text-xs font-bold px-6 py-3 rounded-xl transition-all shadow-md shadow-blue-500/10">
                            Cek Pelatihan Saya
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                    </div>
                </div>
            @endif

        </main>

    </div>

</body>
</html>
