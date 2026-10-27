<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin Dashboard') - CV. SMARTPLUS INDONESIA</title>

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Vite / Tailwind CSS -->
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
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-white text-slate-800 antialiased min-h-screen flex flex-col">

    <!-- TOP NAVBAR FOR ADMIN (WHITE THEME) -->
    <nav class="fixed top-0 left-0 right-0 z-50 bg-white border-b border-slate-200 text-slate-800 h-16 flex items-center justify-between px-6 shadow-sm">
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2">
                <span class="bg-[#3cb759] text-white font-black text-sm px-2.5 py-1 rounded-lg">SP</span>
                <span class="font-extrabold text-base tracking-tight text-slate-900">SMARTPLUS <span class="text-[#3cb759] font-bold text-xs uppercase px-1.5 py-0.5 bg-emerald-50 rounded border border-emerald-200">ADMIN</span></span>
            </a>
        </div>

        <div class="flex items-center gap-4">
            <div class="flex items-center gap-3 border-r border-slate-200 pr-4">
                <div class="w-8 h-8 rounded-full bg-emerald-100 text-[#3cb759] font-extrabold flex items-center justify-center text-xs border border-emerald-200">
                    {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
                </div>
                <div class="hidden sm:block">
                    <p class="text-xs font-bold text-slate-800 leading-tight">{{ auth()->user()->name }}</p>
                    <p class="text-[10px] text-[#3cb759] font-bold uppercase tracking-wider">Administrator</p>
                </div>
            </div>

            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('admin-logout-form').submit();" class="text-xs font-semibold text-slate-500 hover:text-red-600 transition-colors flex items-center gap-1.5 bg-slate-50 hover:bg-red-50 px-3 py-1.5 rounded-lg border border-slate-200 hover:border-red-200">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                </svg>
                Keluar
            </a>
            <form id="admin-logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                @csrf
            </form>
        </div>
    </nav>

    <!-- ADMIN CONTAINER WITH SIDEBAR & CONTENT (WHITE THEME) -->
    <div class="flex-1 flex flex-col md:flex-row w-full pt-16 min-h-screen">

        <!-- SIDEBAR (WHITE THEME) -->
        <aside class="w-full md:w-64 bg-white border-b md:border-b-0 md:border-r border-slate-200/80 text-slate-700 p-4 shrink-0 shadow-sm md:sticky md:top-16 md:h-[calc(100vh-4rem)] md:overflow-y-auto">
            <div class="flex md:flex-col overflow-x-auto md:overflow-visible gap-4 md:gap-0 md:space-y-4 whitespace-nowrap pb-1 md:pb-0">
                
                <!-- NAVIGASI UTAMA -->
                <div class="space-y-1 shrink-0">
                    <div class="px-3 py-1 text-[10px] font-extrabold text-slate-400 uppercase tracking-wider">Navigasi Utama</div>

                    <!-- Dashboard -->
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl font-bold text-xs transition-all {{ request()->routeIs('admin.dashboard') ? 'bg-[#e8f7ec] text-[#3cb759] border border-emerald-200 shadow-xs' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-50' }}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                        </svg>
                        Dashboard
                    </a>
                </div>

                <!-- MANAJEMEN PELATIHAN -->
                <div class="space-y-1 shrink-0 md:pt-2 md:border-t border-slate-100">
                    <div class="px-3 py-1 text-[10px] font-extrabold text-slate-400 uppercase tracking-wider">Manajemen Pelatihan</div>

                    <!-- Program Pelatihan -->
                    <a href="{{ route('admin.programs.index') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl font-bold text-xs transition-all {{ request()->routeIs('admin.programs*') && !request()->routeIs('admin.syllabuses*') ? 'bg-[#e8f7ec] text-[#3cb759] border border-emerald-200 shadow-xs' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-50' }}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                        Program Pelatihan
                    </a>

                    <!-- Silabus Pelatihan -->
                    <a href="{{ route('admin.syllabuses.index') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl font-bold text-xs transition-all {{ request()->routeIs('admin.syllabuses*') ? 'bg-[#e8f7ec] text-[#3cb759] border border-emerald-200 shadow-xs' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-50' }}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                        Silabus Pelatihan
                    </a>

                    <!-- Jadwal Pelatihan -->
                    <a href="{{ route('admin.schedules.index') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl font-bold text-xs transition-all {{ request()->routeIs('admin.schedules*') ? 'bg-[#e8f7ec] text-[#3cb759] border border-emerald-200 shadow-xs' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-50' }}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        Jadwal Pelatihan
                    </a>
                </div>

                <!-- MANAJEMEN PESERTA -->
                <div class="space-y-1 shrink-0 md:pt-2 md:border-t border-slate-100">
                    <div class="px-3 py-1 text-[10px] font-extrabold text-slate-400 uppercase tracking-wider">Manajemen Peserta</div>

                    <!-- Pendaftaran Pelatihan -->
                    <a href="{{ route('admin.enrollments') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl font-bold text-xs transition-all {{ request()->routeIs('admin.enrollments*') ? 'bg-[#e8f7ec] text-[#3cb759] border border-emerald-200 shadow-xs' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-50' }}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                        </svg>
                        Pendaftaran
                    </a>

                    <!-- Data Peserta -->
                    <a href="{{ route('admin.users') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl font-bold text-xs transition-all {{ request()->routeIs('admin.users*') ? 'bg-[#e8f7ec] text-[#3cb759] border border-emerald-200 shadow-xs' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-50' }}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                        Peserta
                    </a>

                    <!-- Sertifikat Pelatihan -->
                    <a href="{{ route('admin.certificates.index') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl font-bold text-xs transition-all {{ request()->routeIs('admin.certificates*') ? 'bg-[#e8f7ec] text-[#3cb759] border border-emerald-200 shadow-xs' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-50' }}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                        </svg>
                        Sertifikat
                    </a>
                </div>

                <!-- MANAJEMEN KONTEN -->
                <div class="space-y-1 shrink-0 md:pt-2 md:border-t border-slate-100">
                    <div class="px-3 py-1 text-[10px] font-extrabold text-slate-400 uppercase tracking-wider">Manajemen Konten</div>

                    <!-- Artikel -->
                    <a href="{{ route('admin.articles.index') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl font-bold text-xs transition-all {{ request()->routeIs('admin.articles*') ? 'bg-[#e8f7ec] text-[#3cb759] border border-emerald-200 shadow-xs' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-50' }}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                        </svg>
                        Artikel & Blog
                    </a>
                </div>

            </div>
        </aside>

        <!-- MAIN CONTENT AREA -->
        <main class="flex-1 p-6 sm:p-8 space-y-6 max-w-7xl bg-[#f8fafc] overflow-x-hidden">
            <!-- Flash Session Messages -->
            @if(session('success'))
                <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3 rounded-2xl flex items-center gap-3 shadow-sm">
                    <svg class="w-5 h-5 text-[#3cb759] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <p class="text-xs font-semibold">{{ session('success') }}</p>
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-2xl flex items-center gap-3 shadow-sm">
                    <svg class="w-5 h-5 text-red-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <p class="text-xs font-semibold">{{ session('error') }}</p>
                </div>
            @endif

            @yield('content')
        </main>

    </div>

</body>
</html>
