@extends('admin.layout')

@section('title', 'Edit Sertifikat Pelatihan')

@section('content')
    <div class="max-w-5xl mx-auto space-y-6">

        <!-- HEADER & BREADCRUMB -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 pb-2 border-b border-slate-100">
            <div>
                <a href="{{ route('admin.certificates.index') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-slate-500 hover:text-[#3cb759] transition-colors mb-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Kembali ke Daftar Sertifikat
                </a>
                <h1 class="text-2xl font-black text-slate-900 tracking-tight flex items-center gap-2.5">
                    <span class="w-9 h-9 rounded-xl bg-amber-100 text-amber-600 flex items-center justify-center text-lg shadow-xs">
                        ✏️
                    </span>
                    Edit Sertifikat
                </h1>
                <p class="text-slate-500 text-xs sm:text-sm mt-1">
                    Perbarui berkas gambar atau ubah status keabsahan sertifikat peserta.
                </p>
            </div>

            <a href="{{ route('certificates.show', $certificate->id) }}" target="_blank"
               class="self-start sm:self-center inline-flex items-center gap-2 bg-blue-50 text-blue-600 hover:bg-blue-100 border border-blue-200 text-xs font-bold px-4 py-2.5 rounded-xl transition-colors shadow-xs">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                </svg>
                Lihat Sertifikat
            </a>
        </div>

        @if($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-800 p-4 rounded-2xl text-xs space-y-1 shadow-xs">
                <div class="flex items-center gap-2 font-bold text-red-900">
                    <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Mohon periksa kembali formulir:
                </div>
                <ul class="list-disc list-inside space-y-0.5 pl-6">
                    @foreach($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.certificates.update', $certificate->id) }}" method="POST" enctype="multipart/form-data" id="editForm">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">

                <!-- ============================================== -->
                <!-- KOLOM KIRI: INFO PESERTA + STATUS (4 COLS) -->
                <!-- ============================================== -->
                <div class="lg:col-span-4 space-y-5">

                    <!-- KARTU INFO PESERTA -->
                    <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs p-5 space-y-4">
                        <div class="text-xs font-black text-slate-900 uppercase tracking-wider flex items-center gap-2">
                            <span class="w-6 h-6 rounded-lg bg-slate-100 text-slate-600 flex items-center justify-center text-sm">👤</span>
                            Info Peserta
                        </div>

                        <div class="flex items-center gap-4 p-4 bg-slate-50 rounded-2xl border border-slate-200/80">
                            <div class="w-12 h-12 rounded-xl bg-emerald-500 text-white font-black text-base flex items-center justify-center shrink-0 shadow-xs">
                                {{ strtoupper(substr($certificate->user?->name ?? 'P', 0, 2)) }}
                            </div>
                            <div class="min-w-0">
                                <h3 class="text-sm font-black text-slate-900 leading-tight truncate">
                                    {{ $certificate->user?->name ?? 'Peserta Tidak Ditemukan' }}
                                </h3>
                                <p class="text-[11px] text-slate-500 truncate mt-0.5">
                                    {{ $certificate->user?->email ?? '-' }}
                                </p>
                                <p class="text-[11px] font-semibold text-emerald-700 truncate mt-0.5">
                                    {{ $certificate->program_name }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- KARTU STATUS SERTIFIKAT -->
                    <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs p-5 space-y-4">
                        <div class="text-xs font-black text-slate-900 uppercase tracking-wider flex items-center gap-2">
                            <span class="w-6 h-6 rounded-lg bg-slate-100 text-slate-600 flex items-center justify-center text-sm">🔒</span>
                            Status Sertifikat
                        </div>

                        <!-- STATUS TOGGLE BUTTONS -->
                        <div class="flex gap-2">
                            <label class="flex-1 cursor-pointer">
                                <input type="radio" name="status" value="Aktif" class="sr-only peer" {{ old('status', $certificate->status) == 'Aktif' ? 'checked' : '' }}>
                                <div class="text-center text-xs font-bold py-3 rounded-2xl border-2 transition-all
                                            border-slate-200 text-slate-500
                                            peer-checked:border-emerald-500 peer-checked:bg-emerald-50 peer-checked:text-emerald-700">
                                    <div class="text-lg mb-1">✅</div>
                                    Aktif
                                    <div class="text-[10px] font-semibold opacity-70">Berlaku</div>
                                </div>
                            </label>
                            <label class="flex-1 cursor-pointer">
                                <input type="radio" name="status" value="Dicabut" class="sr-only peer" {{ old('status', $certificate->status) == 'Dicabut' ? 'checked' : '' }}>
                                <div class="text-center text-xs font-bold py-3 rounded-2xl border-2 transition-all
                                            border-slate-200 text-slate-500
                                            peer-checked:border-red-500 peer-checked:bg-red-50 peer-checked:text-red-700">
                                    <div class="text-lg mb-1">🚫</div>
                                    Dicabut
                                    <div class="text-[10px] font-semibold opacity-70">Tidak Berlaku</div>
                                </div>
                            </label>
                        </div>

                        <p class="text-[11px] text-slate-400 leading-snug">
                            Sertifikat yang dicabut tidak akan muncul di dashboard peserta sebagai dokumen berlaku.
                        </p>
                    </div>

                    <!-- TOMBOL AKSI -->
                    <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs p-5 space-y-3">
                        <button type="submit" class="w-full bg-[#3cb759] hover:bg-[#329d4c] text-white font-black text-sm py-3.5 px-6 rounded-2xl transition-all shadow-md shadow-emerald-500/20 hover:scale-[1.01] flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            Simpan Perubahan
                        </button>
                        <a href="{{ route('admin.certificates.index') }}" class="w-full block text-center py-3 px-6 rounded-2xl border border-slate-200 text-slate-600 hover:bg-slate-50 font-bold text-sm transition-colors">
                            Batal
                        </a>
                    </div>

                </div>

                <!-- ============================================== -->
                <!-- KOLOM KANAN: GAMBAR SERTIFIKAT (8 COLS) -->
                <!-- ============================================== -->
                <div class="lg:col-span-8 bg-white rounded-3xl border border-slate-200/80 shadow-xs p-5 sm:p-6 space-y-5">

                    <div class="flex items-center justify-between">
                        <div class="text-xs font-black text-slate-900 uppercase tracking-wider flex items-center gap-2">
                            <span class="w-6 h-6 rounded-lg bg-emerald-500 text-white flex items-center justify-center text-sm shadow-xs">🖼</span>
                            Berkas Gambar Sertifikat
                        </div>
                        @if($certificate->file_path)
                            <a href="{{ asset($certificate->file_path) }}" target="_blank"
                               class="inline-flex items-center gap-1.5 text-xs font-bold text-blue-600 hover:text-blue-800 bg-blue-50 hover:bg-blue-100 px-3 py-1.5 rounded-xl border border-blue-200 transition-colors">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                                Buka Berkas Asli
                            </a>
                        @endif
                    </div>

                    <!-- GAMBAR SAAT INI -->
                    <div id="currentFileSection" class="{{ $certificate->file_path ? '' : 'hidden' }} rounded-2xl overflow-hidden border border-slate-200 bg-slate-50">
                        @if($certificate->file_path)
                            @if($certificate->isPdf())
                                <div class="p-10 text-center space-y-3">
                                    <div class="w-16 h-16 rounded-2xl bg-red-100 text-red-600 flex items-center justify-center mx-auto text-3xl">📄</div>
                                    <p class="text-sm font-bold text-slate-800">Dokumen PDF Terunggah</p>
                                    <a href="{{ asset($certificate->file_path) }}" target="_blank" class="inline-flex items-center gap-1 text-xs text-blue-600 font-bold hover:underline">
                                        Buka & Lihat Berkas PDF →
                                    </a>
                                </div>
                            @else
                                <div id="currentImageWrapper" class="w-full flex items-center justify-center p-2 bg-white">
                                    <img src="{{ asset($certificate->file_path) }}" alt="Sertifikat Saat Ini" class="max-h-72 w-auto rounded-xl object-contain shadow-xs border border-slate-100">
                                </div>
                            @endif
                        @else
                            <div class="p-10 text-center text-slate-400 text-xs font-semibold">Belum ada berkas diunggah.</div>
                        @endif
                    </div>

                    <!-- SEPARATOR DENGAN LABEL -->
                    <div class="relative flex items-center gap-3">
                        <div class="flex-1 border-t border-slate-200"></div>
                        <span class="text-[11px] font-bold text-slate-400 bg-white px-2 uppercase tracking-wider shrink-0">
                            {{ $certificate->file_path ? 'Ganti Berkas' : 'Unggah Berkas Baru' }}
                        </span>
                        <div class="flex-1 border-t border-slate-200"></div>
                    </div>

                    <!-- DROPZONE BARU -->
                    <div id="dropzone"
                         ondragover="handleDragOver(event)"
                         ondragleave="handleDragLeave(event)"
                         ondrop="handleDrop(event)"
                         class="relative border-2 border-dashed border-slate-300 hover:border-emerald-500 bg-slate-50/70 hover:bg-emerald-50/20 rounded-2xl p-5 transition-all text-center group cursor-pointer">

                        <input type="file" id="certificate_file" name="certificate_file" accept="image/*,.pdf"
                               onchange="previewNewFile(this)"
                               class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">

                        <!-- PREVIEW BARU (MUNCUL SAAT FILE DIPILIH) -->
                        <div id="newPreviewContainer" class="hidden space-y-3">
                            <div class="relative mx-auto max-w-sm rounded-2xl overflow-hidden border border-emerald-300 shadow-md bg-white ring-2 ring-emerald-500/20">
                                <img id="newPreviewImage" src="#" alt="Pratinjau Baru" class="w-full max-h-64 object-contain bg-slate-50">
                                <div id="newPreviewPdfBadge" class="hidden p-8 text-center bg-white space-y-3">
                                    <div class="w-14 h-14 rounded-2xl bg-red-100 text-red-600 flex items-center justify-center mx-auto text-2xl">📄</div>
                                    <p class="text-sm font-bold text-slate-800" id="newPdfFileName"></p>
                                </div>
                                <div class="absolute top-2 right-2 bg-emerald-500 text-white text-[10px] font-black px-2 py-0.5 rounded-full shadow-xs">
                                    BARU
                                </div>
                            </div>
                            <div class="flex items-center justify-center gap-3">
                                <span class="inline-flex items-center gap-1.5 text-xs font-bold text-emerald-700 bg-emerald-50 px-3 py-1.5 rounded-xl border border-emerald-200" id="newFileSizeBadge">
                                    ✓ Siap Disimpan
                                </span>
                                <button type="button" onclick="resetNewFile()" class="relative z-20 text-xs font-bold text-slate-600 hover:text-red-600 bg-slate-100 hover:bg-red-50 px-3 py-1.5 rounded-xl border border-slate-200 transition-colors">
                                    Batalkan Pilihan
                                </button>
                            </div>
                        </div>

                        <!-- DEFAULT PLACEHOLDER -->
                        <div id="newDefaultPlaceholder" class="space-y-3 py-6">
                            <div class="w-14 h-14 bg-emerald-50 text-[#3cb759] border border-emerald-100 rounded-2xl flex items-center justify-center mx-auto group-hover:scale-110 transition-transform shadow-xs">
                                <svg class="w-7 h-7 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-slate-800 group-hover:text-[#3cb759] transition-colors">
                                    {{ $certificate->file_path ? 'Klik atau Seret Berkas Pengganti' : 'Klik atau Seret Berkas Gambar ke Sini' }}
                                </p>
                                <p class="text-xs text-slate-400 mt-1">Format: JPG, PNG, WEBP, atau PDF (Maks. 10MB)</p>
                            </div>
                            <span class="inline-flex items-center gap-1.5 bg-white border border-slate-300 text-slate-700 text-xs font-bold px-4 py-2 rounded-xl shadow-xs group-hover:border-emerald-400 group-hover:text-emerald-700 transition-all">
                                <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                                {{ $certificate->file_path ? 'Pilih Berkas Baru' : 'Jelajahi File Komputer' }}
                            </span>
                        </div>
                    </div>

                    @if($certificate->file_path)
                        <p class="text-[11px] text-slate-400 text-center">
                            💡 Biarkan kosong jika tidak ingin mengganti gambar sertifikat yang sudah ada.
                        </p>
                    @endif

                </div>
            </div>
        </form>

    </div>

    <script>
        function handleDragOver(e) {
            e.preventDefault();
            document.getElementById('dropzone').classList.add('border-emerald-500', 'bg-emerald-50/40');
        }
        function handleDragLeave(e) {
            e.preventDefault();
            document.getElementById('dropzone').classList.remove('border-emerald-500', 'bg-emerald-50/40');
        }
        function handleDrop(e) {
            e.preventDefault();
            document.getElementById('dropzone').classList.remove('border-emerald-500', 'bg-emerald-50/40');
            const fileInput = document.getElementById('certificate_file');
            if (e.dataTransfer.files && e.dataTransfer.files.length > 0) {
                fileInput.files = e.dataTransfer.files;
                previewNewFile(fileInput);
            }
        }

        function previewNewFile(input) {
            const newPreviewContainer = document.getElementById('newPreviewContainer');
            const newDefaultPlaceholder = document.getElementById('newDefaultPlaceholder');
            const newPreviewImage = document.getElementById('newPreviewImage');
            const newPreviewPdfBadge = document.getElementById('newPreviewPdfBadge');
            const newPdfFileName = document.getElementById('newPdfFileName');
            const newFileSizeBadge = document.getElementById('newFileSizeBadge');

            if (input.files && input.files[0]) {
                const file = input.files[0];
                const isPdf = file.type === 'application/pdf' || file.name.toLowerCase().endsWith('.pdf');
                const sizeFormatted = (file.size / 1024 / 1024).toFixed(2) + ' MB';

                newDefaultPlaceholder.classList.add('hidden');
                newPreviewContainer.classList.remove('hidden');

                if (isPdf) {
                    newPreviewImage.classList.add('hidden');
                    newPreviewPdfBadge.classList.remove('hidden');
                    newPdfFileName.innerText = file.name;
                    newFileSizeBadge.innerHTML = '📄 PDF (' + sizeFormatted + ') Siap Disimpan';
                } else {
                    newPreviewPdfBadge.classList.add('hidden');
                    newPreviewImage.classList.remove('hidden');
                    newFileSizeBadge.innerHTML = '🖼️ (' + sizeFormatted + ') Siap Disimpan';
                    const reader = new FileReader();
                    reader.onload = function(e) { newPreviewImage.src = e.target.result; };
                    reader.readAsDataURL(file);
                }
            }
        }

        function resetNewFile() {
            document.getElementById('certificate_file').value = '';
            document.getElementById('newPreviewContainer').classList.add('hidden');
            document.getElementById('newDefaultPlaceholder').classList.remove('hidden');
        }
    </script>
@endsection
