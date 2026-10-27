@extends('admin.layout')

@section('title', 'Manajemen Artikel & Insight')

@section('content')
    <!-- HEADER TITLE & FILTERS -->
    <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm space-y-4">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-slate-100 pb-4">
            <div>
                <h1 class="text-2xl font-extrabold text-slate-900 tracking-tight">Manajemen Artikel</h1>
                <p class="text-slate-500 text-xs sm:text-sm mt-0.5">Kelola konten artikel, tips, dan wawasan teknologi untuk halaman utama</p>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.articles.create') }}" class="inline-flex items-center gap-2 bg-[#3cb759] hover:bg-[#329d4c] text-white font-bold text-xs px-4 py-2.5 rounded-xl shadow-sm transition-all hover:-translate-y-0.5">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Tambah Artikel Baru
                </a>
            </div>
        </div>

        <!-- SEARCH & FILTER FORM -->
        <form action="{{ route('admin.articles.index') }}" method="GET" class="flex flex-col sm:flex-row items-center gap-3">
            <div class="relative flex-1 w-full">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari judul artikel, topik, atau penulis..." class="w-full pl-10 pr-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-emerald-500">
                <svg class="w-4 h-4 text-slate-400 absolute left-3.5 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>

            <select name="category" onchange="this.form.submit()" class="w-full sm:w-44 px-3 py-2 bg-slate-50 border border-slate-200 text-slate-700 text-xs font-semibold rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500">
                <option value="all">Semua Kategori</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat }}" {{ request('category') == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                @endforeach
            </select>

            <select name="status" onchange="this.form.submit()" class="w-full sm:w-40 px-3 py-2 bg-slate-50 border border-slate-200 text-slate-700 text-xs font-semibold rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500">
                <option value="all">Semua Status</option>
                <option value="Published" {{ request('status') == 'Published' ? 'selected' : '' }}>Published</option>
                <option value="Draft" {{ request('status') == 'Draft' ? 'selected' : '' }}>Draft</option>
            </select>

            <button type="submit" class="w-full sm:w-auto bg-[#3cb759] hover:bg-[#329d4c] text-white font-bold text-xs px-5 py-2 rounded-xl transition-all shadow-sm">
                Filter
            </button>
            @if(request('search') || (request('status') && request('status') !== 'all') || (request('category') && request('category') !== 'all'))
                <a href="{{ route('admin.articles.index') }}" class="w-full sm:w-auto bg-slate-200 hover:bg-slate-300 text-slate-700 font-bold text-xs px-4 py-2 rounded-xl text-center transition-all">
                    Reset
                </a>
            @endif
        </form>
    </div>

    <!-- ARTICLES TABLE CARD -->
    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs text-slate-600">
                <thead class="bg-slate-50 text-slate-500 uppercase text-[10px] tracking-wider border-b border-slate-100">
                    <tr>
                        <th class="py-3.5 px-4 font-bold">No</th>
                        <th class="py-3.5 px-4 font-bold">Thumbnail</th>
                        <th class="py-3.5 px-4 font-bold">Judul Artikel</th>
                        <th class="py-3.5 px-4 font-bold">Kategori</th>
                        <th class="py-3.5 px-4 font-bold">Status</th>
                        <th class="py-3.5 px-4 font-bold">Tanggal</th>
                        <th class="py-3.5 px-4 font-bold text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($articles as $article)
                        <tr class="hover:bg-slate-50/60 transition-colors">
                            <td class="py-4 px-4 font-semibold text-slate-500">
                                {{ ($articles->currentPage() - 1) * $articles->perPage() + $loop->iteration }}
                            </td>
                            <td class="py-4 px-4">
                                <div class="w-16 h-12 rounded-xl overflow-hidden bg-slate-100 border border-slate-200 shrink-0">
                                    @if($article->image)
                                        <img src="{{ str_starts_with($article->image, 'http') ? $article->image : asset($article->image) }}" alt="{{ $article->title }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-slate-400">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                        </div>
                                    @endif
                                </div>
                            </td>
                            <td class="py-4 px-4 max-w-md">
                                <span class="font-bold text-slate-900 block leading-snug">
                                    {{ $article->title }}
                                </span>
                            </td>
                            <td class="py-4 px-4">
                                <span class="bg-blue-50 text-blue-600 border border-blue-200 text-[10px] font-bold px-2.5 py-0.5 rounded-full inline-block">
                                    {{ $article->category }}
                                </span>
                            </td>
                            <td class="py-4 px-4">
                                @if($article->status === 'Published')
                                    <span class="bg-emerald-50 text-[#3cb759] border border-emerald-200 text-[10px] font-bold px-2.5 py-0.5 rounded-full">
                                        ✓ Published
                                    </span>
                                @else
                                    <span class="bg-amber-50 text-amber-700 border border-amber-200 text-[10px] font-bold px-2.5 py-0.5 rounded-full">
                                        ✎ Draft
                                    </span>
                                @endif
                            </td>
                            <td class="py-4 px-4 text-slate-400 text-[11px] whitespace-nowrap">
                                {{ $article->created_at->format('d M Y') }}
                            </td>
                            <td class="py-4 px-4 text-right">
                                <div class="inline-flex items-center gap-1">
                                    <a href="{{ route('admin.articles.edit', $article->id) }}" title="Edit Artikel" class="p-1.5 text-slate-500 hover:text-emerald-600 rounded-lg hover:bg-emerald-50 transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                    </a>
                                    <form action="{{ route('admin.articles.destroy', $article->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" title="Hapus Artikel" class="p-1.5 text-slate-400 hover:text-red-600 rounded-lg hover:bg-red-50 transition-colors">
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
                            <td colspan="9" class="py-12 text-center text-slate-400">
                                <div class="w-12 h-12 rounded-full bg-slate-100 flex items-center justify-center mx-auto mb-3 text-slate-400">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                    </svg>
                                </div>
                                <p class="text-xs font-semibold">Belum ada artikel yang ditambahkan.</p>
                                <a href="{{ route('admin.articles.create') }}" class="inline-block mt-3 text-xs text-emerald-600 font-bold hover:underline">
                                    + Tambah Artikel Pertama
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($articles->hasPages())
            <div class="mt-6 border-t border-slate-100 pt-4">
                {{ $articles->links() }}
            </div>
        @endif
    </div>
@endsection
