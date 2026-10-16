<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jadwal Pelatihan - CV. SMARTPLUS INDONESIA</title>

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

        <!-- LEFT SIDEBAR PANEL (FIXED/STICKY) -->
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

                <!-- Jadwal Pelatihan Item (Active) -->
                <a href="{{ route('schedules') }}" class="flex items-center gap-3.5 px-4 py-3 bg-[#e8f0fe] text-[#2b54f5] font-bold rounded-xl transition-all shrink-0 text-xs sm:text-sm">
                    <svg class="w-5 h-5 text-[#2b54f5]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <span>Jadwal Pelatihan</span>
                </a>

                <!-- Sertifikat Item -->
                <a href="{{ route('certificates') }}" class="flex items-center gap-3.5 px-4 py-3 {{ request()->routeIs('certificates*') ? 'bg-[#e8f0fe] text-[#2b54f5] font-bold' : 'text-slate-500 hover:text-slate-900 hover:bg-slate-50 font-medium' }} rounded-xl transition-colors shrink-0 text-xs sm:text-sm">
                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138z"></path>
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

            <!-- PAGE HEADER BANNER -->
            <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 sm:p-8">
                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                    <div class="space-y-1">
                        <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight flex items-center gap-2.5">
                            <span class="bg-[#2b54f5] text-white p-2 rounded-xl text-lg shadow-sm">📅</span>
                            Jadwal Pelatihan Saya
                        </h1>
                        <p class="text-slate-500 text-xs sm:text-sm font-normal">
                            Pilih program pelatihan Anda di bawah untuk melihat jadwal kelas dan link pertemuan online
                        </p>
                    </div>

                    <div class="bg-blue-50 border border-blue-100 rounded-xl px-4 py-2.5 text-xs font-bold text-[#2b54f5] shrink-0">
                        🎓 {{ count($enrollments) }} Program Diikuti
                    </div>
                </div>
            </div>

            @if(count($programs) > 0)
                <!-- PROGRAM SELECTOR TABS -->
                <div class="space-y-2">
                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider px-1">Pilih Program Pelatihan:</label>
                    <div class="flex items-center gap-3 overflow-x-auto pb-1 no-scrollbar">
                        @foreach($programs as $index => $program)
                            <button type="button" 
                                    onclick="switchProgramTab('program-{{ $program->id }}')" 
                                    id="tab-btn-program-{{ $program->id }}"
                                    class="tab-btn flex items-center gap-3 px-5 py-3 rounded-2xl font-bold text-xs sm:text-sm transition-all whitespace-nowrap border cursor-pointer {{ $index === 0 ? 'bg-[#2b54f5] text-white border-[#2b54f5] shadow-md' : 'bg-white text-slate-700 border-slate-200 hover:bg-slate-50 hover:border-slate-300' }}">
                                <span class="w-2.5 h-2.5 rounded-full {{ $index === 0 ? 'bg-emerald-400' : 'bg-slate-300' }} inline-block"></span>
                                <span>{{ $program->name }}</span>
                                <span class="px-2 py-0.5 rounded-lg text-[11px] {{ $index === 0 ? 'bg-white/20 text-white' : 'bg-slate-100 text-slate-600' }}">
                                    {{ count($program->schedules) }} Sesi
                                </span>
                            </button>
                        @endforeach
                    </div>
                </div>

                <!-- DEDICATED PROGRAM CARD BOX CONTAINERS -->
                <div class="space-y-6">
                    @foreach($programs as $index => $program)
                        @php
                            $img = $program->image ?: 'images/AssetsIOT.png';
                            if (!$program->image) {
                                if($program->slug === 'agentik-ai') {
                                    $img = 'images/AssetsN8N.png';
                                } elseif($program->slug === 'industrial-iot') {
                                    $img = 'images/industrial-IoT.png';
                                }
                            }
                        @endphp

                        <div id="program-group-program-{{ $program->id }}" class="program-group space-y-6 {{ $index !== 0 ? 'hidden' : '' }}">
                            
                            <!-- PROGRAM CARD BOX HEADER BANNER -->
                            <div class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-sm flex flex-col sm:flex-row items-start sm:items-center justify-between gap-5">
                                <div class="flex items-center gap-4">
                                    <div class="w-16 h-16 rounded-2xl overflow-hidden bg-slate-100 shrink-0 border border-slate-200 shadow-xs">
                                        <img src="{{ asset($img) }}" alt="{{ $program->name }}" class="w-full h-full object-cover">
                                    </div>
                                    <div class="space-y-1">
                                        <div class="flex items-center gap-2">
                                            <span class="bg-[#3cb759] text-white text-[10px] font-black uppercase px-2.5 py-0.5 rounded-md tracking-wider">
                                                {{ $program->category }}
                                            </span>
                                            <span class="text-xs text-emerald-600 font-bold bg-emerald-50 px-2 py-0.5 rounded-md border border-emerald-200">
                                                Status: Terdaftar
                                            </span>
                                        </div>
                                        <h2 class="text-lg sm:text-xl font-extrabold tracking-tight text-slate-900">
                                            {{ $program->name }}
                                        </h2>
                                    </div>
                                </div>

                                <div class="shrink-0 bg-blue-50 border border-blue-100 px-4 py-2.5 rounded-xl text-xs font-bold text-[#2b54f5]">
                                    📋 Total {{ count($program->schedules) }} Sesi Terjadwal
                                </div>
                            </div>

                            <!-- SESSION CARD BOXES GRID -->
                            @if(count($program->schedules) > 0)
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                    @foreach($program->schedules as $sIdx => $schedule)
                                        @php
                                            $currStatus = $schedule->status;
                                            $statusBadge = 'bg-blue-50 text-blue-700 border-blue-200';
                                            $statusLabel = 'Mendatang';

                                            if ($currStatus === 'berlangsung') {
                                                $statusBadge = 'bg-amber-50 text-amber-700 border-amber-200 animate-pulse';
                                                $statusLabel = 'Berlangsung';
                                            } elseif ($currStatus === 'selesai') {
                                                $statusBadge = 'bg-slate-100 text-slate-600 border-slate-200';
                                                $statusLabel = 'Selesai';
                                            }
                                        @endphp

                                        <!-- SINGLE SESSION CARD BOX -->
                                        <div class="bg-white rounded-2xl border border-slate-200/80 p-6 space-y-4 shadow-sm hover:shadow-md hover:border-blue-200 transition-all flex flex-col justify-between">
                                            
                                            <div class="space-y-4">
                                                <!-- Top Row: Date, Sesi # & Status -->
                                                <div class="flex items-center justify-between gap-3 pb-3 border-b border-slate-100">
                                                    <div class="flex items-center gap-3">
                                                        <!-- Big Date Box -->
                                                        <div class="w-12 h-12 rounded-xl bg-blue-50 border border-blue-100 text-[#2b54f5] flex flex-col items-center justify-center shrink-0">
                                                            <span class="text-[9px] uppercase font-extrabold tracking-wider leading-none">{{ \Carbon\Carbon::parse($schedule->date)->translatedFormat('M') }}</span>
                                                            <span class="text-base font-black leading-none mt-0.5">{{ \Carbon\Carbon::parse($schedule->date)->format('d') }}</span>
                                                        </div>
                                                        <div>
                                                            <span class="bg-slate-900 text-white text-[10px] font-extrabold px-2 py-0.5 rounded-md">
                                                                Sesi #{{ $sIdx + 1 }}
                                                            </span>
                                                            <p class="text-[11px] font-bold text-slate-400 mt-0.5">
                                                                {{ \Carbon\Carbon::parse($schedule->date)->translatedFormat('l, d F Y') }}
                                                            </p>
                                                        </div>
                                                    </div>

                                                    <span class="{{ $statusBadge }} text-[10px] font-extrabold px-2.5 py-1 rounded-full border uppercase tracking-wider shrink-0">
                                                        {{ $statusLabel }}
                                                    </span>
                                                </div>

                                                <!-- Session Title -->
                                                <h3 class="text-base font-bold text-slate-900 leading-snug">
                                                    {{ $schedule->title }}
                                                </h3>

                                                <!-- Session Metadata Grid -->
                                                <div class="space-y-2 text-xs text-slate-600 bg-slate-50 p-3.5 rounded-xl border border-slate-100">
                                                    <div class="flex items-center gap-2">
                                                        <svg class="w-4 h-4 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                        </svg>
                                                        <span>Waktu: <strong class="text-slate-800">{{ \Carbon\Carbon::parse($schedule->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($schedule->end_time)->format('H:i') }} WIB</strong></span>
                                                    </div>

                                                    @php
                                                        $isOnlineLoc = str_contains(strtolower($schedule->location), 'online') || str_contains(strtolower($schedule->location), 'http') || filter_var($schedule->location, FILTER_VALIDATE_URL);
                                                    @endphp
                                                    <div class="flex items-center gap-2">
                                                        @if($isOnlineLoc)
                                                            <svg class="w-4 h-4 text-blue-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                                            </svg>
                                                            <div class="flex items-center gap-1.5 flex-wrap">
                                                                <span class="inline-flex items-center gap-1 bg-blue-50 text-blue-700 border border-blue-200/80 px-2.5 py-0.5 rounded-md font-extrabold text-[10px]">
                                                                    <span class="w-1.5 h-1.5 rounded-full bg-blue-500 animate-pulse"></span>
                                                                    Kelas Online (Google Meet / Zoom)
                                                                </span>
                                                            </div>
                                                        @else
                                                            <svg class="w-4 h-4 text-purple-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                            </svg>
                                                            <span class="truncate">Lokasi: <strong class="text-slate-800" title="{{ $schedule->location }}">{{ $schedule->location }}</strong></span>
                                                        @endif
                                                    </div>

                                                    @if($schedule->speaker)
                                                        <div class="flex items-center gap-2">
                                                            <svg class="w-4 h-4 text-blue-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                                            </svg>
                                                            <span>Pemateri: <strong class="text-[#2b54f5]">{{ $schedule->speaker }}</strong></span>
                                                        </div>
                                                    @endif
                                                </div>

                                                <!-- Description -->
                                                @if($schedule->description)
                                                    <p class="text-xs text-slate-500 leading-relaxed">
                                                        {{ $schedule->description }}
                                                    </p>
                                                @endif
                                            </div>

                                            <!-- Card Action Footer -->
                                            @if(filter_var($schedule->location, FILTER_VALIDATE_URL) || str_contains(strtolower($schedule->location), 'http'))
                                                <div class="pt-4 border-t border-slate-100 mt-2">
                                                    @if($currStatus === 'selesai')
                                                        <div class="w-full flex items-center justify-center gap-2 bg-slate-100 text-slate-500 font-semibold text-xs px-4 py-2.5 rounded-xl border border-slate-200">
                                                            <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                            </svg>
                                                            <span>Sesi Pelatihan Telah Selesai</span>
                                                        </div>
                                                    @elseif($currStatus === 'berlangsung')
                                                        <a href="{{ $schedule->location }}" target="_blank" class="w-full flex items-center justify-center gap-2 bg-amber-500 hover:bg-amber-600 text-white font-bold text-xs px-4 py-2.5 rounded-xl transition-all shadow-md shadow-amber-500/20 active:scale-[0.99] animate-pulse">
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                                            </svg>
                                                            🔥 Join Kelas Online (Sedang Berlangsung)
                                                        </a>
                                                    @else
                                                        <a href="{{ $schedule->location }}" target="_blank" class="w-full flex items-center justify-center gap-2 bg-[#3cb759] hover:bg-[#329d4c] text-white font-bold text-xs px-4 py-2.5 rounded-xl transition-all shadow-sm hover:shadow active:scale-[0.99]">
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                                            </svg>
                                                            Join Kelas Online (Meeting)
                                                        </a>
                                                    @endif
                                                </div>
                                            @endif

                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <!-- EMPTY SCHEDULE FOR THIS PROGRAM -->
                                <div class="bg-white rounded-2xl border border-dashed border-slate-200 p-10 text-center space-y-3">
                                    <div class="w-12 h-12 bg-blue-50 text-blue-500 rounded-full flex items-center justify-center mx-auto">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                    <h3 class="text-slate-800 font-bold text-sm">Belum Ada Sesi Pelatihan</h3>
                                    <p class="text-slate-400 text-xs max-w-md mx-auto leading-relaxed">
                                        Jadwal sesi kelas untuk program <strong>{{ $program->name }}</strong> belum dipublikasikan oleh instruktur. Silakan periksa kembali secara berkala.
                                    </p>
                                </div>
                            @endif

                        </div>
                    @endforeach
                </div>
            @else
                <!-- UNENROLLED EMPTY STATE -->
                <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-10 text-center space-y-3">
                    <div class="w-14 h-14 bg-blue-50 text-blue-500 rounded-full flex items-center justify-center mx-auto">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-slate-800 font-bold text-base">Anda Belum Terdaftar Pada Program Pelatihan</h3>
                    <p class="text-slate-500 text-xs max-w-md mx-auto leading-relaxed">
                        Silakan mendaftar salah satu program pelatihan terlebih dahulu untuk melihat jadwal kelas Anda.
                    </p>
                    <div class="pt-2">
                        <a href="{{ url('/#program') }}" class="inline-flex items-center gap-2 bg-[#2b54f5] hover:bg-[#1a42d6] text-white font-bold text-xs px-5 py-2.5 rounded-xl transition-all shadow-md">
                            Pilih Program Pelatihan
                        </a>
                    </div>
                </div>
            @endif

        </main>

    </div>

    <!-- TAB FILTER SCRIPT -->
    <script>
        function switchProgramTab(targetId) {
            // Update Tab Buttons Styling
            const buttons = document.querySelectorAll('.tab-btn');
            buttons.forEach(btn => {
                btn.classList.remove('bg-[#2b54f5]', 'text-white', 'border-[#2b54f5]', 'shadow-md');
                btn.classList.add('bg-white', 'text-slate-700', 'border-slate-200');
                const dot = btn.querySelector('span:first-child');
                if (dot) {
                    dot.classList.remove('bg-emerald-400');
                    dot.classList.add('bg-slate-300');
                }
                const chip = btn.querySelector('span:last-child');
                if (chip) {
                    chip.classList.remove('bg-white/20', 'text-white');
                    chip.classList.add('bg-slate-100', 'text-slate-600');
                }
            });

            const activeBtn = document.getElementById('tab-btn-' + targetId);
            if (activeBtn) {
                activeBtn.classList.remove('bg-white', 'text-slate-700', 'border-slate-200');
                activeBtn.classList.add('bg-[#2b54f5]', 'text-white', 'border-[#2b54f5]', 'shadow-md');
                const dot = activeBtn.querySelector('span:first-child');
                if (dot) {
                    dot.classList.remove('bg-slate-300');
                    dot.classList.add('bg-emerald-400');
                }
                const chip = activeBtn.querySelector('span:last-child');
                if (chip) {
                    chip.classList.remove('bg-slate-100', 'text-slate-600');
                    chip.classList.add('bg-white/20', 'text-white');
                }
            }

            // Update Program Group Visibility
            const groups = document.querySelectorAll('.program-group');
            groups.forEach(group => {
                if (group.id === 'program-group-' + targetId) {
                    group.classList.remove('hidden');
                } else {
                    group.classList.add('hidden');
                }
            });
        }
    </script>

</body>
</html>
