<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sertifikat Pelatihan - {{ $certificate->user->name ?? 'Peserta' }} - {{ $certificate->certificate_number }}</title>

    <!-- Google Fonts: Plus Jakarta Sans, Playfair Display & Cinzel -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600;700;800;900&family=Great+Vibes&family=Playfair+Display:ital,wght@0,600;0,700;0,900;1,600&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Alex+Brush&display=swap" rel="stylesheet">

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
                            cinzel: ['"Cinzel"', 'serif'],
                            script: ['"Alex Brush"', 'cursive'],
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

        .font-cinzel {
            font-family: 'Cinzel', serif;
        }

        .font-script {
            font-family: 'Alex Brush', cursive;
        }

        .font-serif {
            font-family: 'Playfair Display', serif;
        }

        /* PRINT STYLES */
        @media print {
            @page {
                size: A4 landscape;
                margin: 0;
            }

            body {
                background: white !important;
                padding: 0 !important;
                margin: 0 !important;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }

            .no-print {
                display: none !important;
            }

            .certificate-wrapper {
                padding: 0 !important;
                margin: 0 !important;
                box-shadow: none !important;
                border: none !important;
                width: 100vw !important;
                height: 100vh !important;
                max-width: 100vw !important;
                max-height: 100vh !important;
                border-radius: 0 !important;
            }
        }
    </style>
</head>
<body class="bg-slate-900 text-slate-800 antialiased min-h-screen flex flex-col justify-between py-6 px-3 sm:px-6">

    <!-- TOP CONTROL ACTIONS BAR (HIDDEN ON PRINT) -->
    <header class="no-print max-w-5xl mx-auto w-full mb-6 bg-slate-800/90 backdrop-blur border border-slate-700/60 rounded-2xl px-5 py-3.5 flex flex-wrap items-center justify-between gap-4 shadow-xl">
        <div class="flex items-center gap-3">
            <a href="{{ auth()->check() && auth()->user()->role === 'admin' ? route('admin.certificates.index') : route('certificates') }}" class="inline-flex items-center gap-2 text-xs font-bold text-slate-300 hover:text-white transition-colors bg-slate-700/50 hover:bg-slate-700 px-3.5 py-2 rounded-xl">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali ke Daftar Sertifikat
            </a>
        </div>

        <div class="flex items-center gap-2.5">
            <!-- Tombol Unduh Berkas Asli (Jika ada) -->
            @if($certificate->file_path)
                <a href="{{ asset($certificate->file_path) }}" download class="inline-flex items-center gap-2 bg-[#2b54f5] hover:bg-[#1a44e6] text-white text-xs font-black px-4 py-2 rounded-xl shadow-lg shadow-blue-500/20 transition-all hover:scale-105">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                    Unduh Dokumen
                </a>
            @endif

            <!-- Tombol Cetak -->
            <button type="button" onclick="window.print()" class="inline-flex items-center gap-2 bg-[#3cb759] hover:bg-[#329d4c] text-white text-xs font-black px-4 py-2 rounded-xl shadow-lg shadow-emerald-500/20 transition-all hover:scale-105">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
                </svg>
                Cetak
            </button>
        </div>
    </header>

    <!-- REVOKED NOTICE BANNER (IF APPLICABLE) -->
    @if($certificate->status !== 'Aktif')
        <div class="no-print max-w-5xl mx-auto w-full mb-4 bg-red-950/80 border border-red-500/40 text-red-200 px-5 py-3 rounded-2xl text-xs flex items-center justify-between">
            <div class="flex items-center gap-3">
                <span class="text-xl">⚠️</span>
                <span><strong>PERINGATAN:</strong> Sertifikat ini telah <strong>DICABUT</strong> dan tidak lagi diakui sebagai dokumen kompetensi yang sah oleh CV. SMARTPLUS INDONESIA.</span>
            </div>
        </div>
    @endif

    <!-- MAIN CERTIFICATE CANVAS / CONTAINER -->
    <main class="certificate-wrapper max-w-5xl mx-auto w-full space-y-6">

        @if($certificate->file_path)
            <!-- JIKA BERKAS DIUPLOAD OLEH ADMIN (PDF ATAU GAMBAR) -->
            <div class="bg-white rounded-3xl p-3 sm:p-5 shadow-2xl border border-slate-700/60 overflow-hidden">
                @if($certificate->isPdf())
                    <!-- EMBEDDED PDF VIEWER -->
                    <div class="w-full bg-slate-100 rounded-2xl overflow-hidden shadow-inner">
                        <iframe src="{{ asset($certificate->file_path) }}#toolbar=1" class="w-full h-[700px] sm:h-[880px] rounded-2xl border-0" type="application/pdf">
                            <div class="p-10 text-center space-y-4">
                                <p class="text-sm font-bold text-slate-700">Dokumen sertifikat format PDF telah siap.</p>
                                <a href="{{ asset($certificate->file_path) }}" download class="inline-flex items-center gap-2 bg-[#2b54f5] text-white px-5 py-2.5 rounded-xl text-xs font-bold shadow-md">
                                    Unduh Berkas PDF Sertifikat
                                </a>
                            </div>
                        </iframe>
                    </div>
                @elseif($certificate->isImage())
                    <!-- IMAGE PREVIEW -->
                    <div class="w-full flex items-center justify-center p-2 bg-slate-50 rounded-2xl">
                        <img src="{{ asset($certificate->file_path) }}" alt="Sertifikat Pelatihan - {{ $certificate->user->name ?? 'Peserta' }}" class="max-w-full max-h-[850px] object-contain rounded-xl shadow-md border border-slate-200">
                    </div>
                @else
                    <!-- GENERAL FILE FALLBACK -->
                    <div class="p-12 text-center bg-slate-50 rounded-2xl space-y-4">
                        <div class="w-16 h-16 bg-blue-100 text-blue-600 rounded-2xl flex items-center justify-center mx-auto text-2xl font-bold">
                            📄
                        </div>
                        <h3 class="text-base font-extrabold text-slate-900">Berkas Sertifikat Resmi Telah Diunggah</h3>
                        <p class="text-xs text-slate-500 max-w-md mx-auto">Sertifikat kelulusan Anda telah diunggah oleh admin. Klik tombol di bawah untuk mengunduh dan mencetak dokumen asli.</p>
                        <a href="{{ asset($certificate->file_path) }}" download class="inline-flex items-center gap-2 bg-[#2b54f5] hover:bg-[#1a44e6] text-white text-xs font-bold px-6 py-3 rounded-xl shadow-md transition-all">
                            Unduh Dokumen Sertifikat
                        </a>
                    </div>
                @endif
            </div>
        @else
            <!-- FALLBACK JIKA BELUM ADA FILE YANG DIUPLOAD ADMIN (DESAIN CANVAS BAWAAN) -->
            <div class="bg-[#fcfbf7] border-[12px] border-[#1e293b] p-3 sm:p-5 rounded-3xl shadow-2xl relative overflow-hidden text-slate-800">
                <div class="border-[3px] border-[#c49a45] h-full p-6 sm:p-10 relative flex flex-col justify-between rounded-xl bg-gradient-to-b from-[#ffffff] via-[#faf8f2] to-[#f7f4ea]">

                    <!-- CORNER ACCENTS -->
                    <div class="absolute top-2 left-2 w-8 h-8 border-t-2 border-l-2 border-[#c49a45]"></div>
                    <div class="absolute top-2 right-2 w-8 h-8 border-t-2 border-r-2 border-[#c49a45]"></div>
                    <div class="absolute bottom-2 left-2 w-8 h-8 border-b-2 border-l-2 border-[#c49a45]"></div>
                    <div class="absolute bottom-2 right-2 w-8 h-8 border-b-2 border-r-2 border-[#c49a45]"></div>

                    <!-- 1. TOP HEADER -->
                    <div class="text-center relative z-10 space-y-1.5">
                        <div class="flex items-center justify-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-[#1e293b] text-[#c49a45] flex items-center justify-center font-black text-lg border border-[#c49a45]/40 shadow-sm">
                                S+
                            </div>
                            <div class="text-left">
                                <h2 class="text-base sm:text-lg font-black tracking-wider text-[#1e293b] uppercase">CV. SMARTPLUS INDONESIA</h2>
                                <p class="text-[9px] sm:text-[10px] text-slate-500 tracking-widest uppercase font-semibold">Center for Information Technology & Advanced Automation</p>
                            </div>
                        </div>

                        <div class="pt-3">
                            <h1 class="font-cinzel text-2xl sm:text-4xl font-extrabold text-[#1e293b] tracking-wider uppercase">
                                Sertifikat Kelulusan
                            </h1>
                            <p class="font-serif italic text-xs sm:text-sm text-[#8c6d2d] tracking-widest font-semibold mt-0.5">
                                CERTIFICATE OF COMPLETION & PROFESSIONAL PROFICIENCY
                            </p>
                        </div>

                        <div class="pt-1">
                            <span class="inline-block bg-[#f1ebd9] text-[#71541c] font-mono text-[11px] sm:text-xs font-bold px-3.5 py-0.5 rounded-full border border-[#d6c79f]">
                                Nomor: {{ $certificate->certificate_number }}
                            </span>
                        </div>
                    </div>

                    <!-- 2. MIDDLE BODY -->
                    <div class="text-center my-6 sm:my-8 relative z-10 space-y-3">
                        <p class="text-xs sm:text-sm text-slate-600 font-serif italic">
                            Diberikan dengan penuh kehormatan kepada / Proudly presented to:
                        </p>
                        <div class="py-2">
                            <h2 class="text-2xl sm:text-4xl font-serif font-black text-[#1e293b] tracking-wide inline-block border-b-2 border-[#c49a45] pb-2 px-6">
                                {{ $certificate->user->name ?? 'Peserta' }}
                            </h2>
                        </div>
                        <p class="text-xs sm:text-sm text-slate-600 max-w-2xl mx-auto leading-relaxed pt-1">
                            Atas dedikasi, partisipasi aktif, dan keberhasilannya dalam menyelesaikan seluruh kurikulum serta uji kompetensi pada program pelatihan:
                        </p>
                        <div class="pt-1">
                            <h3 class="text-lg sm:text-2xl font-black text-[#1e293b] uppercase tracking-wide">
                                {{ $certificate->program_name }}
                            </h3>
                            <div class="mt-2 inline-flex items-center gap-2 bg-[#ecfdf5] border border-emerald-300 text-emerald-800 text-xs sm:text-sm font-extrabold px-4 py-1 rounded-full shadow-xs">
                                <span>Predikat Kelulusan:</span>
                                <span class="text-emerald-900 underline">{{ $certificate->predicate }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- 3. FOOTER -->
                    <div class="relative z-10 pt-4 border-t border-slate-200/80 flex flex-col sm:flex-row items-center justify-between gap-6">
                        <div class="text-left space-y-0.5">
                            <span class="text-[9px] uppercase font-extrabold text-slate-400 tracking-wider">No. Sertifikat:</span>
                            <p class="font-mono text-xs font-bold text-slate-800">{{ $certificate->certificate_number }}</p>
                        </div>

                        <div class="text-center sm:text-right min-w-[200px]">
                            <p class="text-[11px] sm:text-xs text-slate-600 font-medium">
                                Yogyakarta, {{ \Carbon\Carbon::parse($certificate->issue_date)->translatedFormat('d F Y') }}
                            </p>
                            <div class="border-t border-slate-400 pt-1 mt-6">
                                <p class="text-xs sm:text-sm font-black text-[#1e293b]">{{ $certificate->signed_by }}</p>
                                <p class="text-[10px] text-slate-500 font-bold uppercase tracking-wider">Penyelenggara Pelatihan Resmi</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        @endif

    </main>

    <!-- FOOTER NOTE (NO-PRINT) -->
    <footer class="no-print text-center text-slate-500 text-xs mt-6">
        <p>&copy; {{ date('Y') }} CV. SMARTPLUS INDONESIA</p>
    </footer>

</body>
</html>
