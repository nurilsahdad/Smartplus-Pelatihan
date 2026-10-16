@extends('admin.layout')

@section('title', 'Manajemen Pendaftaran Pelatihan')

@section('content')
    <!-- HEADER TITLE & FILTERS -->
    <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm space-y-4">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-slate-100 pb-4">
            <div>
                <h1 class="text-2xl font-extrabold text-slate-900 tracking-tight">Pendaftaran Pelatihan</h1>
                <p class="text-slate-500 text-xs sm:text-sm mt-0.5">Kelola seluruh pendaftaran peserta dan perbarui status keaktifan pelatihan</p>
            </div>
            <div class="text-xs font-bold text-slate-500 bg-slate-50 border border-slate-200 px-3.5 py-1.5 rounded-xl">
                Total Data: <span class="text-emerald-600 font-extrabold">{{ count($enrollments) }}</span>
            </div>
        </div>
        
        <!-- SEARCH & STATUS FILTER FORM -->
        <form action="{{ route('admin.enrollments') }}" method="GET" class="flex flex-col sm:flex-row items-center gap-3">
            <div class="relative flex-1 w-full">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama peserta, email, atau nama program..." class="w-full pl-10 pr-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-emerald-500">
                <svg class="w-4 h-4 text-slate-400 absolute left-3.5 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>

            <select name="status" onchange="this.form.submit()" class="w-full sm:w-48 px-3 py-2 bg-slate-50 border border-slate-200 text-slate-700 text-xs font-semibold rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500">
                <option value="all" {{ request('status') == 'all' ? 'selected' : '' }}>Semua Status</option>
                <option value="Aktif" {{ request('status') == 'Aktif' ? 'selected' : '' }}>Status: Aktif</option>
                <option value="Selesai" {{ request('status') == 'Selesai' ? 'selected' : '' }}>Status: Selesai</option>
                <option value="Dibatalkan" {{ request('status') == 'Dibatalkan' ? 'selected' : '' }}>Status: Dibatalkan</option>
            </select>

            <button type="submit" class="w-full sm:w-auto bg-[#3cb759] hover:bg-[#329d4c] text-white font-bold text-xs px-5 py-2 rounded-xl transition-all shadow-sm">
                Cari
            </button>
            @if(request('search') || (request('status') && request('status') !== 'all'))
                <a href="{{ route('admin.enrollments') }}" class="w-full sm:w-auto bg-slate-200 hover:bg-slate-300 text-slate-700 font-bold text-xs px-4 py-2 rounded-xl text-center transition-all">
                    Reset Filter
                </a>
            @endif
        </form>
    </div>

    <!-- ENROLLMENTS TABLE CARD -->
    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs text-slate-600">
                <thead class="bg-slate-50 text-slate-500 uppercase text-[10px] tracking-wider border-b border-slate-100">
                    <tr>
                        <th class="py-3.5 px-4 font-bold"># ID</th>
                        <th class="py-3.5 px-4 font-bold">Peserta</th>
                        <th class="py-3.5 px-4 font-bold">Program Pelatihan</th>
                        <th class="py-3.5 px-4 font-bold">Status Keaktifan</th>
                        <th class="py-3.5 px-4 font-bold">Tanggal Pendaftaran</th>
                        <th class="py-3.5 px-4 font-bold text-right">Ubah Status / Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($enrollments as $enrollment)
                        <tr class="hover:bg-slate-50/60 transition-colors">
                            <td class="py-4 px-4 font-mono text-slate-400 font-semibold">#{{ $enrollment->id }}</td>
                            <td class="py-4 px-4">
                                <div class="font-bold text-slate-900">{{ $enrollment->user->name ?? 'Pengguna Terhapus' }}</div>
                                <div class="text-slate-400 text-[11px]">{{ $enrollment->user->email ?? '-' }}</div>
                                @if(isset($enrollment->user->phone))
                                    <div class="text-slate-400 text-[10px]">📞 {{ $enrollment->user->phone }}</div>
                                @endif
                            </td>
                            <td class="py-4 px-4">
                                <div class="font-bold text-slate-800">{{ $enrollment->program_name }}</div>
                                <div class="text-slate-400 text-[10px]">Slug: {{ $enrollment->program_slug }}</div>
                            </td>
                            <td class="py-4 px-4">
                                @if($enrollment->status === 'Aktif')
                                    <span class="bg-emerald-50 text-[#3cb759] border border-emerald-200 text-[11px] font-extrabold px-3 py-1 rounded-full inline-flex items-center gap-1">
                                        <span class="w-1.5 h-1.5 rounded-full bg-[#3cb759]"></span>
                                        Aktif
                                    </span>
                                @elseif($enrollment->status === 'Selesai')
                                    <span class="bg-blue-50 text-blue-600 border border-blue-200 text-[11px] font-extrabold px-3 py-1 rounded-full inline-flex items-center gap-1">
                                        <span class="w-1.5 h-1.5 rounded-full bg-blue-600"></span>
                                        Selesai
                                    </span>
                                @else
                                    <span class="bg-red-50 text-red-600 border border-red-200 text-[11px] font-extrabold px-3 py-1 rounded-full inline-flex items-center gap-1">
                                        <span class="w-1.5 h-1.5 rounded-full bg-red-600"></span>
                                        Dibatalkan
                                    </span>
                                @endif
                            </td>
                            <td class="py-4 px-4 text-slate-500 font-medium">
                                {{ $enrollment->created_at->format('d M Y') }}
                                <div class="text-slate-400 text-[10px]">{{ $enrollment->created_at->format('H:i') }} WIB</div>
                            </td>
                            <td class="py-4 px-4 text-right">
                                <div class="flex items-center justify-end gap-1.5">
                                    @if($enrollment->certificate)
                                        <a href="{{ route('certificates.show', $enrollment->certificate->id) }}" target="_blank" class="px-2 py-1.5 text-emerald-700 hover:text-emerald-800 bg-emerald-50 hover:bg-emerald-100 rounded-lg border border-emerald-200 transition-colors inline-flex items-center gap-1 text-[11px] font-bold" title="Lihat Sertifikat Peserta">
                                            <span>📜</span> Sertifikat
                                        </a>
                                    @else
                                        <a href="{{ route('admin.certificates.create', ['enrollment_id' => $enrollment->id]) }}" class="px-2 py-1.5 text-blue-600 hover:text-blue-800 bg-blue-50 hover:bg-blue-100 rounded-lg border border-blue-200 transition-colors inline-flex items-center gap-1 text-[11px] font-bold" title="Terbitkan Sertifikat untuk Peserta ini">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                                            Sertifikat
                                        </a>
                                    @endif

                                    <form action="{{ route('admin.enrollments.status', $enrollment->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        <select name="status" onchange="this.form.submit()" class="bg-slate-50 border border-slate-200 text-slate-800 text-xs font-bold rounded-xl px-2 py-1.5 focus:outline-none focus:ring-2 focus:ring-emerald-500 shadow-sm cursor-pointer">
                                            <option value="Aktif" {{ $enrollment->status === 'Aktif' ? 'selected' : '' }}>🟢 Aktif</option>
                                            <option value="Selesai" {{ $enrollment->status === 'Selesai' ? 'selected' : '' }}>🔵 Selesai</option>
                                            <option value="Dibatalkan" {{ $enrollment->status === 'Dibatalkan' ? 'selected' : '' }}>🔴 Dibatalkan</option>
                                        </select>
                                    </form>

                                    <form action="{{ route('admin.enrollments.delete', $enrollment->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data pendaftaran ini?');" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 bg-red-50 hover:bg-red-100 p-1.5 rounded-lg border border-red-200 transition-colors" title="Hapus Data">
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
                            <td colspan="6" class="py-8 text-center text-slate-400 text-xs">Tidak ada data pendaftaran pelatihan yang sesuai.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
