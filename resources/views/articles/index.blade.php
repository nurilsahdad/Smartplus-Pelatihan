<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Artikel & Wawasan Teknologi - CV. SMARTPLUS INDONESIA</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
    @endif
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-[#f8fafc] text-slate-800 antialiased selection:bg-blue-500 selection:text-white">

    <!-- Strip gradient di belakang navbar fixed (tinggi = h-20) -->
    <div class="h-20 bg-gradient-to-r from-[#2d5bf0] to-[#2d5bf0]">
        @include('partials.navbar')
    </div>

    <!-- MAIN ARTICLES ARCHIVE -->
    <main class="py-10 sm:py-16 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto space-y-10 sm:space-y-12">

            <!-- Section Header -->
            <div class="text-center max-w-3xl mx-auto space-y-3">
                <span class="inline-block bg-[#dce4fe] text-[#3b66f5] font-semibold text-xs sm:text-sm px-4 py-1.5 rounded-full">
                    BLOG & INSIGHT
                </span>
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-slate-900 tracking-tight">
                    Artikel & Wawasan Teknologi
                </h1>
                <p class="text-slate-600 text-sm sm:text-lg">
                    Pelajari perkembangan terkini seputar Internet of Things (IoT), Agentic AI, dan otomasi industri dari praktisi kami.
                </p>
            </div>

            <!-- Search & Category Filters -->
            <div class="bg-white p-4 sm:p-6 rounded-2xl border border-slate-200/80 shadow-sm max-w-4xl mx-auto">
                <form action="{{ route('articles.index') }}" method="GET" class="flex flex-col sm:flex-row items-center gap-3">
                    <div class="relative flex-1 w-full">
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari artikel berdasarkan judul atau topik..."
                               class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-emerald-500">
                        <svg class="w-4 h-4 text-slate-400 absolute left-3.5 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>

                    <select name="category" onchange="this.form.submit()" class="w-full sm:w-52 px-3.5 py-2.5 bg-slate-50 border border-slate-200 text-slate-700 text-xs sm:text-sm font-semibold rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500">
                        <option value="">Semua Kategori</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat }}" {{ request('category') == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                        @endforeach
                    </select>

                    <button type="submit" class="w-full sm:w-auto bg-[#3cb759] hover:bg-[#329d4c] text-white font-bold text-xs sm:text-sm px-6 py-2.5 rounded-xl transition-all shadow-sm">
                        Cari
                    </button>
                    @if(request('search') || request('category'))
                        <a href="{{ route('articles.index') }}" class="w-full sm:w-auto bg-slate-200 hover:bg-slate-300 text-slate-700 font-bold text-xs sm:text-sm px-4 py-2.5 rounded-xl text-center transition-all">
                            Reset
                        </a>
                    @endif
                </form>
            </div>

            <!-- Articles Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                @forelse($articles as $article)
                    <div class="bg-white rounded-3xl overflow-hidden border border-slate-200/70 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col group hover:-translate-y-1">
                        <div class="h-48 sm:h-52 overflow-hidden bg-slate-100 relative">
                            @if($article->image)
                                <img src="{{ str_starts_with($article->image, 'http') ? $article->image : asset($article->image) }}" alt="{{ $article->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-slate-100 text-slate-400">
                                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                    </svg>
                                </div>
                            @endif
                            <div class="absolute top-3 left-3">
                                <span class="bg-white/90 backdrop-blur-xs text-blue-600 font-bold text-[10px] px-3 py-1 rounded-full shadow-xs border border-white">
                                    {{ $article->category }}
                                </span>
                            </div>
                        </div>

                        <div class="p-6 flex flex-col justify-between flex-1 space-y-4">
                            <div class="space-y-2">
                                <div class="text-[11px] text-slate-400 font-medium">
                                    {{ $article->created_at->translatedFormat('d M Y') }} • {{ $article->author }}
                                </div>
                                <h2 class="text-base sm:text-lg font-bold text-slate-900 group-hover:text-blue-600 transition-colors line-clamp-2">
                                    <a href="{{ route('articles.show', $article->slug) }}">
                                        {{ $article->title }}
                                    </a>
                                </h2>
                                <p class="text-slate-500 text-xs sm:text-sm line-clamp-3 leading-relaxed">
                                    {{ $article->excerpt ?? Str::limit(strip_tags($article->content), 120) }}
                                </p>
                            </div>

                            <div class="pt-2 border-t border-slate-100 flex items-center justify-between">
                                <a href="{{ route('articles.show', $article->slug) }}" class="inline-flex items-center text-[#3cb759] font-bold text-xs hover:text-[#329d4c] transition-colors group">
                                    Readmore
                                    <svg class="w-3.5 h-3.5 ml-1 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                    </svg>
                                </a>
                                <span class="text-[11px] text-slate-400">
                                    {{ number_format($article->views) }} views
                                </span>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-16 text-center">
                        <div class="w-16 h-16 rounded-full bg-slate-100 flex items-center justify-center mx-auto mb-4 text-slate-400">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                            </svg>
                        </div>
                        <h3 class="text-base font-bold text-slate-800">Tidak ada artikel yang ditemukan</h3>
                        <p class="text-xs text-slate-500 mt-1">Coba gunakan kata kunci pencarian yang lain.</p>
                        <a href="{{ route('articles.index') }}" class="inline-block mt-4 text-xs font-bold text-emerald-600 hover:underline">
                            Lihat Semua Artikel
                        </a>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($articles->hasPages())
                <div class="pt-6">
                    {{ $articles->links() }}
                </div>
            @endif

        </div>
    </main>

    <!-- FOOTER -->
    @include('partials.footer')

</body>
</html>
