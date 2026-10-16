@extends('admin.layout')

@section('title', 'Kelola Jadwal Pelatihan - ' . ($program ? $program->name : 'Semua Program'))

@section('content')
<div class="max-w-6xl mx-auto space-y-6 pb-12">

    <!-- TOP BANNER & PROGRAM SELECTOR -->
    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs p-6 sm:p-7 space-y-6">
        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-5">
            <!-- Left Info -->
            <div class="space-y-1.5">
                <div class="flex items-center gap-2">
                    <span class="bg-emerald-50 text-[#3cb759] border border-emerald-200/80 text-[11px] font-extrabold px-3 py-0.5 rounded-full uppercase tracking-wider">
                        {{ $program ? $program->category : 'MANAJEMEN PELATIHAN' }}
                    </span>
                    <span class="bg-blue-50 text-[#2b54f5] border border-blue-100 text-[11px] font-bold px-2.5 py-0.5 rounded-full">
                        {{ count($schedules) }} Sesi Terdaftar
                    </span>
                </div>
                <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight flex items-center gap-2.5">
                    <span>📅</span> Jadwal Sesi Pelatihan
                </h1>
                <p class="text-slate-500 text-xs sm:text-sm">
                    Kelola tanggal, jam pelaksanaan, link meeting, dan instruktur untuk <strong class="text-slate-900 font-bold">{{ $program ? $program->name : 'Semua Program' }}</strong>
                </p>
            </div>

            <!-- Right Controls: Select Program & Add Button -->
            <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 shrink-0">
                @if(isset($programs) && count($programs) > 0)
                    <div class="relative min-w-[240px]">
                        <label for="program-selector" class="block text-[10px] font-extrabold text-slate-400 uppercase tracking-wider mb-1">Filter Program Pelatihan:</label>
                        <select id="program-selector" onchange="window.location.href = '{{ route('admin.schedules.index') }}?program_id=' + this.value" class="w-full px-4 py-2.5 bg-slate-50 hover:bg-slate-100/80 border border-slate-200 text-slate-800 text-xs font-bold rounded-xl focus:outline-none focus:ring-2 focus:ring-[#3cb759] focus:bg-white transition-all shadow-xs cursor-pointer">
                            @foreach($programs as $p)
                                <option value="{{ $p->id }}" {{ $program && $p->id == $program->id ? 'selected' : '' }}>
                                    {{ $p->name }} ({{ count($p->schedules) }} Sesi)
                                </option>
                            @endforeach
                        </select>
                    </div>
                @endif

                <div class="flex items-center gap-2 self-end sm:self-auto mt-auto">
                    <button type="button" onclick="openCreateModal()" class="inline-flex items-center justify-center gap-2 bg-[#3cb759] hover:bg-[#329d4c] text-white font-bold text-xs px-5 py-2.5 rounded-xl transition-all shadow-sm hover:shadow active:scale-[0.99] cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Tambah Sesi Baru
                    </button>
                </div>
            </div>
        </div>

        <!-- QUICK STATS SUMMARY -->
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 pt-4 border-t border-slate-100">
            <div class="bg-slate-50/80 rounded-xl border border-slate-100 p-3.5 flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-emerald-100 text-[#3cb759] flex items-center justify-center font-bold shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <div>
                    <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block">Total Sesi</span>
                    <span class="text-base font-extrabold text-slate-900">{{ count($schedules) }} Sesi</span>
                </div>
            </div>

            <div class="bg-slate-50/80 rounded-xl border border-slate-100 p-3.5 flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center font-bold shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div>
                    <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block">Mendatang</span>
                    <span class="text-base font-extrabold text-slate-900">{{ $schedules->where('status', 'mendatang')->count() }} Sesi</span>
                </div>
            </div>

            <div class="bg-slate-50/80 rounded-xl border border-slate-100 p-3.5 flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-amber-100 text-amber-600 flex items-center justify-center font-bold shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <div>
                    <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block">Berlangsung</span>
                    <span class="text-base font-extrabold text-slate-900">{{ $schedules->where('status', 'berlangsung')->count() }} Sesi</span>
                </div>
            </div>

            <div class="bg-slate-50/80 rounded-xl border border-slate-100 p-3.5 flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-slate-200 text-slate-700 flex items-center justify-center font-bold shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <div>
                    <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block">Selesai</span>
                    <span class="text-base font-extrabold text-slate-900">{{ $schedules->where('status', 'selesai')->count() }} Sesi</span>
                </div>
            </div>
        </div>
    </div>

    <!-- MAIN SCHEDULE LIST HEADER -->
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-lg font-extrabold text-slate-900 tracking-tight">Daftar Sesi Terjadwal</h2>
            <p class="text-xs text-slate-500">Status terhitung otomatis secara real-time berdasarkan tanggal dan jam pelaksanaan</p>
        </div>
        <button type="button" onclick="openCreateModal()" class="text-xs font-bold text-[#3cb759] hover:text-[#329d4c] bg-emerald-50 hover:bg-emerald-100/80 px-3.5 py-1.5 rounded-xl border border-emerald-200 transition-colors flex items-center gap-1.5 cursor-pointer">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Tambah Sesi Baru
        </button>
    </div>

    <!-- SCHEDULE CARDS LIST -->
    <div class="space-y-4">
        @forelse($schedules as $index => $schedule)
            @php
                $currStatus = $schedule->status; // uses computed status accessor
                $statusColor = 'bg-blue-50 text-blue-700 border-blue-200';
                $statusLabel = 'Mendatang';

                if ($currStatus === 'berlangsung') {
                    $statusColor = 'bg-amber-50 text-amber-700 border-amber-200 animate-pulse';
                    $statusLabel = 'Sedang Berlangsung';
                } elseif ($currStatus === 'selesai') {
                    $statusColor = 'bg-slate-100 text-slate-600 border-slate-200';
                    $statusLabel = 'Selesai';
                }
            @endphp

            <!-- SINGLE SCHEDULE CARD BOX -->
            <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md transition-all duration-200 p-5 sm:p-6 space-y-4">
                
                <!-- CARD HEADER & ACTIONS -->
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 pb-3 border-b border-slate-100">
                    <div class="flex items-center gap-3.5">
                        <!-- Date Badge -->
                        <div class="w-13 h-13 rounded-2xl bg-emerald-50 border border-emerald-200 text-[#3cb759] flex flex-col items-center justify-center shrink-0 shadow-xs">
                            <span class="text-[10px] uppercase font-extrabold tracking-wider leading-none">{{ \Carbon\Carbon::parse($schedule->date)->translatedFormat('M') }}</span>
                            <span class="text-base font-black leading-none mt-0.5">{{ \Carbon\Carbon::parse($schedule->date)->format('d') }}</span>
                        </div>
                        <div>
                            <div class="flex items-center gap-2">
                                <span class="bg-slate-900 text-white text-[10px] font-extrabold px-2 py-0.5 rounded-md">
                                    Sesi #{{ $index + 1 }}
                                </span>
                                <h3 class="text-base font-bold text-slate-900 leading-snug">{{ $schedule->title }}</h3>
                            </div>
                            <p class="text-xs text-slate-400 font-medium mt-0.5">
                                {{ \Carbon\Carbon::parse($schedule->date)->translatedFormat('l, d F Y') }}
                            </p>
                        </div>
                    </div>

                    <!-- Status Pill & Action Buttons -->
                    <div class="flex items-center gap-3 self-end sm:self-auto shrink-0">
                        <span class="{{ $statusColor }} text-[10px] font-extrabold px-3 py-1 rounded-full border uppercase tracking-wider">
                            {{ $statusLabel }}
                        </span>

                        <div class="flex items-center gap-1.5 pl-2 border-l border-slate-100">
                            <button type="button" 
                                    onclick="openEditModal({{ json_encode($schedule) }})" 
                                    class="inline-flex items-center gap-1 text-slate-700 hover:text-blue-600 bg-slate-50 hover:bg-blue-50 px-3 py-1.5 rounded-xl text-xs font-bold border border-slate-200 hover:border-blue-200 transition-all cursor-pointer">
                                <svg class="w-3.5 h-3.5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                                Edit
                            </button>

                            <form action="{{ route('admin.schedules.destroy', $schedule->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus jadwal sesi ini?');" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center gap-1 text-slate-700 hover:text-red-600 bg-slate-50 hover:bg-red-50 px-3 py-1.5 rounded-xl text-xs font-bold border border-slate-200 hover:border-red-200 transition-all cursor-pointer">
                                    <svg class="w-3.5 h-3.5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- CARD DETAILS GRID -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 text-xs text-slate-600 pt-1">
                    <div class="flex items-center gap-2.5 bg-slate-50/80 p-3 rounded-xl border border-slate-100">
                        <div class="w-8 h-8 rounded-lg bg-emerald-100 text-[#3cb759] flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <span class="text-[10px] font-bold text-slate-400 block uppercase">Jam Pelaksanaan</span>
                            <span class="font-bold text-slate-800">{{ \Carbon\Carbon::parse($schedule->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($schedule->end_time)->format('H:i') }} WIB</span>
                        </div>
                    </div>

                    @php
                        $isOnline = str_contains(strtolower($schedule->location), 'online') || str_contains(strtolower($schedule->location), 'http') || filter_var($schedule->location, FILTER_VALIDATE_URL);
                        $hasUrl = filter_var($schedule->location, FILTER_VALIDATE_URL) || str_contains(strtolower($schedule->location), 'http');
                    @endphp

                    <div class="flex items-center gap-2.5 bg-slate-50/80 p-3 rounded-xl border border-slate-100">
                        <div class="w-8 h-8 rounded-lg {{ $isOnline ? 'bg-blue-100 text-blue-600' : 'bg-amber-100 text-amber-700' }} flex items-center justify-center shrink-0">
                            @if($isOnline)
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                </svg>
                            @else
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            @endif
                        </div>
                        <div class="truncate space-y-0.5">
                            <span class="text-[10px] font-bold text-slate-400 block uppercase tracking-wider">Modul Pelaksanaan</span>
                            <div class="flex items-center gap-1.5 flex-wrap">
                                @if($isOnline)
                                    <span class="inline-flex items-center gap-1 bg-blue-50 text-blue-700 border border-blue-200/80 px-2 py-0.5 rounded-md font-extrabold text-[10px]">
                                        <span class="w-1.5 h-1.5 rounded-full bg-blue-500 animate-pulse"></span>
                                        Online Class
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1 bg-amber-50 text-amber-800 border border-amber-200/80 px-2 py-0.5 rounded-md font-extrabold text-[10px]">
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                                        Tatap Muka
                                    </span>
                                @endif

                                @if($hasUrl)
                                    <a href="{{ $schedule->location }}" target="_blank" class="inline-flex items-center gap-1 text-[10px] font-bold text-[#2b54f5] hover:text-blue-700 bg-white hover:bg-blue-50 px-2 py-0.5 rounded-md border border-blue-200 shadow-2xs transition-colors">
                                        <span>Link Meeting</span>
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                                    </a>
                                @else
                                    <span class="text-xs font-bold text-slate-700 truncate block" title="{{ $schedule->location }}">{{ $schedule->location }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center gap-2.5 bg-slate-50/80 p-3 rounded-xl border border-slate-100">
                        <div class="w-8 h-8 rounded-lg bg-purple-100 text-purple-600 flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <div class="truncate">
                            <span class="text-[10px] font-bold text-slate-400 block uppercase">Pemateri / Instruktur</span>
                            <span class="font-bold text-slate-800 truncate block">{{ $schedule->speaker ?: '-' }}</span>
                        </div>
                    </div>
                </div>

                @if($schedule->description)
                    <div class="bg-slate-50/60 p-3.5 rounded-xl border border-slate-100 text-xs text-slate-600 leading-relaxed">
                        <span class="text-[10px] font-bold text-slate-400 uppercase block mb-0.5">Deskripsi / Catatan Sesi:</span>
                        {{ $schedule->description }}
                    </div>
                @endif

            </div>
        @empty
            <!-- EMPTY STATE CARD -->
            <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs p-12 text-center space-y-4">
                <div class="w-16 h-16 rounded-2xl bg-emerald-50 text-[#3cb759] flex items-center justify-center mx-auto border border-emerald-100">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <div class="space-y-1 max-w-sm mx-auto">
                    <h3 class="text-base font-bold text-slate-900">Belum Ada Sesi Pelatihan</h3>
                    <p class="text-xs text-slate-500">Program pelatihan ini belum memiliki jadwal sesi. Klik tombol di bawah untuk menambahkan sesi pertama.</p>
                </div>
                <button type="button" onclick="openCreateModal()" class="inline-flex items-center gap-2 bg-[#3cb759] hover:bg-[#329d4c] text-white font-bold text-xs px-5 py-2.5 rounded-xl transition-all shadow-sm cursor-pointer">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Tambah Sesi Pertama
                </button>
            </div>
        @endforelse
    </div>

</div>

<!-- MODAL TAMBAH JADWAL BARU -->
<div id="create-modal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-slate-900/40 backdrop-blur-xs transition-opacity" onclick="closeCreateModal()"></div>

    <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
        <div class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-lg border border-slate-100">
            
            <div class="bg-slate-50/80 px-6 py-4 border-b border-slate-100 flex items-center justify-between">
                <div class="flex items-center gap-2.5">
                    <div class="w-8 h-8 rounded-xl bg-emerald-100 text-[#3cb759] flex items-center justify-center font-bold">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-base font-bold text-slate-900" id="modal-title">Tambah Jadwal Sesi Baru</h3>
                        <p class="text-[11px] text-slate-400">Program: {{ $program ? $program->name : '-' }}</p>
                    </div>
                </div>
                <button type="button" onclick="closeCreateModal()" class="text-slate-400 hover:text-slate-600 p-1 rounded-lg hover:bg-slate-100 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <form action="{{ route('admin.schedules.store') }}" method="POST" class="p-6 space-y-4">
                @csrf
                <input type="hidden" name="program_id" value="{{ $program ? $program->id : '' }}">

                <!-- Judul Sesi -->
                <div class="space-y-1">
                    <label for="create_title" class="block text-xs font-bold text-slate-700">Judul / Topik Sesi Pelatihan <span class="text-red-500">*</span></label>
                    <input type="text" id="create_title" name="title" required placeholder="Contoh: Sesi 1: Introduksi & Hardware Setup" class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-[#3cb759] focus:bg-white transition-all">
                </div>

                <!-- Tanggal & Waktu -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                    <div class="space-y-1">
                        <label for="create_date" class="block text-xs font-bold text-slate-700">Tanggal <span class="text-red-500">*</span></label>
                        <input type="date" id="create_date" name="date" required value="{{ date('Y-m-d') }}" class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-800 focus:outline-none focus:ring-2 focus:ring-[#3cb759] focus:bg-white transition-all">
                    </div>
                    <div class="space-y-1">
                        <label for="create_start_time" class="block text-xs font-bold text-slate-700">Waktu Mulai <span class="text-red-500">*</span></label>
                        <input type="time" id="create_start_time" name="start_time" required value="09:00" class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-800 focus:outline-none focus:ring-2 focus:ring-[#3cb759] focus:bg-white transition-all">
                    </div>
                    <div class="space-y-1">
                        <label for="create_end_time" class="block text-xs font-bold text-slate-700">Waktu Selesai <span class="text-red-500">*</span></label>
                        <input type="time" id="create_end_time" name="end_time" required value="12:00" class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-800 focus:outline-none focus:ring-2 focus:ring-[#3cb759] focus:bg-white transition-all">
                    </div>
                </div>

                <!-- Lokasi & Pemateri -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <div class="space-y-1">
                        <label for="create_location" class="block text-xs font-bold text-slate-700">Lokasi / Link Meeting <span class="text-red-500">*</span></label>
                        <input type="text" id="create_location" name="location" required placeholder="https://meet.google.com/xyz..." value="Online (Google Meet)" class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-800 focus:outline-none focus:ring-2 focus:ring-[#3cb759] focus:bg-white transition-all">
                    </div>
                    <div class="space-y-1">
                        <label for="create_speaker" class="block text-xs font-bold text-slate-700">Pemateri / Instruktur</label>
                        <input type="text" id="create_speaker" name="speaker" placeholder="Contoh: Dr. Eng. Ahmad Fauzi" class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-800 focus:outline-none focus:ring-2 focus:ring-[#3cb759] focus:bg-white transition-all">
                    </div>
                </div>

                <!-- Status Manual Default -->
                <div class="space-y-1">
                    <label for="create_status" class="block text-xs font-bold text-slate-700">Status Awal Sesi <span class="text-red-500">*</span></label>
                    <select id="create_status" name="status" required class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 text-slate-800 text-xs font-bold rounded-xl focus:outline-none focus:ring-2 focus:ring-[#3cb759] focus:bg-white transition-all">
                        <option value="mendatang" selected>Mendatang</option>
                        <option value="berlangsung">Berlangsung</option>
                        <option value="selesai">Selesai</option>
                    </select>
                    <p class="text-[11px] text-slate-400">Catatan: Status akan otomatis diperbarui secara real-time berdasarkan jam pelaksanaan.</p>
                </div>

                <!-- Deskripsi Sesi -->
                <div class="space-y-1">
                    <label for="create_description" class="block text-xs font-bold text-slate-700">Deskripsi / Catatan Sesi</label>
                    <textarea id="create_description" name="description" rows="3" placeholder="Rincian poin materi atau instruksi untuk peserta..." class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-[#3cb759] focus:bg-white transition-all leading-relaxed"></textarea>
                </div>

                <!-- Footer Buttons -->
                <div class="flex items-center justify-end gap-2 pt-3 border-t border-slate-100">
                    <button type="button" onclick="closeCreateModal()" class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs rounded-xl border border-slate-200 transition-colors">
                        Batal
                    </button>
                    <button type="submit" class="px-5 py-2 bg-[#3cb759] hover:bg-[#329d4c] text-white font-bold text-xs rounded-xl shadow-sm transition-all">
                        Simpan Jadwal
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- MODAL EDIT JADWAL -->
<div id="edit-modal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-edit-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-slate-900/40 backdrop-blur-xs transition-opacity" onclick="closeEditModal()"></div>

    <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
        <div class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-lg border border-slate-100">
            
            <div class="bg-slate-50/80 px-6 py-4 border-b border-slate-100 flex items-center justify-between">
                <div class="flex items-center gap-2.5">
                    <div class="w-8 h-8 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center font-bold">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-base font-bold text-slate-900" id="modal-edit-title">Edit Sesi Pelatihan</h3>
                        <p class="text-[11px] text-slate-400">Perbarui tanggal, waktu, atau link meeting</p>
                    </div>
                </div>
                <button type="button" onclick="closeEditModal()" class="text-slate-400 hover:text-slate-600 p-1 rounded-lg hover:bg-slate-100 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <form id="edit-form" method="POST" class="p-6 space-y-4">
                @csrf
                @method('PUT')

                <!-- Judul Sesi -->
                <div class="space-y-1">
                    <label for="edit_title" class="block text-xs font-bold text-slate-700">Judul / Topik Sesi Pelatihan <span class="text-red-500">*</span></label>
                    <input type="text" id="edit_title" name="title" required class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-800 focus:outline-none focus:ring-2 focus:ring-[#3cb759] focus:bg-white transition-all">
                </div>

                <!-- Tanggal & Waktu -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                    <div class="space-y-1">
                        <label for="edit_date" class="block text-xs font-bold text-slate-700">Tanggal <span class="text-red-500">*</span></label>
                        <input type="date" id="edit_date" name="date" required class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-800 focus:outline-none focus:ring-2 focus:ring-[#3cb759] focus:bg-white transition-all">
                    </div>
                    <div class="space-y-1">
                        <label for="edit_start_time" class="block text-xs font-bold text-slate-700">Waktu Mulai <span class="text-red-500">*</span></label>
                        <input type="time" id="edit_start_time" name="start_time" required class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-800 focus:outline-none focus:ring-2 focus:ring-[#3cb759] focus:bg-white transition-all">
                    </div>
                    <div class="space-y-1">
                        <label for="edit_end_time" class="block text-xs font-bold text-slate-700">Waktu Selesai <span class="text-red-500">*</span></label>
                        <input type="time" id="edit_end_time" name="end_time" required class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-800 focus:outline-none focus:ring-2 focus:ring-[#3cb759] focus:bg-white transition-all">
                    </div>
                </div>

                <!-- Lokasi & Pemateri -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <div class="space-y-1">
                        <label for="edit_location" class="block text-xs font-bold text-slate-700">Lokasi / Link Meeting <span class="text-red-500">*</span></label>
                        <input type="text" id="edit_location" name="location" required class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-800 focus:outline-none focus:ring-2 focus:ring-[#3cb759] focus:bg-white transition-all">
                    </div>
                    <div class="space-y-1">
                        <label for="edit_speaker" class="block text-xs font-bold text-slate-700">Pemateri / Instruktur</label>
                        <input type="text" id="edit_speaker" name="speaker" class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-800 focus:outline-none focus:ring-2 focus:ring-[#3cb759] focus:bg-white transition-all">
                    </div>
                </div>

                <!-- Status -->
                <div class="space-y-1">
                    <label for="edit_status" class="block text-xs font-bold text-slate-700">Status Sesi <span class="text-red-500">*</span></label>
                    <select id="edit_status" name="status" required class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 text-slate-800 text-xs font-bold rounded-xl focus:outline-none focus:ring-2 focus:ring-[#3cb759] focus:bg-white transition-all">
                        <option value="mendatang">Mendatang</option>
                        <option value="berlangsung">Berlangsung</option>
                        <option value="selesai">Selesai</option>
                    </select>
                </div>

                <!-- Deskripsi Sesi -->
                <div class="space-y-1">
                    <label for="edit_description" class="block text-xs font-bold text-slate-700">Deskripsi / Catatan Sesi</label>
                    <textarea id="edit_description" name="description" rows="3" class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-800 focus:outline-none focus:ring-2 focus:ring-[#3cb759] focus:bg-white transition-all leading-relaxed"></textarea>
                </div>

                <!-- Footer Buttons -->
                <div class="flex items-center justify-end gap-2 pt-3 border-t border-slate-100">
                    <button type="button" onclick="closeEditModal()" class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs rounded-xl border border-slate-200 transition-colors">
                        Batal
                    </button>
                    <button type="submit" class="px-5 py-2 bg-[#3cb759] hover:bg-[#329d4c] text-white font-bold text-xs rounded-xl shadow-sm transition-all">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function openCreateModal() {
        document.getElementById('create-modal').classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    }

    function closeCreateModal() {
        document.getElementById('create-modal').classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }

    function openEditModal(schedule) {
        const editForm = document.getElementById('edit-form');
        editForm.action = '{{ url("/admin/schedules") }}/' + schedule.id;
        
        document.getElementById('edit_title').value = schedule.title || '';
        document.getElementById('edit_date').value = schedule.date ? schedule.date.substring(0, 10) : '';
        document.getElementById('edit_start_time').value = schedule.start_time || '';
        document.getElementById('edit_end_time').value = schedule.end_time || '';
        document.getElementById('edit_location').value = schedule.location || '';
        document.getElementById('edit_speaker').value = schedule.speaker || '';
        document.getElementById('edit_status').value = schedule.status || 'mendatang';
        document.getElementById('edit_description').value = schedule.description || '';

        document.getElementById('edit-modal').classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    }

    function closeEditModal() {
        document.getElementById('edit-modal').classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }
</script>
@endsection
