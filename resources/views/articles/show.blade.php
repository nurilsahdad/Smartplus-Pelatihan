<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $article->title }} - CV. SMARTPLUS INDONESIA</title>

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

    <!-- MAIN ARTICLE CONTENT -->
    <main class="py-10 sm:py-14 lg:py-20 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto space-y-8">

            <!-- Breadcrumbs & Category Badge -->
            <div class="flex flex-wrap items-center justify-between gap-3 border-b border-slate-200/70 pb-4">
                <nav class="flex items-center space-x-2 text-xs sm:text-sm text-slate-500">
                    <a href="{{ url('/') }}" class="hover:text-blue-600 transition-colors font-medium">Beranda</a>
                    <span>/</span>
                    <a href="{{ route('articles.index') }}" class="hover:text-blue-600 transition-colors font-medium">Artikel</a>
                    <span>/</span>
                    <span class="text-slate-800 font-bold truncate max-w-[200px] sm:max-w-xs">{{ $article->title }}</span>
                </nav>
                <span class="bg-blue-50 text-blue-600 border border-blue-200 font-bold text-xs px-3 py-1 rounded-full">
                    {{ $article->category }}
                </span>
            </div>

            <!-- Header Title & Metadata -->
            <div class="space-y-4">
                <h1 class="text-2xl sm:text-4xl lg:text-5xl font-extrabold text-slate-900 tracking-tight leading-tight">
                    {{ $article->title }}
                </h1>

                <div class="flex flex-wrap items-center gap-4 text-xs sm:text-sm text-slate-500">
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 font-bold flex items-center justify-center text-xs">
                            {{ strtoupper(substr($article->author, 0, 1)) }}
                        </div>
                        <span class="font-bold text-slate-800">{{ $article->author }}</span>
                    </div>
                    <span>•</span>
                    <div class="flex items-center gap-1.5">
                        <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <span>{{ $article->created_at->translatedFormat('d F Y') }}</span>
                    </div>
                    <span>•</span>
                    <div class="flex items-center gap-1.5">
                        <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                        <span>{{ number_format($article->views) }} kali dibaca</span>
                    </div>
                </div>
            </div>

            <!-- Featured Thumbnail Image -->
            @if($article->image)
                <div class="rounded-3xl overflow-hidden shadow-lg border border-slate-200/80 bg-slate-100 max-h-[480px]">
                    <img src="{{ str_starts_with($article->image, 'http') ? $article->image : asset($article->image) }}" alt="{{ $article->title }}" class="w-full h-full object-cover">
                </div>
            @endif

            <!-- Article Excerpt Highlight (if available) -->
            @if($article->excerpt)
                <div class="p-5 sm:p-6 bg-blue-50/70 border-l-4 border-blue-500 rounded-r-2xl text-slate-700 text-sm sm:text-base italic leading-relaxed">
                    "{{ $article->excerpt }}"
                </div>
            @endif

            <!-- Article Body Content -->
            <div class="bg-white rounded-3xl p-6 sm:p-10 shadow-sm border border-slate-100 leading-relaxed text-slate-700 text-sm sm:text-base space-y-4">
                {!! nl2br(e($article->content)) !!}
            </div>

            <!-- Share & Action Box -->
            <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm flex flex-col sm:flex-row items-center justify-between gap-4">
                <div class="text-center sm:text-left">
                    <h3 class="font-bold text-slate-900 text-sm sm:text-base">Bagikan Artikel Ini</h3>
                    <p class="text-slate-500 text-xs">Bagikan wawasan teknologi ini kepada rekan Anda</p>
                </div>
                <div class="flex items-center gap-2">
                    <a href="https://api.whatsapp.com/send?text={{ urlencode($article->title . ' ' . url()->current()) }}" target="_blank" class="px-4 py-2 bg-emerald-50 text-emerald-600 hover:bg-emerald-100 font-bold text-xs rounded-xl transition-colors inline-flex items-center gap-1.5">
                        WhatsApp
                    </a>
                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}" target="_blank" class="px-4 py-2 bg-blue-50 text-blue-600 hover:bg-blue-100 font-bold text-xs rounded-xl transition-colors inline-flex items-center gap-1.5">
                        LinkedIn
                    </a>
                    <button onclick="navigator.clipboard.writeText(window.location.href); alert('Tautan artikel berhasil disalin!');" class="px-4 py-2 bg-slate-100 text-slate-700 hover:bg-slate-200 font-bold text-xs rounded-xl transition-colors">
                        Salin Tautan
                    </button>
                </div>
            </div>

            <!-- RELATED ARTICLES -->
            @if($relatedArticles->count() > 0)
                <div class="pt-8 space-y-6">
                    <div class="flex items-center justify-between">
                        <h2 class="text-xl sm:text-2xl font-extrabold text-slate-900">Artikel Terkait Lainnya</h2>
                        <a href="{{ route('articles.index') }}" class="text-xs font-bold text-emerald-600 hover:underline">Lihat Semua →</a>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        @foreach($relatedArticles as $related)
                            <div class="bg-white rounded-2xl overflow-hidden border border-slate-200/70 shadow-sm hover:shadow-md transition-all duration-300 flex flex-col">
                                <div class="h-36 overflow-hidden bg-slate-100">
                                    @if($related->image)
                                        <img src="{{ str_starts_with($related->image, 'http') ? $related->image : asset($related->image) }}" alt="{{ $related->title }}" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center bg-slate-100 text-slate-400">
                                            <span class="text-xs font-bold">{{ $related->category }}</span>
                                        </div>
                                    @endif
                                </div>
                                <div class="p-4 flex flex-col justify-between flex-1 space-y-3">
                                    <div>
                                        <span class="text-[10px] font-bold text-blue-600 uppercase">{{ $related->category }}</span>
                                        <h3 class="text-xs sm:text-sm font-bold text-slate-900 line-clamp-2 mt-1">
                                            {{ $related->title }}
                                        </h3>
                                    </div>
                                    <div>
                                        <a href="{{ route('articles.show', $related->slug) }}" class="inline-flex items-center text-[#3cb759] font-semibold text-xs hover:text-[#329d4c] transition-colors group">
                                            Readmore
                                            <svg class="w-3.5 h-3.5 ml-1 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

        </div>
    </main>

    <!-- FOOTER -->
    @include('partials.footer')

</body>
</html>
