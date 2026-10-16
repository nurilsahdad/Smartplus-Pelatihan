@extends('admin.layout')

@section('title', 'Tambah Program Pelatihan')

@section('content')
    <div class="max-w-4xl mx-auto space-y-6">
        <!-- HEADER TITLE -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-extrabold text-slate-900 tracking-tight">Tambah Program Pelatihan Baru</h1>
                <p class="text-slate-500 text-xs sm:text-sm mt-0.5">Isi formulir berikut untuk membuat program pelatihan baru di sistem</p>
            </div>
            <a href="{{ route('admin.programs.index') }}" class="inline-flex items-center gap-2 bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs px-4 py-2.5 rounded-xl transition-all border border-slate-200">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali
            </a>
        </div>

        <!-- FORM CARD -->
        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 sm:p-8">
            <form action="{{ route('admin.programs.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <!-- Nama Program -->
                    <div class="space-y-1.5 sm:col-span-2">
                        <label for="name" class="block text-xs font-bold text-slate-700">Nama Program Pelatihan <span class="text-red-500">*</span></label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Contoh: Machine Learning with Python" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-emerald-500">
                        @error('name')
                            <p class="text-red-500 text-[11px] mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Upload Gambar Produk -->
                    <div class="space-y-1.5 sm:col-span-2">
                        <label for="image" class="block text-xs font-bold text-slate-700">Gambar Produk Pelatihan</label>
                        <div class="flex items-center gap-4 bg-slate-50 p-4 rounded-xl border border-slate-200">
                            <div class="w-20 h-20 rounded-xl bg-white border border-slate-200 flex items-center justify-center overflow-hidden shrink-0 shadow-xs" id="image-preview-container">
                                <svg class="w-8 h-8 text-slate-300" id="image-placeholder-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <img id="image-preview" src="#" alt="Preview" class="w-full h-full object-cover hidden">
                            </div>
                            <div class="space-y-1 flex-1">
                                <input type="file" id="image" name="image" accept="image/*" onchange="previewProductImage(this)" class="block w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-emerald-50 file:text-[#3cb759] hover:file:bg-emerald-100 cursor-pointer">
                                <p class="text-[11px] text-slate-400">Format yang didukung: PNG, JPG, JPEG, WEBP. Maksimal 2MB.</p>
                            </div>
                        </div>
                        @error('image')
                            <p class="text-red-500 text-[11px] mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Harga -->
                    <div class="space-y-1.5">
                        <label for="price" class="block text-xs font-bold text-slate-700">Harga Program</label>
                        <input type="text" id="price" name="price" value="{{ old('price', 'Gratis') }}" placeholder="Contoh: Gratis / Rp 500.000" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-emerald-500">
                        @error('price')
                            <p class="text-red-500 text-[11px] mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Durasi -->
                    <div class="space-y-1.5">
                        <label for="duration" class="block text-xs font-bold text-slate-700">Durasi Pelatihan</label>
                        <input type="text" id="duration" name="duration" value="{{ old('duration', '4 Minggu') }}" placeholder="Contoh: 4 Minggu" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-emerald-500">
                        @error('duration')
                            <p class="text-red-500 text-[11px] mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Level -->
                    <div class="space-y-1.5">
                        <label for="level" class="block text-xs font-bold text-slate-700">Tingkat / Level</label>
                        <select id="level" name="level" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-800 focus:outline-none focus:ring-2 focus:ring-emerald-500">
                            <option value="Pemula" {{ old('level') == 'Pemula' ? 'selected' : '' }}>Pemula (Beginner)</option>
                            <option value="Menengah" {{ old('level') == 'Menengah' ? 'selected' : '' }}>Menengah (Intermediate)</option>
                            <option value="Lanjutan" {{ old('level') == 'Lanjutan' ? 'selected' : '' }}>Lanjutan (Advanced)</option>
                        </select>
                        @error('level')
                            <p class="text-red-500 text-[11px] mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div class="space-y-1.5">
                        <label for="status" class="block text-xs font-bold text-slate-700">Status Keaktifan <span class="text-red-500">*</span></label>
                        <select id="status" name="status" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-800 focus:outline-none focus:ring-2 focus:ring-emerald-500">
                            <option value="Aktif" {{ old('status') == 'Aktif' ? 'selected' : '' }}>🟢 Aktif</option>
                            <option value="Nonaktif" {{ old('status') == 'Nonaktif' ? 'selected' : '' }}>⚪ Nonaktif</option>
                        </select>
                        @error('status')
                            <p class="text-red-500 text-[11px] mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Badge Label (Opsional) -->
                    <div class="space-y-1.5 sm:col-span-2">
                        <label for="badge" class="block text-xs font-bold text-slate-700">Badge Tag (Opsional)</label>
                        <input type="text" id="badge" name="badge" value="{{ old('badge') }}" placeholder="Contoh: Popular, Terbaru, Rekomendasi" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-emerald-500">
                        @error('badge')
                            <p class="text-red-500 text-[11px] mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Deskripsi -->
                    <div class="space-y-1.5 sm:col-span-2">
                        <label for="description" class="block text-xs font-bold text-slate-700">Deskripsi Program</label>
                        <textarea id="description" name="description" rows="4" placeholder="Jelaskan ringkasan materi dan cakupan program pelatihan..." class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-emerald-500">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-[11px] mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="pt-4 border-t border-slate-100 flex items-center justify-end gap-3">
                    <a href="{{ route('admin.programs.index') }}" class="bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs px-5 py-2.5 rounded-xl transition-all border border-slate-200">
                        Batal
                    </a>
                    <button type="submit" class="bg-[#3cb759] hover:bg-[#329d4c] text-white font-bold text-xs px-6 py-2.5 rounded-xl shadow-md transition-all">
                        Simpan Program Pelatihan
                    </button>
                </div>
            </form>
    </div>

    <script>
        function previewProductImage(input) {
            const preview = document.getElementById('image-preview');
            const placeholder = document.getElementById('image-placeholder-icon');
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                    placeholder.classList.add('hidden');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
