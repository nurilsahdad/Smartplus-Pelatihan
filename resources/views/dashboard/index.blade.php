<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - CV. SMARTPLUS INDONESIA</title>

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

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
                <!-- Dashboard Item (Active) -->
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3.5 px-4 py-3 bg-[#e8f0fe] text-[#2b54f5] font-bold rounded-xl transition-all shrink-0 text-xs sm:text-sm">
                    <!-- 4 squares grid icon -->
                    <svg class="w-5 h-5 text-[#2b54f5]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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

                <!-- Sertifikat Item -->
                <a href="{{ route('certificates') }}" class="flex items-center gap-3.5 px-4 py-3 {{ request()->routeIs('certificates*') ? 'bg-[#e8f0fe] text-[#2b54f5] font-bold' : 'text-slate-500 hover:text-slate-900 hover:bg-slate-50 font-medium' }} rounded-xl transition-colors shrink-0 text-xs sm:text-sm">
                    <svg class="w-5 h-5 {{ request()->routeIs('certificates*') ? 'text-[#2b54f5]' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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

            <!-- 1. WELCOME HEADER BANNER CARD -->
            <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 sm:p-8 flex items-center gap-6">
                <!-- Circle Avatar Icon -->
                @if($user->photo)
                    <img src="{{ asset($user->photo) }}" alt="{{ $user->name }}" class="w-16 h-16 sm:w-20 sm:h-20 rounded-full object-cover border-2 border-blue-100 shadow-sm shrink-0">
                @else
                    <div class="w-16 h-16 sm:w-20 sm:h-20 bg-[#f0f4ff] border border-blue-100 rounded-full flex items-center justify-center text-slate-400 shrink-0">
                        <svg class="w-9 h-9 sm:w-11 sm:h-11 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                @endif

                <!-- User Greeting Text -->
                <div class="space-y-1">
                    <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight flex items-center gap-2">
                        Halo, {{ $user->name }} 👋
                    </h1>
                    <p class="text-slate-500 text-xs sm:text-sm font-normal leading-relaxed">
                        Selamat datang kembali di dashboard pelatihan CV.SMARTPLUS INDONESIA
                    </p>
                    <div class="pt-1">
                        <span class="inline-flex items-center gap-1.5 bg-[#eef2ff] text-[#2b54f5] border border-blue-100 font-semibold text-xs px-3 py-1 rounded-full">
                            🎓 Peserta Pelatihan
                        </span>
                    </div>
                </div>
            </div>

            <!-- 2. SUMMARY STATS CARDS GRID -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <!-- Stat 1: Pelatihan Tersedia -->
                <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 flex items-center justify-between hover:shadow-md transition-all cursor-pointer">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-[#eef3ff] text-[#2b54f5] rounded-xl flex items-center justify-center shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-slate-500 text-xs font-semibold">Pelatihan Tersedia</p>
                            <p class="text-2xl sm:text-3xl font-extrabold text-slate-900 mt-0.5">{{ $stats['available_trainings'] ?? 3 }}</p>
                            <p class="text-xs text-slate-400 font-normal mt-0.5">Program pelatihan yang dapat Anda ikuti.</p>
                        </div>
                    </div>
                    <div class="text-slate-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </div>
                </div>

                <!-- Stat 2: Sertifikat Saya -->
                <div onclick="window.location='{{ route('certificates') }}'" class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 flex items-center justify-between hover:shadow-md transition-all cursor-pointer">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-[#eaf8f0] text-[#3cb759] rounded-xl flex items-center justify-center shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-slate-500 text-xs font-semibold">Sertifikat Saya</p>
                            <p class="text-2xl sm:text-3xl font-extrabold text-slate-900 mt-0.5">{{ $stats['my_certificates'] ?? 0 }}</p>
                            <p class="text-xs text-slate-400 font-normal mt-0.5">Sertifikat yang sudah diperoleh.</p>
                        </div>
                    </div>
                    <div class="text-slate-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </div>
                </div>

                <!-- Stat 3: Pembayaran Saya -->
                <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 flex items-center justify-between hover:shadow-md transition-all cursor-pointer">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-[#f5eeff] text-[#9333ea] rounded-xl flex items-center justify-center shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-slate-500 text-xs font-semibold">Pembayaran Saya</p>
                            <p class="text-2xl sm:text-3xl font-extrabold text-slate-900 mt-0.5">{{ $stats['my_payments'] ?? 0 }}</p>
                            <p class="text-xs text-slate-400 font-normal mt-0.5">Transaksi pembayaran Anda.</p>
                        </div>
                    </div>
                    <div class="text-slate-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </div>
                </div>

            </div>

            <!-- 3. PELATIHAN SAYA (ENROLLED TRAININGS) -->
            <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 sm:p-8 space-y-6">
                <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                    <div>
                        <h2 class="text-xl font-extrabold text-slate-900 tracking-tight flex items-center gap-2">
                            Pelatihan Saya 
                            <span class="bg-emerald-50 text-[#3cb759] border border-emerald-200 text-xs px-2.5 py-0.5 rounded-full font-bold">
                                {{ count($enrollments) }}
                            </span>
                        </h2>
                        <p class="text-slate-500 text-xs sm:text-sm font-normal mt-0.5">Daftar program pelatihan yang sedang Anda ikuti.</p>
                    </div>
                </div>

                @if(count($enrollments) > 0)
                    <div class="space-y-4">
                        @foreach($enrollments as $enrollment)
                            @php
                                $img = 'images/AssetsIOT.png';
                                $link = route('program.iot-esp32');
                                if($enrollment->program_slug === 'agentik-ai') {
                                    $img = 'images/AssetsN8N.png';
                                    $link = route('program.agentik-ai');
                                } elseif($enrollment->program_slug === 'industrial-iot') {
                                    $img = 'images/industrial-IoT.png';
                                    $link = route('program.industrial-iot');
                                }
                            @endphp
                            <div class="border border-emerald-200/80 bg-emerald-50/20 rounded-2xl p-4 sm:p-5 flex flex-col md:flex-row items-start md:items-center justify-between gap-6 hover:shadow-md transition-all">
                                <div class="flex flex-col sm:flex-row items-start sm:items-center gap-5 flex-1">
                                    <div class="w-full sm:w-40 h-28 rounded-xl overflow-hidden bg-slate-100 shrink-0 border border-slate-200">
                                        <img src="{{ asset($img) }}" alt="{{ $enrollment->program_name }}" class="w-full h-full object-cover">
                                    </div>
                                    <div class="space-y-2 flex-1">
                                        <div class="flex items-center gap-2">
                                            <span class="bg-[#3cb759] text-white text-[10px] uppercase tracking-wider font-extrabold px-2.5 py-0.5 rounded-md">
                                                {{ $enrollment->status }}
                                            </span>
                                            <span class="text-xs text-slate-400">Terdaftar: {{ $enrollment->created_at->format('d M Y') }}</span>
                                        </div>
                                        <h3 class="text-base sm:text-lg font-bold text-slate-900 leading-snug">
                                            {{ $enrollment->program_name }}
                                        </h3>
                                    </div>
                                </div>
                                <div class="w-full md:w-auto flex justify-end shrink-0">
                                    <a href="{{ $link }}" class="w-full md:w-auto inline-flex items-center justify-center gap-2 bg-[#3cb759] hover:bg-[#329d4c] text-white font-bold text-xs sm:text-sm px-6 py-2.5 rounded-xl transition-all shadow-md">
                                        Mulai Belajar
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="bg-slate-50 border border-dashed border-slate-200 rounded-2xl p-8 text-center space-y-3">
                        <div class="w-12 h-12 bg-blue-50 text-blue-500 rounded-full flex items-center justify-center mx-auto">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                        <p class="text-slate-600 font-semibold text-sm">Anda belum mendaftar program pelatihan apapun.</p>
                        <p class="text-slate-400 text-xs max-w-sm mx-auto">Pilih salah satu program pelatihan di bawah ini dan klik tombol "Daftar Sekarang" untuk memulai pembelajaran.</p>
                    </div>
                @endif
            </div>

            <!-- 4. PELATIHAN TERBARU SECTION -->
            <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 sm:p-8 space-y-6">

                <!-- Section Header -->
                <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                    <div>
                        <h2 class="text-xl font-extrabold text-slate-900 tracking-tight">Pelatihan Terbaru</h2>
                        <p class="text-slate-500 text-xs sm:text-sm font-normal mt-0.5">Program pelatihan yang tersedia untuk Anda.</p>
                    </div>
                    <a href="{{ url('/#program') }}" class="text-[#2b54f5] hover:text-[#1a42d6] font-bold text-sm inline-flex items-center gap-1 transition-colors">
                        Lihat Semua
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </a>
                </div>

                <!-- Training List Cards -->
                <div class="space-y-4">

                    @foreach($recentTrainings as $training)
                    <div class="border border-slate-100 rounded-2xl p-4 sm:p-5 flex flex-col md:flex-row items-start md:items-center justify-between gap-6 hover:border-slate-200 hover:shadow-sm transition-all">
                        <!-- Left Section: Thumbnail & Info -->
                        <div class="flex flex-col sm:flex-row items-start sm:items-center gap-5 flex-1">
                            <!-- Image Thumbnail -->
                            <div class="w-full sm:w-48 h-32 rounded-xl overflow-hidden bg-slate-100 shrink-0 border border-slate-100">
                                <img src="{{ asset($training['image']) }}" alt="{{ $training['title'] }}" class="w-full h-full object-cover">
                            </div>

                            <!-- Course Info -->
                            <div class="space-y-1.5 flex-1">
                                <span class="inline-block bg-[#eef3ff] text-[#2b54f5] text-xs font-semibold px-2.5 py-0.5 rounded-md">
                                    {{ $training['category'] }}
                                </span>
                                <h3 class="text-base sm:text-lg font-bold text-slate-900 leading-snug">
                                    {{ $training['title'] }}
                                </h3>
                                <p class="text-slate-500 text-xs sm:text-sm leading-relaxed max-w-xl font-normal">
                                    {{ $training['description'] }}
                                </p>
                            </div>
                        </div>

                        <!-- Right Section: Action Button -->
                        <div class="w-full md:w-auto flex justify-end shrink-0">
                            <a href="{{ $training['link'] }}" class="w-full md:w-auto inline-flex items-center justify-center gap-2 border-2 border-[#2b54f5] text-[#2b54f5] hover:bg-[#2b54f5] hover:text-white font-bold text-xs sm:text-sm px-5 py-2.5 rounded-xl transition-all shadow-sm">
                                Lihat Detail
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                    @endforeach

                </div>

            </div>

        </main>

    </div>

</body>
</html>
