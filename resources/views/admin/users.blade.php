@extends('admin.layout')

@section('title', 'Data Peserta Terdaftar')

@section('content')
    <!-- HEADER TITLE & FILTERS -->
    <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm space-y-4">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-slate-100 pb-4">
            <div>
                <h1 class="text-2xl font-extrabold text-slate-900 tracking-tight">Data Peserta Terdaftar</h1>
                <p class="text-slate-500 text-xs sm:text-sm mt-0.5">Daftar seluruh akun pengguna yang terdaftar di platform CV. SMARTPLUS INDONESIA</p>
            </div>
            <div class="text-xs font-bold text-slate-500 bg-slate-50 border border-slate-200 px-3.5 py-1.5 rounded-xl">
                Total Peserta: <span class="text-blue-600 font-extrabold">{{ count($users) }}</span>
            </div>
        </div>

        <!-- SEARCH FORM -->
        <form action="{{ route('admin.users') }}" method="GET" class="flex items-center gap-3">
            <div class="relative flex-1 w-full">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama, email, atau nomor HP peserta..." class="w-full pl-10 pr-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-emerald-500">
                <svg class="w-4 h-4 text-slate-400 absolute left-3.5 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>

            <button type="submit" class="bg-[#3cb759] hover:bg-[#329d4c] text-white font-bold text-xs px-5 py-2 rounded-xl transition-all shadow-sm">
                Cari
            </button>
            @if(request('search'))
                <a href="{{ route('admin.users') }}" class="bg-slate-200 hover:bg-slate-300 text-slate-700 font-bold text-xs px-4 py-2 rounded-xl transition-all">
                    Reset
                </a>
            @endif
        </form>
    </div>

    <!-- USERS TABLE CARD -->
    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs text-slate-600">
                <thead class="bg-slate-50 text-slate-500 uppercase text-[10px] tracking-wider border-b border-slate-100">
                    <tr>
                        <th class="py-3.5 px-4 font-bold">No</th>
                        <th class="py-3.5 px-4 font-bold">Peserta</th>
                        <th class="py-3.5 px-4 font-bold">Kontak & Gender</th>
                        <th class="py-3.5 px-4 font-bold">Role & Verifikasi</th>
                        <th class="py-3.5 px-4 font-bold">Pelatihan Diikuti</th>
                        <th class="py-3.5 px-4 font-bold">Tanggal Registrasi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($users as $userItem)
                        <tr class="hover:bg-slate-50/60 transition-colors">
                            <td class="py-4 px-4 font-semibold text-slate-500">{{ $loop->iteration }}</td>
                            <td class="py-4 px-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-9 h-9 rounded-full bg-slate-100 border border-slate-200 flex items-center justify-center font-bold text-slate-600 text-xs shrink-0 overflow-hidden">
                                        @if($userItem->photo)
                                            <img src="{{ asset($userItem->photo) }}" class="w-full h-full object-cover">
                                        @else
                                            {{ strtoupper(substr($userItem->name, 0, 2)) }}
                                        @endif
                                    </div>
                                    <div>
                                        <div class="font-bold text-slate-900">{{ $userItem->name }}</div>
                                        <div class="text-slate-400 text-[11px]">{{ $userItem->email }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-4 text-slate-700">
                                <div class="font-medium">📞 {{ $userItem->phone ?? '-' }}</div>
                                <div class="text-slate-400 text-[11px] capitalize">👤 {{ $userItem->gender ?? 'Belum diisi' }}</div>
                            </td>
                            <td class="py-4 px-4">
                                <div class="space-y-1">
                                    @if($userItem->role === 'admin')
                                        <span class="bg-purple-50 text-purple-700 border border-purple-200 text-[10px] font-extrabold px-2.5 py-0.5 rounded-full inline-block">
                                            👑 ADMIN
                                        </span>
                                    @else
                                        <span class="bg-blue-50 text-blue-700 border border-blue-200 text-[10px] font-extrabold px-2.5 py-0.5 rounded-full inline-block">
                                            USER
                                        </span>
                                    @endif

                                    @if($userItem->email_verified_at)
                                        <span class="bg-emerald-50 text-[#3cb759] border border-emerald-200 text-[10px] font-bold px-2 py-0.5 rounded-full block w-fit">
                                            ✓ Terverifikasi
                                        </span>
                                    @else
                                        <span class="bg-amber-50 text-amber-700 border border-amber-200 text-[10px] font-bold px-2 py-0.5 rounded-full block w-fit">
                                            ⏳ Belum Verifikasi
                                        </span>
                                    @endif
                                </div>
                            </td>
                            <td class="py-4 px-4 font-bold text-slate-800">
                                <span class="bg-slate-100 text-slate-700 text-xs px-2.5 py-1 rounded-lg">
                                    {{ $userItem->enrollments_count }} Program
                                </span>
                            </td>
                            <td class="py-4 px-4 text-slate-500 font-medium">
                                {{ $userItem->created_at->format('d M Y, H:i') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-8 text-center text-slate-400 text-xs">Tidak ada data peserta yang sesuai.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
