<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth scroll-pt-20">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CV. SMARTPLUS INDONESIA - Pelatihan Teknologi IoT & AI</title>

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
                                darkblue: '#2b50d8',
                                green: '#3cb759',
                                darkgreen: '#329d4c',
                                badge: '#dce4fe',
                                bglight: '#f8f9fe',
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

    <div class="relative bg-gradient-to-b from-[#2d5bf0] via-[#4873f7]/85 to-white pb-12 sm:pb-20 pt-20 overflow-hidden">

       @include('partials.navbar')

        <!-- HERO MAIN CONTENT -->
        <section id="home" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-6 sm:pt-10 lg:pt-16 pb-8 sm:pb-12">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">

                <!-- Hero Text Left -->
                <div class="lg:col-span-6 text-center lg:text-left space-y-4 sm:space-y-6">
                    <!-- Badge -->
                    <div class="inline-block">
                        <span class="bg-white/20 border border-white/30 text-white font-medium text-xs sm:text-sm px-3.5 py-1.5 rounded-full backdrop-blur-md shadow-sm">
                            Pelatihan & Sertifikasi
                        </span>
                    </div>

                    <!-- Title -->
                    <h1 class="text-2xl sm:text-4xl lg:text-5xl font-extrabold text-slate-900 tracking-tight leading-tight sm:leading-tight">
                        Pelatihan Teknologi <br class="hidden sm:inline" />
                        <span class="text-[#3cb759] font-black">IoT & AI</span>
                    </h1>

                    <!-- Subtitle -->
                    <p class="text-slate-600 text-sm sm:text-lg max-w-xl mx-auto lg:mx-0 font-normal leading-relaxed">
                        Membangun Pemahaman dan kompetensi teknologi IoT dan AI melalui pembelajaran yang relevan
                    </p>

                    <!-- CTA Button -->
                    <div class="pt-2">
                        <a href="#program" class="w-full sm:w-auto inline-flex items-center justify-center bg-[#3cb759] hover:bg-[#329d4c] text-white font-bold px-8 py-3.5 rounded-xl shadow-lg shadow-green-500/20 hover:shadow-green-500/30 transition-all duration-200 transform hover:-translate-y-0.5 text-sm sm:text-base">
                            Pelajari Program
                        </a>
                    </div>
                </div>

                <!-- Hero Graphic Right -->
                <div class="lg:col-span-6 flex justify-center relative mt-4 lg:mt-0">
                    <div class="relative w-full max-w-md lg:max-w-none">
                        <!-- Background glow effect -->
                        <div class="absolute -inset-1 bg-gradient-to-r from-blue-400 to-green-400 rounded-3xl blur-2xl opacity-20 animate-pulse"></div>

                        @if(file_exists(public_path('images/assets1.png')))
                            <img src="{{ asset('images/assets1.png') }}" alt="IoT & AI Training Illustration" class="relative rounded-2xl w-full h-auto max-h-[360px] sm:max-h-[420px] object-contain drop-shadow-xl mx-auto">
                        @else
                            <!-- Fallback Vector Graphics Component -->
                            <div class="relative bg-white/90 backdrop-blur-md p-5 sm:p-8 rounded-3xl border border-white/60 shadow-2xl overflow-hidden">
                                <div class="flex items-center justify-between mb-4 sm:mb-6">
                                    <div class="flex items-center space-x-2">
                                        <div class="w-3 h-3 rounded-full bg-red-400"></div>
                                        <div class="w-3 h-3 rounded-full bg-yellow-400"></div>
                                        <div class="w-3 h-3 rounded-full bg-green-400"></div>
                                    </div>
                                    <span class="text-[10px] sm:text-xs font-semibold text-blue-600 bg-blue-50 px-2.5 py-1 rounded-full border border-blue-100">Smartplus AI & IoT System</span>
                                </div>

                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4 my-4">
                                    <div class="bg-gradient-to-br from-blue-500 to-indigo-600 p-4 sm:p-5 rounded-2xl text-white shadow-lg flex flex-col justify-between">
                                        <div class="flex justify-between items-start">
                                            <span class="text-[10px] uppercase tracking-wider font-semibold opacity-80">AI Model</span>
                                            <span class="bg-white/20 p-1.5 rounded-xl backdrop-blur-sm">
                                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path></svg>
                                            </span>
                                        </div>
                                        <div class="mt-4 sm:mt-6">
                                            <h4 class="text-base sm:text-xl font-bold">Agentic N8N</h4>
                                            <p class="text-[10px] sm:text-xs text-blue-100 mt-0.5">Autonomous Workflows</p>
                                        </div>
                                    </div>

                                    <div class="bg-gradient-to-br from-emerald-500 to-teal-600 p-4 sm:p-5 rounded-2xl text-white shadow-lg flex flex-col justify-between">
                                        <div class="flex justify-between items-start">
                                            <span class="text-[10px] uppercase tracking-wider font-semibold opacity-80">Hardware</span>
                                            <span class="bg-white/20 p-1.5 rounded-xl backdrop-blur-sm">
                                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path></svg>
                                            </span>
                                        </div>
                                        <div class="mt-4 sm:mt-6">
                                            <h4 class="text-base sm:text-xl font-bold">ESP32 & IIoT</h4>
                                            <p class="text-[10px] sm:text-xs text-emerald-100 mt-0.5">Sensors & Cloud Sync</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Floating Badge -->
                                <div class="bg-slate-900 text-white p-3.5 sm:p-4 rounded-2xl shadow-xl flex items-center gap-3 sm:gap-4 border border-slate-800">
                                    <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-full bg-[#3cb759] flex items-center justify-center shrink-0 font-bold text-xs sm:text-base">
                                        ✓
                                    </div>
                                    <div class="min-w-0">
                                        <h5 class="text-xs sm:text-sm font-bold truncate">Kurikulum Industri Ready</h5>
                                        <p class="text-[10px] sm:text-xs text-slate-400 truncate">Pembelajaran Berbasis Proyek Nyata</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

            </div>
        </section>
    </div>

    <!-- SECTION 2: TENTANG KAMI -->
    <section id="about" class="py-12 sm:py-16 lg:py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">

                <!-- Left Illustration -->
                <div class="lg:col-span-5 flex justify-center">
                    <div class="relative w-full max-w-xs sm:max-w-md">
                        <!-- Custom vector SVG for About section -->
                        <div class="bg-emerald-50 rounded-3xl p-5 sm:p-8 border border-emerald-100 shadow-sm text-center relative overflow-hidden">
                            <div class="w-full max-w-[240px] sm:max-w-[280px] mx-auto bg-white rounded-2xl p-5 sm:p-6 shadow-xl border border-slate-100 space-y-4">
                                <!-- User Icon Circle -->
                                <div class="w-16 h-16 sm:w-20 sm:h-20 bg-emerald-100 rounded-full mx-auto flex items-center justify-center text-emerald-600">
                                    <svg class="w-8 h-8 sm:w-10 sm:h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                                <!-- Dots password placeholder -->
                                <div class="flex justify-center space-x-2 py-1.5">
                                    <span class="w-2.5 h-2.5 bg-slate-300 rounded-full"></span>
                                    <span class="w-2.5 h-2.5 bg-slate-300 rounded-full"></span>
                                    <span class="w-2.5 h-2.5 bg-slate-300 rounded-full"></span>
                                    <span class="w-2.5 h-2.5 bg-slate-300 rounded-full"></span>
                                </div>
                                <div class="bg-[#3cb759] text-white py-2 rounded-lg font-semibold text-xs shadow-md">
                                    System Verification
                                </div>
                            </div>

                            <!-- Decorative Green Figures -->
                            <div class="mt-5 sm:mt-6 flex flex-wrap justify-center sm:justify-around items-center gap-2 opacity-80">
                                <span class="inline-flex items-center gap-1 text-[10px] sm:text-xs font-semibold text-emerald-700 bg-white px-2.5 py-1 rounded-full shadow-sm">
                                    <span class="w-2 h-2 rounded-full bg-emerald-500"></span> User Access
                                </span>
                                <span class="inline-flex items-center gap-1 text-[10px] sm:text-xs font-semibold text-emerald-700 bg-white px-2.5 py-1 rounded-full shadow-sm">
                                    <span class="w-2 h-2 rounded-full bg-blue-500"></span> AI Security
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Text -->
                <div class="lg:col-span-7 space-y-4 sm:space-y-6 text-center lg:text-left">
                    <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-900 tracking-tight">
                        Tentang Kami
                    </h2>

                    <p class="text-slate-600 text-sm sm:text-lg leading-relaxed font-normal">
                        IoT merupakan teknologi yang saling menghubungkan berbagai perangkat untuk mengumpulkan dan bertukar data, sedangkan AI merupakan teknologi yang memungkinkan komputer mempelajari data dan membantu menyelesaikan berbagai tugas secara cerdas. Melalui pelatihan ini, peserta dapat memahami dasar hingga perkembangan teknologi IoT dan AI secara terarah dan praktis.
                    </p>

                    <div class="pt-2">
                        <a href="#program" class="w-full sm:w-auto inline-flex items-center justify-center bg-[#3cb759] hover:bg-[#329d4c] text-white font-bold px-7 py-3 rounded-xl shadow-md transition-all text-sm sm:text-base">
                            Pelajari Lebih Lanjut
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- SECTION 3: MENGAPA MEMILIH KAMI -->
    <section class="py-12 sm:py-16 lg:py-24 bg-slate-50/70 border-y border-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Section Title -->
            <div class="text-center max-w-3xl mx-auto mb-10 sm:mb-16 space-y-2 sm:space-y-3">
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-900 tracking-tight">
                    Mengapa Memilih Kami
                </h2>
                <p class="text-slate-600 text-sm sm:text-lg font-normal">
                    Kami berkomitmen untuk memberikan pelatihan terbaik dengan metode pembelajaran yang efektif dan aplikatif
                </p>
            </div>

            <!-- 3 Feature Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 sm:gap-8">

                <!-- Feature 1 -->
                <div class="bg-white p-6 sm:p-8 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition-shadow text-center space-y-4">
                    <div class="w-12 h-12 sm:w-14 sm:h-14 bg-emerald-50 rounded-2xl flex items-center justify-center mx-auto text-emerald-600 border border-emerald-100">
                        <svg class="w-6 h-6 sm:w-7 sm:h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 100-6 3 3 0 000 6z"></path>
                        </svg>
                    </div>
                    <h3 class="text-base sm:text-lg font-bold text-slate-900">Instruktur Berpengalaman</h3>
                    <p class="text-slate-500 text-xs sm:text-sm leading-relaxed">
                        Dibimbing oleh praktisi industri dan akademisi
                    </p>
                </div>

                <!-- Feature 2 -->
                <div class="bg-white p-6 sm:p-8 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition-shadow text-center space-y-4">
                    <div class="w-12 h-12 sm:w-14 sm:h-14 bg-emerald-50 rounded-2xl flex items-center justify-center mx-auto text-emerald-600 border border-emerald-100">
                        <svg class="w-6 h-6 sm:w-7 sm:h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-base sm:text-lg font-bold text-slate-900">Materi Up to Date</h3>
                    <p class="text-slate-500 text-xs sm:text-sm leading-relaxed">
                        Selalu mengikuti perkembangan teknologi terbaru
                    </p>
                </div>

                <!-- Feature 3 -->
                <div class="bg-white p-6 sm:p-8 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition-shadow text-center space-y-4">
                    <div class="w-12 h-12 sm:w-14 sm:h-14 bg-emerald-50 rounded-2xl flex items-center justify-center mx-auto text-emerald-600 border border-emerald-100">
                        <svg class="w-6 h-6 sm:w-7 sm:h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                        </svg>
                    </div>
                    <h3 class="text-base sm:text-lg font-bold text-slate-900">Praktik Langsung</h3>
                    <p class="text-slate-500 text-xs sm:text-sm leading-relaxed">
                        Belajar dengan studi kasus nyata dan proyek hands-on
                    </p>
                </div>

            </div>

        </div>
    </section>

    <!-- SECTION 4: PROGRAM PELATIHAN -->
    <section id="program" class="py-12 sm:py-16 lg:py-24 bg-[#f8f9fe]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Header Badge & Title -->
            <div class="text-center max-w-3xl mx-auto mb-10 sm:mb-16 space-y-3 sm:space-y-4">
                <div class="inline-block">
                    <span class="bg-[#dce4fe] text-[#3b66f5] font-semibold text-xs sm:text-sm px-4 py-1.5 rounded-full">
                        Program Pelatihan
                    </span>
                </div>
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-900 tracking-tight">
                    Pelatihan IoT & AI untuk Masa Depan Anda
                </h2>
                <p class="text-slate-600 text-sm sm:text-lg font-normal">
                    Pilih program yang sesuai dengan kebutuhan dan level kemampuan anda, Mulai dasar hingga Mahir
                </p>
            </div>

            <!-- 3 Program Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 sm:gap-8">

                <!-- Program Card 1 -->
                <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between space-y-6">
                    <div class="space-y-4">
                        <div class="h-40 sm:h-44 overflow-hidden rounded-2xl bg-slate-100 mb-4 border border-slate-100">
                            <img src="{{ asset('images/AssetsN8N.png') }}" alt="Agentik AI N8N" class="w-full h-full object-cover">
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center border border-blue-100 shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg sm:text-xl font-bold text-slate-900">Agentik AI N8N</h3>
                        </div>

                        <p class="text-slate-500 text-xs sm:text-sm leading-relaxed">
                            Solusi otomasi berbasis AI, n8n untuk menghubungkan berbagai sistem, mengelola workflow, dan menjalankan tugas secara otomatis.
                        </p>

                        <!-- Checklist -->
                        <ul class="space-y-2 pt-1 text-xs sm:text-sm text-slate-600 font-medium">
                            <li class="flex items-center gap-2">
                                <span class="text-slate-400 text-xs">—</span> Generative AI
                            </li>
                            <li class="flex items-center gap-2">
                                <span class="text-slate-400 text-xs">—</span> Machine Learning
                            </li>
                            <li class="flex items-center gap-2">
                                <span class="text-slate-400 text-xs">—</span> Desain dan Implementasi
                            </li>
                        </ul>
                    </div>

                    <div class="pt-4 border-t border-slate-100 flex items-center justify-between gap-2 flex-wrap sm:flex-nowrap">
                        <a href="{{ url('/program/agentik-ai') }}" class="inline-flex items-center text-slate-500 font-semibold text-xs hover:text-slate-900 transition-colors group">
                            Lihat Detail
                            <svg class="w-3.5 h-3.5 ml-1 transform group-hover:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </a>
                        <a href="{{ route('program.enroll', 'agentik-ai') }}" class="inline-flex items-center bg-[#3cb759] hover:bg-[#329d4c] text-white font-bold text-xs px-4 py-2 rounded-xl shadow-sm hover:shadow transition-all">
                            Daftar Sekarang
                        </a>
                    </div>
                </div>
                
                <!-- Program Card 2 -->
                <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between space-y-6">
                    <div class="space-y-4">
                        <div class="h-40 sm:h-44 overflow-hidden rounded-2xl bg-slate-100 mb-4 border border-slate-100">
                            <img src="{{ asset('images/AssetsIOT.png') }}" alt="IoT Prototype ESP32" class="w-full h-full object-cover">
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center border border-blue-100 shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg sm:text-xl font-bold text-slate-900">IoT Prototype ESP32</h3>
                        </div>
                        <p class="text-slate-500 text-xs sm:text-sm leading-relaxed">
                            Pelatihan Internet of Things meliputi Sensor, Perangkat, Komunikasi dan Implementasi
                        </p>

                        <!-- Checklist -->
                        <ul class="space-y-2 pt-1 text-xs sm:text-sm text-slate-600 font-medium">
                            <li class="flex items-center gap-2">
                                <span class="text-slate-400 text-xs">—</span> Smart IoT
                            </li>
                            <li class="flex items-center gap-2">
                                <span class="text-slate-400 text-xs">—</span> Sensor dan Perangkat
                            </li>
                            <li class="flex items-center gap-2">
                                <span class="text-slate-400 text-xs">—</span> Konektivitas dan Cloud
                            </li>
                        </ul>
                    </div>

                    <div class="pt-4 border-t border-slate-100 flex items-center justify-between gap-2 flex-wrap sm:flex-nowrap">
                        <a href="{{ url('/program/iot-esp32') }}" class="inline-flex items-center text-slate-500 font-semibold text-xs hover:text-slate-900 transition-colors group">
                            Lihat Detail
                            <svg class="w-3.5 h-3.5 ml-1 transform group-hover:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </a>
                        <a href="{{ route('program.enroll', 'iot-esp32') }}" class="inline-flex items-center bg-[#3cb759] hover:bg-[#329d4c] text-white font-bold text-xs px-4 py-2 rounded-xl shadow-sm hover:shadow transition-all">
                            Daftar Sekarang
                        </a>
                    </div>

                </div>

                <!-- Program Card 3 -->
                <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between space-y-6">
                    <div class="space-y-4">
                        <div class="h-40 sm:h-44 overflow-hidden rounded-2xl bg-slate-100 mb-4 border border-slate-100">
                            <img src="{{ asset('images/industrial-IoT.png') }}" alt="IIoT Industrial Internet of Things" class="w-full h-full object-cover">
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center border border-blue-100 shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5m3 0h1m-1-4h.01M9 16h.01M9 12h.01M9 8h.01M15 16h.01M15 12h.01M15 8h.01"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg sm:text-xl font-bold text-slate-900">IIoT Industrial IoT</h3>
                        </div>

                        <p class="text-slate-500 text-xs sm:text-sm leading-relaxed">
                            Solusi IoT untuk kebutuhan industri yang menghubungkan perangkat, sensor, dan sistem untuk mendukung pemantauan
                        </p>

                        <!-- Checklist -->
                        <ul class="space-y-2 pt-1 text-xs sm:text-sm text-slate-600 font-medium">
                            <li class="flex items-center gap-2">
                                <span class="text-slate-400 text-xs">—</span> Sensor & perangkat Industri
                            </li>
                            <li class="flex items-center gap-2">
                                <span class="text-slate-400 text-xs">—</span> ESP32 / perangkat IoT
                            </li>
                            <li class="flex items-center gap-2">
                                <span class="text-slate-400 text-xs">—</span> Monitoring real-time
                            </li>
                        </ul>
                    </div>

                    <div class="pt-4 border-t border-slate-100 flex items-center justify-between gap-2 flex-wrap sm:flex-nowrap">
                        <a href="{{ url('/program/industrial-iot') }}" class="inline-flex items-center text-slate-500 font-semibold text-xs hover:text-slate-900 transition-colors group">
                            Lihat Detail
                            <svg class="w-3.5 h-3.5 ml-1 transform group-hover:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </a>
                        <a href="{{ route('program.enroll', 'industrial-iot') }}" class="inline-flex items-center bg-[#3cb759] hover:bg-[#329d4c] text-white font-bold text-xs px-4 py-2 rounded-xl shadow-sm hover:shadow transition-all">
                            Daftar Sekarang
                        </a>
                    </div>
                </div>

            </div>

            <!-- Bottom Center Button -->
            <div class="text-center mt-10 sm:mt-12">
                <a href="#program" class="w-full sm:w-auto inline-flex items-center justify-center bg-[#dce4fe] hover:bg-[#cbd6fe] text-[#3b66f5] font-semibold px-8 py-3 rounded-full transition-all text-sm sm:text-base">
                    Lihat Semua Program
                </a>
            </div>

        </div>
    </section>

    <!-- SECTION 5: CARA KERJA -->
    <section class="py-12 sm:py-16 lg:py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">

            <!-- Badge & Title -->
            <div class="max-w-3xl mx-auto mb-10 sm:mb-16 space-y-3 sm:space-y-4">
                <div class="inline-block">
                    <span class="bg-[#dce4fe] text-[#3b66f5] font-semibold text-xs sm:text-sm px-4 py-1.5 rounded-full">
                        Cara Kerja
                    </span>
                </div>
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-900 tracking-tight">
                    Mudah, Cepat dan Terarah
                </h2>
            </div>

            <!-- 4 Step Process Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 relative">

                <!-- Step 1 -->
                <div class="flex flex-col items-center space-y-3 sm:space-y-4">
                    <div class="w-14 h-14 sm:w-16 sm:h-16 rounded-full bg-[#3cb759] text-white flex items-center justify-center shadow-lg shadow-green-500/20">
                        <svg class="w-7 h-7 sm:w-8 sm:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-base font-bold text-slate-900">1. Daftar</h3>
                    <p class="text-slate-500 text-xs sm:text-sm max-w-xs leading-relaxed">
                        Isi formulir pendaftaran secara online
                    </p>
                </div>

                <!-- Step 2 -->
                <div class="flex flex-col items-center space-y-3 sm:space-y-4">
                    <div class="w-14 h-14 sm:w-16 sm:h-16 rounded-full bg-[#3b66f5] text-white flex items-center justify-center shadow-lg shadow-blue-500/20">
                        <svg class="w-7 h-7 sm:w-8 sm:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
                        </svg>
                    </div>
                    <h3 class="text-base font-bold text-slate-900">2. Konsultasi</h3>
                    <p class="text-slate-500 text-xs sm:text-sm max-w-xs leading-relaxed">
                        Konsultasikan kebutuhan dan pilihan program
                    </p>
                </div>

                <!-- Step 3 -->
                <div class="flex flex-col items-center space-y-3 sm:space-y-4">
                    <div class="w-14 h-14 sm:w-16 sm:h-16 rounded-full bg-[#3b66f5] text-white flex items-center justify-center shadow-lg shadow-blue-500/20">
                        <svg class="w-7 h-7 sm:w-8 sm:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0112 20.055a11.952 11.952 0 01-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                        </svg>
                    </div>
                    <h3 class="text-base font-bold text-slate-900">3. Ikuti Pelatihan</h3>
                    <p class="text-slate-500 text-xs sm:text-sm max-w-xs leading-relaxed">
                        Ikuti pelatihan IoT & AI dengan sistem yang interaktif
                    </p>
                </div>

                <!-- Step 4 -->
                <div class="flex flex-col items-center space-y-3 sm:space-y-4">
                    <div class="w-14 h-14 sm:w-16 sm:h-16 rounded-full bg-[#3cb759] text-white flex items-center justify-center shadow-lg shadow-green-500/20">
                        <svg class="w-7 h-7 sm:w-8 sm:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                        </svg>
                    </div>
                    <h3 class="text-base font-bold text-slate-900">4. Dapatkan Sertifikat</h3>
                    <p class="text-slate-500 text-xs sm:text-sm max-w-xs leading-relaxed">
                        Dapatkan sertifikat sebagai bukti telah menyelesaikan pelatihan
                    </p>
                </div>

            </div>

        </div>
    </section>

    <!-- SECTION 6: ARTIKEL TERBARU -->
    <section class="py-12 sm:py-16 lg:py-24 bg-slate-50/50 border-t border-slate-100 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Section Header -->
            <div class="text-center max-w-3xl mx-auto mb-10 sm:mb-16 space-y-2 sm:space-y-3">
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-900 tracking-tight">
                    Artikel Terbaru
                </h2>
                <p class="text-slate-600 text-sm sm:text-lg font-normal">
                    Temukan informasi, tips, dan insight seputar IoT, AI, dan teknologi terbaru yang bisa menambah wawasan dan keterampilan Anda.
                </p>
            </div>

            <!-- 3 Article Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 sm:gap-8">

                <!-- Article 1 -->
                <div class="bg-white rounded-2xl overflow-hidden border border-slate-200/70 shadow-sm hover:shadow-lg transition-all duration-300 flex flex-col">
                    <div class="h-44 sm:h-48 overflow-hidden bg-slate-100">
                        <img src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?auto=format&fit=crop&w=800&q=80" alt="Blog Post" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                    </div>
                    <div class="p-5 sm:p-6 flex flex-col justify-between flex-1 space-y-4">
                        <h3 class="text-base font-bold text-slate-900 line-clamp-2">
                            Penerapan Artificial Intelligence dalam Industri Modern.
                        </h3>
                        <div>
                            <a href="#" class="inline-flex items-center text-[#3cb759] font-semibold text-xs hover:text-[#329d4c] transition-colors group">
                                Readmore
                                <svg class="w-3.5 h-3.5 ml-1 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Article 2 -->
                <div class="bg-white rounded-2xl overflow-hidden border border-slate-200/70 shadow-sm hover:shadow-lg transition-all duration-300 flex flex-col">
                    <div class="h-44 sm:h-48 overflow-hidden bg-slate-100">
                        <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=800&q=80" alt="Blog Post" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                    </div>
                    <div class="p-5 sm:p-6 flex flex-col justify-between flex-1 space-y-4">
                        <h3 class="text-base font-bold text-slate-900 line-clamp-2">
                            Membangun Prototype IoT Menggunakan Microcontroller ESP32.
                        </h3>
                        <div>
                            <a href="#" class="inline-flex items-center text-[#3cb759] font-semibold text-xs hover:text-[#329d4c] transition-colors group">
                                Readmore
                                <svg class="w-3.5 h-3.5 ml-1 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Article 3 -->
                <div class="bg-white rounded-2xl overflow-hidden border border-slate-200/70 shadow-sm hover:shadow-lg transition-all duration-300 flex flex-col">
                    <div class="h-44 sm:h-48 overflow-hidden bg-slate-100">
                        <img src="https://images.unsplash.com/photo-1486312338219-ce68d2c6f44d?auto=format&fit=crop&w=800&q=80" alt="Blog Post" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                    </div>
                    <div class="p-5 sm:p-6 flex flex-col justify-between flex-1 space-y-4">
                        <h3 class="text-base font-bold text-slate-900 line-clamp-2">
                            Otomasi Workflow Bisnis Berbasis Agentic AI dan N8N.
                        </h3>
                        <div>
                            <a href="#" class="inline-flex items-center text-[#3cb759] font-semibold text-xs hover:text-[#329d4c] transition-colors group">
                                Readmore
                                <svg class="w-3.5 h-3.5 ml-1 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <!-- Floating Chat Support Button -->
        <div class="fixed bottom-4 right-4 sm:bottom-6 sm:right-6 z-40">
            <a href="#contact" class="w-12 h-12 sm:w-14 sm:h-14 bg-[#3b66f5] text-white rounded-full flex items-center justify-center shadow-xl hover:bg-[#2b50d8] hover:scale-105 transition-all duration-200">
                <svg class="w-6 h-6 sm:w-7 sm:h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
                </svg>
            </a>
        </div>
    </section>

    <!-- SECTION 7: BLUE CTA BANNER -->
    <section id="daftar" class="py-8 sm:py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-[#3b66f5] rounded-3xl p-6 sm:p-12 text-white flex flex-col md:flex-row justify-between items-center gap-6 sm:gap-8 shadow-xl">
                <div class="space-y-2 text-center md:text-left">
                    <h2 class="text-xl sm:text-3xl font-extrabold tracking-tight">
                        Siap Meningkatkan Kompetensi Anda?
                    </h2>
                    <p class="text-blue-100 text-xs sm:text-base font-normal">
                        Daftar sekarang dengan program pelatihan IoT & AI
                    </p>
                </div>
                <div class="shrink-0 w-full sm:w-auto">
                    <a href="#contact" class="w-full sm:w-auto inline-flex items-center justify-center bg-white text-[#3b66f5] hover:bg-slate-100 font-bold px-8 py-3.5 rounded-full shadow-lg transition-all transform hover:-translate-y-0.5 text-sm sm:text-base">
                        Daftar Sekarang
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 8: FOOTER -->
    @include('partials.footer')

</body>
</html>