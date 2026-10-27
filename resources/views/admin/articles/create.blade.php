@extends('admin.layout')

@section('title', 'Tambah Artikel Baru')

@section('content')
    <div class="max-w-3xl mx-auto space-y-6">

        <!-- TOP BAR & BACK BUTTON -->
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.articles.index') }}" class="p-2 bg-white rounded-xl border border-slate-200 text-slate-600 hover:bg-slate-50 transition-colors shadow-xs">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                </a>
                <div>
                    <h1 class="text-xl sm:text-2xl font-extrabold text-slate-900 tracking-tight">Tambah Artikel Baru</h1>
                    <p class="text-slate-500 text-xs">Tambahkan artikel untuk ditampilkan pada kartu bagian "Artikel Terbaru" di halaman utama</p>
                </div>
            </div>
        </div>

        <!-- FORM CARD -->
        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 sm:p-8">
            <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <!-- JUDUL ARTIKEL -->
                <div>
                    <label for="title" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
                        Judul Artikel <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}" required
                           placeholder="Contoh: Penerapan Artificial Intelligence dalam Industri Modern."
                           class="w-full px-4 py-3 bg-slate-50 border @error('title') border-red-400 @else border-slate-200 @enderror rounded-xl text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition-all">
                    @error('title')
                        <p class="text-xs text-red-500 mt-1 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <!-- THUMBNAIL / GAMBAR SAMPUL -->
                <div class="p-4 bg-slate-50 rounded-2xl border border-slate-200/80 space-y-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-800 uppercase tracking-wider">
                            Gambar Sampul / Thumbnail <span class="text-red-500">*</span>
                        </label>
                        <p class="text-[11px] text-slate-500 mt-0.5">Unggah file foto langsung (maks 2MB) ATAU gunakan tautan/URL gambar online</p>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 items-start">
                        <div>
                            <label for="image" class="block text-[11px] font-semibold text-slate-600 mb-1">Upload File (JPG, PNG, WebP):</label>
                            <input type="file" id="image" name="image" accept="image/*" onchange="previewImage(event)"
                                   class="block w-full text-xs text-slate-500 file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100 cursor-pointer">
                            @error('image')
                                <p class="text-xs text-red-500 mt-1 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="image_url" class="block text-[11px] font-semibold text-slate-600 mb-1">Atau Gunakan Link URL Gambar:</label>
                            <input type="url" id="image_url" name="image_url" value="{{ old('image_url') }}"
                                   placeholder="https://images.unsplash.com/..."
                                   class="w-full px-3 py-2 bg-white border border-slate-200 rounded-xl text-xs text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-emerald-500">
                        </div>
                    </div>

                    <!-- Image Preview Container -->
                    <div id="preview-wrapper" class="hidden pt-2">
                        <span class="text-[10px] uppercase font-bold text-slate-400 block mb-1">Pratinjau Gambar:</span>
                        <div class="w-48 h-28 rounded-xl overflow-hidden border border-slate-200 bg-slate-100 shadow-xs">
                            <img id="image-preview" src="#" alt="Preview" class="w-full h-full object-cover">
                        </div>
                    </div>
                </div>

                <!-- 2 COLUMNS: KATEGORI & STATUS -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="category" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
                            Kategori (Opsional)
                        </label>
                        <input type="text" id="category" name="category" list="category_suggestions" value="{{ old('category', 'Teknologi') }}"
                               placeholder="Contoh: Artificial Intelligence"
                               class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition-all">
                        <datalist id="category_suggestions">
                            <option value="Artificial Intelligence">
                            <option value="Internet of Things">
                            <option value="Agentic AI">
                            <option value="Industrial IoT">
                            <option value="Teknologi">
                        </datalist>
                    </div>

                    <div>
                        <label for="status" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
                            Status Publikasi <span class="text-red-500">*</span>
                        </label>
                        <select id="status" name="status" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-800 font-semibold focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition-all">
                            <option value="Published" {{ old('status') === 'Published' ? 'selected' : '' }}>✓ Published (Tampilkan di Beranda)</option>
                            <option value="Draft" {{ old('status') === 'Draft' ? 'selected' : '' }}>✎ Draft (Jangan Tampilkan Dulu)</option>
                        </select>
                    </div>
                </div>

                <!-- SUBMIT ACTIONS -->
                <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100">
                    <a href="{{ route('admin.articles.index') }}" class="px-5 py-2.5 rounded-xl border border-slate-200 text-slate-600 font-bold text-xs hover:bg-slate-50 transition-colors">
                        Batal
                    </a>
                    <button type="submit" class="px-6 py-2.5 bg-[#3cb759] hover:bg-[#329d4c] text-white font-bold text-xs rounded-xl shadow-md shadow-emerald-500/20 transition-all hover:-translate-y-0.5">
                        Simpan Artikel
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('image-preview');
            const wrapper = document.getElementById('preview-wrapper');

            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    wrapper.classList.remove('hidden');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
