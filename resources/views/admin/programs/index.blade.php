@extends('admin.layout')

@section('title', 'Manajemen Program Pelatihan')

@section('content')
    <!-- HEADER TITLE & FILTERS -->
    <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm space-y-4">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-slate-100 pb-4">
            <div>
                <h1 class="text-2xl font-extrabold text-slate-900 tracking-tight">Program Pelatihan</h1>
                <p class="text-slate-500 text-xs sm:text-sm mt-0.5">Kelola seluruh program pelatihan IoT & AI yang tersedia</p>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.programs.create') }}" class="inline-flex items-center gap-2 bg-[#3cb759] hover:bg-[#329d4c] text-white font-bold text-xs px-4 py-2.5 rounded-xl shadow-sm transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Tambah Program
                </a>
            </div>
        </div>

        <!-- SEARCH & STATUS FILTER FORM -->
        <form action="{{ route('admin.programs.index') }}" method="GET" class="flex flex-col sm:flex-row items-center gap-3">
            <div class="relative flex-1 w-full">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama program, kategori, atau deskripsi..." class="w-full pl-10 pr-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-emerald-500">
                <svg class="w-4 h-4 text-slate-400 absolute left-3.5 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>

            <select name="status" onchange="this.form.submit()" class="w-full sm:w-48 px-3 py-2 bg-slate-50 border border-slate-200 text-slate-700 text-xs font-semibold rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500">
                <option value="">Semua Status</option>
                <option value="Aktif" {{ request('status') == 'Aktif' ? 'selected' : '' }}>Status: Aktif</option>
                <option value="Nonaktif" {{ request('status') == 'Nonaktif' ? 'selected' : '' }}>Status: Nonaktif</option>
            </select>

            <button type="submit" class="w-full sm:w-auto bg-[#3cb759] hover:bg-[#329d4c] text-white font-bold text-xs px-5 py-2 rounded-xl transition-all shadow-sm">
                Cari
            </button>
            @if(request('search') || request('status'))
                <a href="{{ route('admin.programs.index') }}" class="w-full sm:w-auto bg-slate-200 hover:bg-slate-300 text-slate-700 font-bold text-xs px-4 py-2 rounded-xl text-center transition-all">
                    Reset
                </a>
            @endif
        </form>
    </div>

    <!-- PROGRAMS TABLE CARD -->
    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6">

    <div class="overflow-x-auto">
            <table class="w-full text-left text-xs text-slate-600">
                <thead class="bg-slate-50 text-slate-500 uppercase text-[10px] tracking-wider border-b border-slate-100">
                    <tr>
                        <th class="py-3.5 px-4 font-bold"># ID</th>
                        <th class="py-3.5 px-4 font-bold">Gambar</th>
                        <th class="py-3.5 px-4 font-bold">Nama Program</th>
                        <th class="py-3.5 px-4 font-bold">Harga & Durasi</th>
                        <th class="py-3.5 px-4 font-bold">Level</th>
                        <th class="py-3.5 px-4 font-bold">Status</th>
                        <th class="py-3.5 px-4 font-bold text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($programs as $program)
                        <tr class="hover:bg-slate-50/60 transition-colors">
                            <td class="py-4 px-4 font-mono text-slate-400 font-semibold">#{{ $program->id }}</td>
                            <td class="py-4 px-4">
                                <div class="w-12 h-12 rounded-xl bg-slate-100 border border-slate-200 overflow-hidden flex items-center justify-center shrink-0">
                                    @if($program->image)
                                        <img src="{{ asset($program->image) }}" alt="{{ $program->name }}" class="w-full h-full object-cover">
                                    @else
                                        <svg class="w-6 h-6 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    @endif
                                </div>
                            </td>
                            <td class="py-4 px-4">
                                <div class="font-bold text-slate-900 text-sm">{{ $program->name }}</div>
                            </td>
                            <td class="py-4 px-4">
                                <div class="font-bold text-emerald-600">{{ $program->price ?? 'Gratis' }}</div>
                                <div class="text-slate-400 text-[11px]">⏱ {{ $program->duration ?? '-' }}</div>
                            </td>
                            <td class="py-4 px-4 font-semibold text-slate-700">
                                {{ $program->level ?? '-' }}
                            </td>
                            <td class="py-4 px-4">
                                @if($program->status === 'Aktif')
                                    <span class="bg-emerald-50 text-[#3cb759] border border-emerald-200 text-[11px] font-extrabold px-3 py-1 rounded-full inline-flex items-center gap-1">
                                        <span class="w-1.5 h-1.5 rounded-full bg-[#3cb759]"></span>
                                        Aktif
                                    </span>
                                @else
                                    <span class="bg-slate-100 text-slate-500 border border-slate-200 text-[11px] font-bold px-3 py-1 rounded-full inline-flex items-center gap-1">
                                        <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span>
                                        Nonaktif
                                    </span>
                                @endif
                            </td>
                            <td class="py-4 px-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.programs.syllabuses.index', $program->id) }}" class="text-emerald-600 hover:text-emerald-800 bg-emerald-50 hover:bg-emerald-100 px-2.5 py-1.5 rounded-lg border border-emerald-200 transition-colors font-bold text-xs flex items-center gap-1" title="Kelola Silabus">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                        </svg>
                                        Silabus
                                    </a>
                                    <a href="{{ route('admin.programs.edit', $program->id) }}" class="text-blue-600 hover:text-blue-800 bg-blue-50 hover:bg-blue-100 p-1.5 rounded-lg border border-blue-200 transition-colors" title="Edit Program">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                    </a>
                                    <form action="{{ route('admin.programs.destroy', $program->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus program pelatihan ini?');" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 bg-red-50 hover:bg-red-100 p-1.5 rounded-lg border border-red-200 transition-colors" title="Hapus Program">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-8 text-center text-slate-400 text-xs">Belum ada program pelatihan. Klik "Tambah Program" untuk menambah program baru.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($programs->hasPages())
            <div class="mt-4 pt-4 border-t border-slate-100">
                {{ $programs->links() }}
            </div>
        @endif
    </div>
@endsection
