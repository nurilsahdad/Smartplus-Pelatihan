@extends('admin.layout')

@section('title', 'Manajemen Sertifikat Pelatihan')

@section('content')
    <!-- HEADER TITLE & STATS -->
    <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm space-y-6">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-slate-100 pb-4">
            <div>
                <h1 class="text-2xl font-extrabold text-slate-900 tracking-tight flex items-center gap-2.5">
                    <span class="p-2 bg-emerald-100 text-[#3cb759] rounded-xl text-lg">📜</span>
                    Manajemen Sertifikat Pelatihan
                </h1>
                <p class="text-slate-500 text-xs sm:text-sm mt-0.5">Kelola penerbitan, verifikasi, dan status sertifikat peserta pelatihan</p>
            </div>
            <a href="{{ route('admin.certificates.create') }}" class="inline-flex items-center gap-2 bg-[#3cb759] hover:bg-[#329d4c] text-white font-bold text-xs px-5 py-2.5 rounded-xl transition-all shadow-md shadow-emerald-500/10">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Terbitkan Sertifikat Baru
            </a>
        </div>

        <!-- STATS CARDS -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div class="p-4 rounded-xl bg-slate-50 border border-slate-100 flex items-center gap-3.5">
                <div class="w-10 h-10 rounded-lg bg-emerald-100 text-[#3cb759] flex items-center justify-center font-bold">
                    📜
                </div>
                <div>
                    <p class="text-[11px] font-bold text-slate-500 uppercase tracking-wider">Total Sertifikat</p>
                    <p class="text-xl font-black text-slate-900">{{ $stats['total'] }}</p>
                </div>
            </div>

            <div class="p-4 rounded-xl bg-emerald-50/50 border border-emerald-100 flex items-center gap-3.5">
                <div class="w-10 h-10 rounded-lg bg-emerald-500 text-white flex items-center justify-center font-bold">
                    ✓
                </div>
                <div>
                    <p class="text-[11px] font-bold text-emerald-700 uppercase tracking-wider">Sertifikat Aktif</p>
                    <p class="text-xl font-black text-emerald-800">{{ $stats['active'] }}</p>
                </div>
            </div>

            <div class="p-4 rounded-xl bg-red-50/50 border border-red-100 flex items-center gap-3.5">
                <div class="w-10 h-10 rounded-lg bg-red-500 text-white flex items-center justify-center font-bold">
                    ✕
                </div>
                <div>
                    <p class="text-[11px] font-bold text-red-700 uppercase tracking-wider">Dicabut / Tidak Berlaku</p>
                    <p class="text-xl font-black text-red-800">{{ $stats['revoked'] }}</p>
                </div>
            </div>
        </div>

        <!-- SEARCH & STATUS FILTER FORM -->
        <form action="{{ route('admin.certificates.index') }}" method="GET" class="flex flex-col sm:flex-row items-center gap-3 pt-2">
            <div class="relative flex-1 w-full">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama peserta atau program pelatihan..." class="w-full pl-10 pr-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-emerald-500">
                <svg class="w-4 h-4 text-slate-400 absolute left-3.5 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>

            <select name="status" onchange="this.form.submit()" class="w-full sm:w-44 px-3 py-2 bg-slate-50 border border-slate-200 text-slate-700 text-xs font-semibold rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500">
                <option value="all" {{ request('status') == 'all' ? 'selected' : '' }}>Semua Status</option>
                <option value="Aktif" {{ request('status') == 'Aktif' ? 'selected' : '' }}>🟢 Status: Aktif</option>
                <option value="Dicabut" {{ request('status') == 'Dicabut' ? 'selected' : '' }}>🔴 Status: Dicabut</option>
            </select>

            <button type="submit" class="w-full sm:w-auto bg-[#3cb759] hover:bg-[#329d4c] text-white font-bold text-xs px-5 py-2 rounded-xl transition-all shadow-sm">
                Cari
            </button>
            @if(request('search') || (request('status') && request('status') !== 'all'))
                <a href="{{ route('admin.certificates.index') }}" class="w-full sm:w-auto bg-slate-200 hover:bg-slate-300 text-slate-700 font-bold text-xs px-4 py-2 rounded-xl text-center transition-all">
                    Reset Filter
                </a>
            @endif
        </form>
    </div>

    <!-- CERTIFICATES TABLE CARD -->
    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs text-slate-600">
                <thead class="bg-slate-50 text-slate-500 uppercase text-[10px] tracking-wider border-b border-slate-100">
                    <tr>
                        <th class="py-3.5 px-4 font-bold">Berkas Sertifikat</th>
                        <th class="py-3.5 px-4 font-bold">Penerima (Peserta)</th>
                        <th class="py-3.5 px-4 font-bold">Program Pelatihan</th>
                        <th class="py-3.5 px-4 font-bold">Tanggal Terbit</th>
                        <th class="py-3.5 px-4 font-bold">Status</th>
                        <th class="py-3.5 px-4 font-bold text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($certificates as $certificate)
                        <tr class="hover:bg-slate-50/60 transition-colors">
                            <td class="py-4 px-4">
                                @if($certificate->file_path && $certificate->isImage())
                                    <a href="{{ asset($certificate->file_path) }}" target="_blank" class="block w-20 h-14 rounded-xl overflow-hidden border border-slate-200 shadow-xs hover:ring-2 hover:ring-blue-500 transition-all bg-slate-100 group/thumb" title="Klik untuk membuka gambar sertifikat">
                                        <img src="{{ asset($certificate->file_path) }}" alt="Berkas Sertifikat" class="w-full h-full object-cover group-hover/thumb:scale-105 transition-transform duration-200">
                                    </a>
                                @elseif($certificate->file_path && $certificate->isPdf())
                                    <a href="{{ asset($certificate->file_path) }}" target="_blank" class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-red-50 hover:bg-red-100 text-red-700 border border-red-200 rounded-xl font-bold text-xs transition-colors" title="Buka PDF">
                                        <span>📄</span> Dokumen PDF
                                    </a>
                                @elseif($certificate->file_path)
                                    <a href="{{ asset($certificate->file_path) }}" target="_blank" class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-emerald-50 hover:bg-emerald-100 text-emerald-700 border border-emerald-200 rounded-xl font-bold text-xs transition-colors">
                                        <span>🖼️</span> Lihat Berkas
                                    </a>
                                @else
                                    <span class="text-slate-400 text-xs italic">Belum ada berkas</span>
                                @endif
                            </td>
                            <td class="py-4 px-4">
                                <div class="font-bold text-slate-900">{{ $certificate->user->name ?? 'User Dihapus' }}</div>
                                <div class="text-slate-400 text-[11px]">{{ $certificate->user->email ?? '-' }}</div>
                            </td>
                            <td class="py-4 px-4">
                                <div class="font-bold text-slate-800">{{ $certificate->program_name }}</div>
                            </td>
                            <td class="py-4 px-4 text-slate-500 font-medium">
                                {{ \Carbon\Carbon::parse($certificate->issue_date)->format('d M Y') }}
                            </td>
                            <td class="py-4 px-4">
                                @if($certificate->status === 'Aktif')
                                    <span class="bg-emerald-50 text-[#3cb759] border border-emerald-200 text-[11px] font-extrabold px-3 py-1 rounded-full inline-flex items-center gap-1">
                                        <span class="w-1.5 h-1.5 rounded-full bg-[#3cb759]"></span>
                                        Aktif
                                    </span>
                                @else
                                    <span class="bg-red-50 text-red-600 border border-red-200 text-[11px] font-extrabold px-3 py-1 rounded-full inline-flex items-center gap-1">
                                        <span class="w-1.5 h-1.5 rounded-full bg-red-600"></span>
                                        Dicabut
                                    </span>
                                @endif
                            </td>
                            <td class="py-4 px-4 text-right">
                                <div class="flex items-center justify-end gap-1.5">
                                    <!-- Preview / Cetak -->
                                    <a href="{{ route('certificates.show', $certificate->id) }}" target="_blank" class="p-1.5 text-blue-600 hover:text-blue-800 bg-blue-50 hover:bg-blue-100 rounded-lg border border-blue-200 transition-colors" title="Lihat & Cetak Sertifikat">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                    </a>

                                    <!-- Edit -->
                                    <a href="{{ route('admin.certificates.edit', $certificate->id) }}" class="p-1.5 text-amber-600 hover:text-amber-800 bg-amber-50 hover:bg-amber-100 rounded-lg border border-amber-200 transition-colors" title="Edit Detail">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                    </a>

                                    <!-- Toggle Status Form -->
                                    <form action="{{ route('admin.certificates.toggle-status', $certificate->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        <button type="submit" class="p-1.5 {{ $certificate->status === 'Aktif' ? 'text-slate-600 hover:text-red-700 bg-slate-50 hover:bg-red-50 border-slate-200 hover:border-red-200' : 'text-emerald-600 hover:text-emerald-800 bg-emerald-50 hover:bg-emerald-100 border-emerald-200' }} rounded-lg border transition-colors" title="{{ $certificate->status === 'Aktif' ? 'Cabut Sertifikat' : 'Aktifkan Kembali' }}">
                                            @if($certificate->status === 'Aktif')
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"></path></svg>
                                            @else
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                            @endif
                                        </button>
                                    </form>

                                    <!-- Delete -->
                                    <form action="{{ route('admin.certificates.destroy', $certificate->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data sertifikat ini secara permanen?');" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-1.5 text-red-500 hover:text-red-700 bg-red-50 hover:bg-red-100 rounded-lg border border-red-200 transition-colors" title="Hapus Sertifikat">
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
                            <td colspan="6" class="py-10 text-center text-slate-400">
                                <div class="w-12 h-12 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-2 text-xl">📜</div>
                                <p class="font-semibold text-slate-600">Belum ada data sertifikat yang diterbitkan</p>
                                <p class="text-[11px] text-slate-400 mt-0.5">Klik tombol "Terbitkan Sertifikat Baru" untuk memberikan sertifikat kepada peserta.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($certificates->hasPages())
            <div class="pt-4 border-t border-slate-100">
                {{ $certificates->links() }}
            </div>
        @endif
    </div>
@endsection
