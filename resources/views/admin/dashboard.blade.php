@extends('admin.layout')

@section('title', 'Overview Dashboard Admin')

@section('content')
    <!-- HEADER TITLE -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
        <div>
            <h1 class="text-2xl font-extrabold text-slate-900 tracking-tight">Dashboard Administrasi</h1>
            <p class="text-slate-500 text-xs sm:text-sm mt-0.5">Kelola data pendaftaran pelatihan dan akun peserta CV. SMARTPLUS INDONESIA</p>
        </div>
        <div class="flex items-center gap-2 shrink-0">
            <span class="inline-flex items-center gap-1.5 bg-emerald-50 text-[#3cb759] border border-emerald-200 text-xs font-bold px-3 py-1.5 rounded-full">
                <span class="w-2 h-2 rounded-full bg-[#3cb759] animate-ping"></span>
                System Live
            </span>
        </div>
    </div>

    <!-- STATS CARDS GRID -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Stat 1: Total Peserta -->
        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5 flex items-center justify-between hover:shadow-md transition-all">
            <div>
                <p class="text-slate-400 text-xs font-bold uppercase tracking-wider">Total Peserta</p>
                <p class="text-3xl font-extrabold text-slate-900 mt-1">{{ $totalUsers }}</p>
                <p class="text-[11px] text-slate-500 mt-1">Akun peserta terdaftar</p>
            </div>
            <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center shrink-0 border border-blue-100">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
            </div>
        </div>

        <!-- Stat 2: Total Pendaftaran -->
        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5 flex items-center justify-between hover:shadow-md transition-all">
            <div>
                <p class="text-slate-400 text-xs font-bold uppercase tracking-wider">Total Pendaftaran</p>
                <p class="text-3xl font-extrabold text-slate-900 mt-1">{{ $totalEnrollments }}</p>
                <p class="text-[11px] text-slate-500 mt-1">Transaksi pendaftaran</p>
            </div>
            <div class="w-12 h-12 bg-emerald-50 text-[#3cb759] rounded-2xl flex items-center justify-center shrink-0 border border-emerald-100">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                </svg>
            </div>
        </div>

        <!-- Stat 3: Pendaftaran Aktif -->
        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5 flex items-center justify-between hover:shadow-md transition-all">
            <div>
                <p class="text-slate-400 text-xs font-bold uppercase tracking-wider">Status Aktif</p>
                <p class="text-3xl font-extrabold text-[#3cb759] mt-1">{{ $activeEnrollments }}</p>
                <p class="text-[11px] text-slate-500 mt-1">Sedang mengikuti pelatihan</p>
            </div>
            <div class="w-12 h-12 bg-emerald-50 text-[#3cb759] rounded-2xl flex items-center justify-center shrink-0 border border-emerald-100">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                </svg>
            </div>
        </div>

        <!-- Stat 4: Pelatihan Selesai -->
        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5 flex items-center justify-between hover:shadow-md transition-all">
            <div>
                <p class="text-slate-400 text-xs font-bold uppercase tracking-wider">Status Selesai</p>
                <p class="text-3xl font-extrabold text-blue-600 mt-1">{{ $completedEnrollments }}</p>
                <p class="text-[11px] text-slate-500 mt-1">Lulus pelatihan</p>
            </div>
            <div class="w-12 h-12 bg-purple-50 text-purple-600 rounded-2xl flex items-center justify-center shrink-0 border border-purple-100">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                </svg>
            </div>
        </div>
    </div>

    <!-- RECENT ENROLLMENTS TABLE -->
    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 space-y-4">
        <div class="flex items-center justify-between border-b border-slate-100 pb-4">
            <div>
                <h2 class="text-lg font-extrabold text-slate-900 tracking-tight">Pendaftaran Terbaru</h2>
                <p class="text-slate-500 text-xs mt-0.5">Daftar transaksi pendaftaran pelatihan peserta terbaru</p>
            </div>
            <a href="{{ route('admin.enrollments') }}" class="text-[#3cb759] hover:text-[#329d4c] font-bold text-xs inline-flex items-center gap-1">
                Kelola Semua Pendaftaran
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                </svg>
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs text-slate-600">
                <thead class="bg-slate-50 text-slate-500 uppercase text-[10px] tracking-wider border-b border-slate-100">
                    <tr>
                        <th class="py-3 px-4 font-bold">Peserta</th>
                        <th class="py-3 px-4 font-bold">Program Pelatihan</th>
                        <th class="py-3 px-4 font-bold">Status</th>
                        <th class="py-3 px-4 font-bold">Tanggal Daftar</th>
                        <th class="py-3 px-4 font-bold text-right">Aksi Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($recentEnrollments as $enrollment)
                        <tr class="hover:bg-slate-50/60 transition-colors">
                            <td class="py-3.5 px-4">
                                <div class="font-bold text-slate-900">{{ $enrollment->user->name ?? 'User Terhapus' }}</div>
                                <div class="text-slate-400 text-[11px]">{{ $enrollment->user->email ?? '-' }}</div>
                            </td>
                            <td class="py-3.5 px-4 font-semibold text-slate-800">
                                {{ $enrollment->program_name }}
                            </td>
                            <td class="py-3.5 px-4">
                                @if($enrollment->status === 'Aktif')
                                    <span class="bg-emerald-50 text-[#3cb759] border border-emerald-200 text-[10px] font-bold px-2.5 py-0.5 rounded-full">
                                        Aktif
                                    </span>
                                @elseif($enrollment->status === 'Selesai')
                                    <span class="bg-blue-50 text-blue-600 border border-blue-200 text-[10px] font-bold px-2.5 py-0.5 rounded-full">
                                        Selesai
                                    </span>
                                @else
                                    <span class="bg-red-50 text-red-600 border border-red-200 text-[10px] font-bold px-2.5 py-0.5 rounded-full">
                                        Dibatalkan
                                    </span>
                                @endif
                            </td>
                            <td class="py-3.5 px-4 text-slate-500 font-medium">
                                {{ $enrollment->created_at->format('d M Y, H:i') }}
                            </td>
                            <td class="py-3.5 px-4 text-right">
                                <form action="{{ route('admin.enrollments.status', $enrollment->id) }}" method="POST" class="inline-flex items-center gap-1">
                                    @csrf
                                    <select name="status" onchange="this.form.submit()" class="bg-slate-50 border border-slate-200 text-slate-700 text-[11px] font-semibold rounded-lg px-2 py-1 focus:outline-none focus:ring-1 focus:ring-emerald-500">
                                        <option value="Aktif" {{ $enrollment->status === 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                        <option value="Selesai" {{ $enrollment->status === 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                        <option value="Dibatalkan" {{ $enrollment->status === 'Dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                                    </select>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-6 text-center text-slate-400 text-xs">Belum ada data pendaftaran pelatihan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
