@extends('admin.layout')

@section('title', 'Terbitkan Sertifikat Baru')

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
                    <span class="w-9 h-9 rounded-xl bg-emerald-100 text-[#3cb759] flex items-center justify-center text-lg shadow-xs">
                        📜
                    </span>
                    Terbitkan Sertifikat Baru
                </h1>
                <p class="text-slate-500 text-xs sm:text-sm mt-1">
                    Pilih peserta pelatihan yang berhak menerima sertifikat dan unggah berkas gambar sertifikatnya.
                </p>
            </div>

            <div class="flex items-center gap-2 text-xs text-slate-500 bg-slate-50 px-3.5 py-2 rounded-xl border border-slate-200">
                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                <span>Proses Cepat &bull; 2 Langkah Mudah</span>
            </div>
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

        <!-- MAIN FORM -->
        <form action="{{ route('admin.certificates.store') }}" method="POST" enctype="multipart/form-data" id="certificateForm" class="space-y-6">
            @csrf

            <!-- HIDDEN INPUT UNTUK ID PESERTA TERPILIH -->
            <input type="hidden" name="enrollment_id" id="selected_enrollment_id" value="{{ old('enrollment_id', $selectedEnrollment?->id) }}" required>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
                
                <!-- ============================================== -->
                <!-- KOLOM KIRI: PILIH PESERTA (5 COLS) -->
                <!-- ============================================== -->
                <div class="lg:col-span-5 bg-white rounded-3xl border border-slate-200/80 shadow-xs p-5 sm:p-6 space-y-4">
                    
                    <div class="flex items-center justify-between">
                        <label class="block text-xs font-black text-slate-900 uppercase tracking-wider flex items-center gap-2">
                            <span class="w-6 h-6 rounded-lg bg-emerald-500 text-white flex items-center justify-center text-xs font-black shadow-xs">
                                1
                            </span>
                            Pilih Peserta
                        </label>
                        <span class="text-[11px] font-bold text-slate-400 bg-slate-100 px-2.5 py-0.5 rounded-lg" id="participantCountBadge">
                            {{ $enrollments->count() + $users->count() }} Pilihan
                        </span>
                    </div>

                    <!-- SEARCH FILTER INPUT -->
                    <div class="relative">
                        <input type="text" id="participantSearchInput" placeholder="Cari nama peserta atau pelatihan..." 
                               oninput="filterParticipants(this.value)"
                               class="w-full pl-9 pr-8 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition-all">
                        <svg class="w-4 h-4 text-slate-400 absolute left-3 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        <button type="button" id="clearSearchBtn" onclick="clearSearch()" class="hidden absolute right-2.5 top-2.5 text-slate-400 hover:text-slate-600 text-xs">
                            ✕
                        </button>
                    </div>

                    <!-- BANNER PESERTA TERPILIH (SAAT INI) -->
                    <div id="selectedParticipantBanner" class="{{ old('enrollment_id', $selectedEnrollment?->id) ? '' : 'hidden' }} bg-emerald-50/80 border border-emerald-200 rounded-2xl p-3.5 flex items-start justify-between gap-3 transition-all">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-emerald-500 text-white font-black text-sm flex items-center justify-center shrink-0 shadow-xs" id="selectedBannerAvatar">
                                ✓
                            </div>
                            <div class="min-w-0">
                                <span class="text-[9px] uppercase font-extrabold text-emerald-700 tracking-wider">Peserta Terpilih</span>
                                <h4 class="text-xs font-black text-slate-900 truncate" id="selectedBannerName">
                                    {{ $selectedEnrollment?->user?->name ?? 'Peserta' }}
                                </h4>
                                <p class="text-[11px] text-emerald-800 font-semibold truncate" id="selectedBannerProgram">
                                    {{ $selectedEnrollment?->program_name ?? 'Pelatihan' }}
                                </p>
                            </div>
                        </div>
                        <button type="button" onclick="deselectParticipant()" class="text-xs text-slate-400 hover:text-red-600 font-bold p-1" title="Ganti Pilihan">
                            ✕
                        </button>
                    </div>

                    <!-- LIST DAFTAR PESERTA (SCROLLABLE & INTERACTIVE) -->
                    <div class="space-y-2 max-h-[360px] overflow-y-auto pr-1" id="participantsListContainer">
                        
                        <!-- OPTGROUP 1: ENROLLMENTS PELATIHAN -->
                        @if($enrollments->count() > 0)
                            <div class="pt-1 pb-1 text-[10px] font-black text-slate-400 uppercase tracking-wider">
                                Peserta Pelatihan Selesai / Terkonfirmasi
                            </div>

                            @foreach($enrollments as $enr)
                                @php
                                    $isSelected = old('enrollment_id', $selectedEnrollment?->id) == $enr->id;
                                    $userName = $enr->user->name ?? 'Peserta';
                                    $userEmail = $enr->user->email ?? '';
                                    $programName = $enr->program_name;
                                @endphp
                                <div class="participant-item group border rounded-2xl p-3 cursor-pointer transition-all flex items-center justify-between gap-3 {{ $isSelected ? 'border-emerald-500 bg-emerald-50/60 ring-2 ring-emerald-500/20' : 'border-slate-200/80 hover:border-emerald-300 hover:bg-slate-50/80' }}"
                                     data-id="{{ $enr->id }}"
                                     data-name="{{ $userName }}"
                                     data-email="{{ $userEmail }}"
                                     data-program="{{ $programName }}"
                                     onclick="selectParticipant('{{ $enr->id }}', '{{ addslashes($userName) }}', '{{ addslashes($programName) }}', this)">
                                    
                                    <div class="flex items-center gap-3 min-w-0">
                                        <div class="w-9 h-9 rounded-xl bg-slate-100 group-hover:bg-emerald-100 text-slate-700 group-hover:text-emerald-700 font-extrabold text-xs flex items-center justify-center shrink-0 transition-colors">
                                            {{ strtoupper(substr($userName, 0, 2)) }}
                                        </div>
                                        <div class="min-w-0">
                                            <h4 class="text-xs font-bold text-slate-900 truncate">{{ $userName }}</h4>
                                            <p class="text-[11px] text-slate-500 truncate">{{ $programName }}</p>
                                        </div>
                                    </div>

                                    <div class="shrink-0">
                                        <span class="check-badge w-5 h-5 rounded-full {{ $isSelected ? 'bg-emerald-500 text-white' : 'border border-slate-300 text-transparent' }} flex items-center justify-center text-xs font-bold transition-all">
                                            ✓
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                        <!-- OPTGROUP 2: USER TERDAFTAR UMUM -->
                        @if($users->count() > 0)
                            <div class="pt-3 pb-1 text-[10px] font-black text-slate-400 uppercase tracking-wider">
                                Peserta Terdaftar Lainnya
                            </div>

                            @foreach($users as $user)
                                @php
                                    $valId = 'user_' . $user->id;
                                    $isSelected = old('enrollment_id') == $valId;
                                    $userName = $user->name;
                                    $userEmail = $user->email;
                                    $programName = 'Sertifikasi Pelatihan';
                                @endphp
                                <div class="participant-item group border rounded-2xl p-3 cursor-pointer transition-all flex items-center justify-between gap-3 {{ $isSelected ? 'border-emerald-500 bg-emerald-50/60 ring-2 ring-emerald-500/20' : 'border-slate-200/80 hover:border-emerald-300 hover:bg-slate-50/80' }}"
                                     data-id="{{ $valId }}"
                                     data-name="{{ $userName }}"
                                     data-email="{{ $userEmail }}"
                                     data-program="{{ $programName }}"
                                     onclick="selectParticipant('{{ $valId }}', '{{ addslashes($userName) }}', '{{ addslashes($programName) }}', this)">
                                    
                                    <div class="flex items-center gap-3 min-w-0">
                                        <div class="w-9 h-9 rounded-xl bg-slate-100 group-hover:bg-emerald-100 text-slate-700 group-hover:text-emerald-700 font-extrabold text-xs flex items-center justify-center shrink-0 transition-colors">
                                            {{ strtoupper(substr($userName, 0, 2)) }}
                                        </div>
                                        <div class="min-w-0">
                                            <h4 class="text-xs font-bold text-slate-900 truncate">{{ $userName }}</h4>
                                            <p class="text-[11px] text-slate-400 truncate">{{ $userEmail }}</p>
                                        </div>
                                    </div>

                                    <div class="shrink-0">
                                        <span class="check-badge w-5 h-5 rounded-full {{ $isSelected ? 'bg-emerald-500 text-white' : 'border border-slate-300 text-transparent' }} flex items-center justify-center text-xs font-bold transition-all">
                                            ✓
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                    </div>

                    <p class="text-[11px] text-slate-400 leading-tight">
                        *Klik salah satu nama peserta di atas untuk memilih penerima sertifikat.
                    </p>
                </div>

                <!-- ============================================== -->
                <!-- KOLOM KANAN: UPLOAD GAMBAR SERTIFIKAT (7 COLS) -->
                <!-- ============================================== -->
                <div class="lg:col-span-7 bg-white rounded-3xl border border-slate-200/80 shadow-xs p-5 sm:p-6 space-y-5">
                    
                    <div class="flex items-center justify-between">
                        <label class="block text-xs font-black text-slate-900 uppercase tracking-wider flex items-center gap-2">
                            <span class="w-6 h-6 rounded-lg bg-emerald-500 text-white flex items-center justify-center text-xs font-black shadow-xs">
                                2
                            </span>
                            Unggah Gambar Sertifikat
                        </label>
                        <span class="text-[11px] font-bold text-slate-400">JPG, PNG, WEBP, PDF (Maks 10MB)</span>
                    </div>

                    <!-- DROPZONE CONTAINER -->
                    <div id="dropzone" 
                         ondragover="handleDragOver(event)" 
                         ondragleave="handleDragLeave(event)" 
                         ondrop="handleDrop(event)"
                         class="relative border-2 border-dashed border-slate-300 hover:border-emerald-500 bg-slate-50/70 hover:bg-emerald-50/20 rounded-3xl p-6 transition-all text-center group cursor-pointer">
                        
                        <input type="file" id="certificate_file" name="certificate_file" required accept="image/*,.pdf" onchange="previewCertificateFile(this)"
                               class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">

                        <!-- PREVIEW STATE (MUNCUL KETIKA GAMBAR DIPILIH) -->
                        <div id="previewContainer" class="hidden space-y-4">
                            <div class="relative mx-auto max-w-md rounded-2xl overflow-hidden border border-slate-200 shadow-md bg-white">
                                <img id="previewImage" src="#" alt="Pratinjau Sertifikat" class="w-full max-h-72 object-contain bg-slate-100/50">
                                <div id="previewPdfBadge" class="hidden p-8 text-center bg-white space-y-3">
                                    <div class="w-16 h-16 rounded-2xl bg-red-100 text-red-600 flex items-center justify-center mx-auto text-3xl font-black">
                                        📄
                                    </div>
                                    <div>
                                        <p class="text-sm font-bold text-slate-800" id="pdfFileName"></p>
                                        <p class="text-xs text-slate-400 mt-0.5">Dokumen PDF Terverifikasi</p>
                                    </div>
                                </div>
                            </div>

                            <!-- FILE INFO & QUICK ACTIONS -->
                            <div class="flex items-center justify-center gap-3">
                                <span class="inline-flex items-center gap-1.5 text-xs font-bold text-emerald-700 bg-emerald-50 px-3 py-1.5 rounded-xl border border-emerald-200" id="previewFileSizeBadge">
                                    <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                    Berkas Siap Diterbitkan
                                </span>

                                <button type="button" onclick="resetFilePicker()" class="relative z-20 text-xs font-bold text-slate-600 hover:text-red-600 bg-slate-100 hover:bg-red-50 px-3 py-1.5 rounded-xl border border-slate-200 transition-colors">
                                    Ganti Berkas
                                </button>
                            </div>
                        </div>

                        <!-- DEFAULT EMPTY STATE -->
                        <div id="defaultPlaceholder" class="space-y-4 py-8">
                            <div class="w-16 h-16 bg-emerald-50 text-[#3cb759] border border-emerald-100 rounded-2xl flex items-center justify-center mx-auto text-3xl group-hover:scale-110 transition-transform shadow-xs">
                                <svg class="w-8 h-8 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            
                            <div>
                                <p class="text-sm font-bold text-slate-800 group-hover:text-[#3cb759] transition-colors">
                                    Pilih atau Seret Berkas Gambar ke Sini
                                </p>
                                <p class="text-xs text-slate-400 mt-1 max-w-sm mx-auto">
                                    Unggah gambar sertifikat resmi yang sudah didesain lengkap dengan nama peserta.
                                </p>
                            </div>

                            <div>
                                <span class="inline-flex items-center gap-1.5 bg-white border border-slate-300 text-slate-700 text-xs font-bold px-4 py-2 rounded-xl shadow-xs group-hover:border-emerald-400 group-hover:text-emerald-700 transition-all">
                                    <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                                    Jelajahi File Komputer
                                </span>
                            </div>
                        </div>

                    </div>

                    <!-- INFO BOX -->
                    <div class="p-4 bg-slate-50 rounded-2xl border border-slate-200 text-xs text-slate-600 space-y-1">
                        <p class="font-bold text-slate-800 flex items-center gap-1.5">
                            <span class="text-emerald-600 font-black">ℹ️</span> Informasi Otomatis:
                        </p>
                        <p class="text-[11px] text-slate-500">
                            Sistem akan secara otomatis menerbitkan nomor sertifikat resmi dan tanggal terbit saat tombol ditekan. Peserta dapat langsung melihat & mengunduh sertifikatnya di dashboard.
                        </p>
                    </div>

                    <!-- SUBMIT BUTTON -->
                    <div class="pt-2">
                        <button type="submit" id="submitBtn" class="w-full bg-[#3cb759] hover:bg-[#329d4c] text-white font-black text-sm py-3.5 px-6 rounded-2xl transition-all shadow-md shadow-emerald-500/20 hover:scale-[1.01] flex items-center justify-center gap-2">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Terbitkan Sertifikat Sekarang
                        </button>
                    </div>

                </div>

            </div>
        </form>

    </div>

    <!-- JAVASCRIPT LOGIC UNTUK INTERAKTIVITAS USER FRIENDLY -->
    <script>
        function selectParticipant(id, name, program, element) {
            // Update hidden input
            document.getElementById('selected_enrollment_id').value = id;

            // Update UI list items
            const items = document.querySelectorAll('.participant-item');
            items.forEach(el => {
                el.classList.remove('border-emerald-500', 'bg-emerald-50/60', 'ring-2', 'ring-emerald-500/20');
                el.classList.add('border-slate-200/80');
                const badge = el.querySelector('.check-badge');
                if (badge) {
                    badge.classList.remove('bg-emerald-500', 'text-white');
                    badge.classList.add('border', 'border-slate-300', 'text-transparent');
                }
            });

            if (element) {
                element.classList.remove('border-slate-200/80');
                element.classList.add('border-emerald-500', 'bg-emerald-50/60', 'ring-2', 'ring-emerald-500/20');
                const badge = element.querySelector('.check-badge');
                if (badge) {
                    badge.classList.remove('border', 'border-slate-300', 'text-transparent');
                    badge.classList.add('bg-emerald-500', 'text-white');
                }
            }

            // Update banner
            const banner = document.getElementById('selectedParticipantBanner');
            document.getElementById('selectedBannerName').innerText = name;
            document.getElementById('selectedBannerProgram').innerText = program;
            banner.classList.remove('hidden');
        }

        function deselectParticipant() {
            document.getElementById('selected_enrollment_id').value = '';
            document.getElementById('selectedParticipantBanner').classList.add('hidden');

            const items = document.querySelectorAll('.participant-item');
            items.forEach(el => {
                el.classList.remove('border-emerald-500', 'bg-emerald-50/60', 'ring-2', 'ring-emerald-500/20');
                el.classList.add('border-slate-200/80');
                const badge = el.querySelector('.check-badge');
                if (badge) {
                    badge.classList.remove('bg-emerald-500', 'text-white');
                    badge.classList.add('border', 'border-slate-300', 'text-transparent');
                }
            });
        }

        function filterParticipants(query) {
            const clearBtn = document.getElementById('clearSearchBtn');
            const items = document.querySelectorAll('.participant-item');
            const q = query.toLowerCase().trim();

            if (q.length > 0) {
                clearBtn.classList.remove('hidden');
            } else {
                clearBtn.classList.add('hidden');
            }

            let visibleCount = 0;
            items.forEach(el => {
                const name = (el.getAttribute('data-name') || '').toLowerCase();
                const email = (el.getAttribute('data-email') || '').toLowerCase();
                const program = (el.getAttribute('data-program') || '').toLowerCase();

                if (name.includes(q) || email.includes(q) || program.includes(q)) {
                    el.classList.remove('hidden');
                    visibleCount++;
                } else {
                    el.classList.add('hidden');
                }
            });

            document.getElementById('participantCountBadge').innerText = visibleCount + ' Pilihan';
        }

        function clearSearch() {
            const searchInput = document.getElementById('participantSearchInput');
            searchInput.value = '';
            filterParticipants('');
            searchInput.focus();
        }

        // DRAG & DROP LOGIC
        function handleDragOver(e) {
            e.preventDefault();
            const dropzone = document.getElementById('dropzone');
            dropzone.classList.add('border-emerald-500', 'bg-emerald-50/40');
        }

        function handleDragLeave(e) {
            e.preventDefault();
            const dropzone = document.getElementById('dropzone');
            dropzone.classList.remove('border-emerald-500', 'bg-emerald-50/40');
        }

        function handleDrop(e) {
            e.preventDefault();
            const dropzone = document.getElementById('dropzone');
            dropzone.classList.remove('border-emerald-500', 'bg-emerald-50/40');

            const fileInput = document.getElementById('certificate_file');
            if (e.dataTransfer.files && e.dataTransfer.files.length > 0) {
                fileInput.files = e.dataTransfer.files;
                previewCertificateFile(fileInput);
            }
        }

        function previewCertificateFile(input) {
            const previewContainer = document.getElementById('previewContainer');
            const defaultPlaceholder = document.getElementById('defaultPlaceholder');
            const previewImage = document.getElementById('previewImage');
            const previewPdfBadge = document.getElementById('previewPdfBadge');
            const pdfFileName = document.getElementById('pdfFileName');
            const fileSizeBadge = document.getElementById('previewFileSizeBadge');

            if (input.files && input.files[0]) {
                const file = input.files[0];
                const isPdf = file.type === 'application/pdf' || file.name.toLowerCase().endsWith('.pdf');
                const fileSizeFormatted = (file.size / 1024 / 1024).toFixed(2) + ' MB';

                defaultPlaceholder.classList.add('hidden');
                previewContainer.classList.remove('hidden');

                if (isPdf) {
                    previewImage.classList.add('hidden');
                    previewPdfBadge.classList.remove('hidden');
                    pdfFileName.innerText = file.name;
                    fileSizeBadge.innerHTML = '📄 PDF (' + fileSizeFormatted + ') Siap';
                } else {
                    previewPdfBadge.classList.add('hidden');
                    previewImage.classList.remove('hidden');
                    fileSizeBadge.innerHTML = '🖼️ Gambar (' + fileSizeFormatted + ') Siap';

                    const reader = new FileReader();
                    reader.onload = function(e) {
                        previewImage.src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            }
        }

        function resetFilePicker() {
            const fileInput = document.getElementById('certificate_file');
            fileInput.value = '';
            document.getElementById('previewContainer').classList.add('hidden');
            document.getElementById('defaultPlaceholder').classList.remove('hidden');
        }

        // Form Validation check on submit
        document.getElementById('certificateForm').addEventListener('submit', function(e) {
            const enrollmentId = document.getElementById('selected_enrollment_id').value;
            const fileInput = document.getElementById('certificate_file');

            if (!enrollmentId) {
                e.preventDefault();
                alert('Silakan pilih salah satu peserta terlebih dahulu pada daftar di sebelah kiri.');
                document.getElementById('participantSearchInput').focus();
                return false;
            }

            if (!fileInput.files || fileInput.files.length === 0) {
                e.preventDefault();
                alert('Silakan pilih berkas gambar sertifikat terlebih dahulu.');
                return false;
            }
        });
    </script>
@endsection
