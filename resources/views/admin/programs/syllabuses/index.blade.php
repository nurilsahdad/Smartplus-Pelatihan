@extends('admin.layout')

@section('title', 'Kelola Silabus - ' . $program->name)

@section('content')
@php
    $totalTopicsCount = 0;
    foreach($syllabuses as $s) {
        if ($s->topics) {
            $topicsArr = array_filter(array_map('trim', explode("\n", $s->topics)));
            $totalTopicsCount += count($topicsArr);
        }
    }
@endphp

<div class="max-w-6xl mx-auto space-y-6 pb-12">

    <!-- TOP BANNER & PROGRAM SWITCHER -->
    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm p-6 sm:p-7 space-y-6">
        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-5">
            <!-- Left Info -->
            <div class="space-y-1.5">
                <div class="flex items-center gap-2">
                    <span class="bg-emerald-50 text-[#3cb759] border border-emerald-200/80 text-[11px] font-extrabold px-3 py-0.5 rounded-full uppercase tracking-wider">
                        {{ $program->category }}
                    </span>
                </div>
                <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">
                    Silabus & Kurikulum Pelatihan
                </h1>
                <p class="text-slate-500 text-xs sm:text-sm">
                    Kelola susunan modul dan deskripsi pembelajaran untuk program <strong class="text-slate-800 font-bold">{{ $program->name }}</strong>
                </p>
            </div>

            <!-- Right Controls: Select Program & Add Module -->
            <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 shrink-0">
                @if(isset($programs) && count($programs) > 0)
                    <div class="relative min-w-[240px]">
                        <label for="program-selector" class="block text-[10px] font-extrabold text-slate-400 uppercase tracking-wider mb-1">Pilih Program Pelatihan:</label>
                        <select id="program-selector" onchange="window.location.href = '{{ url('/admin/syllabuses') }}?program_id=' + this.value" class="w-full px-4 py-2.5 bg-slate-50 hover:bg-slate-100/80 border border-slate-200 text-slate-800 text-xs font-bold rounded-xl focus:outline-none focus:ring-2 focus:ring-[#3cb759] focus:bg-white transition-all shadow-xs cursor-pointer">
                            @foreach($programs as $p)
                                <option value="{{ $p->id }}" {{ $p->id == $program->id ? 'selected' : '' }}>
                                    {{ $p->name }} ({{ $p->category }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                @endif

                <div class="flex items-center gap-2 self-end sm:self-auto mt-auto">
                    <button type="button" onclick="openCreateModal()" class="inline-flex items-center justify-center gap-2 bg-[#3cb759] hover:bg-[#329d4c] text-white font-bold text-xs px-5 py-2.5 rounded-xl transition-all shadow-sm hover:shadow active:scale-[0.99] cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Tambah Modul Baru
                    </button>

                    <a href="{{ route('admin.programs.index') }}" class="inline-flex items-center justify-center gap-1.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs px-3.5 py-2.5 rounded-xl transition-all border border-slate-200/80">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Kembali
                    </a>
                </div>
            </div>
        </div>

        <!-- STATS OVERVIEW CARDS -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-4 border-t border-slate-100">
            <div class="bg-slate-50/80 rounded-xl border border-slate-100 p-3.5 flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-emerald-100 text-[#3cb759] flex items-center justify-center font-bold shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                </div>
                <div>
                    <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block">Total Modul</span>
                    <span class="text-base font-extrabold text-slate-900">{{ count($syllabuses) }} Modul</span>
                </div>
            </div>

            <div class="bg-slate-50/80 rounded-xl border border-slate-100 p-3.5 flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-purple-100 text-purple-600 flex items-center justify-center font-bold shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h10M7 12h10M7 17h10"></path>
                    </svg>
                </div>
                <div>
                    <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block">Program Aktif</span>
                    <span class="text-xs font-bold text-slate-900 truncate block max-w-[200px]" title="{{ $program->name }}">{{ $program->name }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- MAIN SYLLABUS LIST HEADER -->
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-lg font-extrabold text-slate-900 tracking-tight">Daftar Modul Pembelajaran</h2>
            <p class="text-xs text-slate-500">Urutan modul sesuai dengan alur kurikulum pelatihan</p>
        </div>
        <button type="button" onclick="openCreateModal()" class="text-xs font-bold text-[#3cb759] hover:text-[#329d4c] bg-emerald-50 hover:bg-emerald-100/80 px-3.5 py-1.5 rounded-xl border border-emerald-200 transition-colors flex items-center gap-1.5 cursor-pointer">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Tambah Modul
        </button>
    </div>

    <!-- SYLLABUS MODULE CARDS TIMELINE -->
    <div class="space-y-4">
        @forelse($syllabuses as $index => $syllabus)
            <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md transition-all duration-200 p-5 sm:p-6 space-y-4 relative group" id="syllabus-card-{{ $syllabus->id }}">
                
                <!-- CARD HEADER & ACTIONS -->
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 pb-3 border-b border-slate-100">
                    <div class="flex items-center gap-3">
                        <!-- Sequence Badge -->
                        <div class="w-9 h-9 rounded-xl bg-slate-900 text-white font-extrabold text-xs flex items-center justify-center shrink-0 shadow-xs">
                            {{ str_pad($syllabus->sort_order, 2, '0', STR_PAD_LEFT) }}
                        </div>
                        <div>
                            <div class="flex items-center gap-2">
                                <h3 class="text-base font-bold text-slate-900 leading-snug">{{ $syllabus->title }}</h3>
                                <span class="bg-slate-100 text-slate-600 text-[10px] font-bold px-2 py-0.5 rounded-md border border-slate-200/60">
                                    Urutan: #{{ $syllabus->sort_order }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex items-center gap-2 self-end sm:self-auto shrink-0">
                        <button type="button" 
                                onclick="openEditModal({{ json_encode($syllabus) }})" 
                                class="inline-flex items-center gap-1 text-slate-700 hover:text-blue-600 bg-slate-50 hover:bg-blue-50 px-3 py-1.5 rounded-xl text-xs font-bold border border-slate-200 hover:border-blue-200 transition-all cursor-pointer">
                            <svg class="w-3.5 h-3.5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                            Edit
                        </button>

                        <form action="{{ route('admin.syllabuses.destroy', $syllabus->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus modul silabus ini?');" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center gap-1 text-slate-700 hover:text-red-600 bg-slate-50 hover:bg-red-50 px-3 py-1.5 rounded-xl text-xs font-bold border border-slate-200 hover:border-red-200 transition-all cursor-pointer">
                                <svg class="w-3.5 h-3.5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>

                <!-- CARD CONTENT -->
                <div class="space-y-3">
                    @if($syllabus->description)
                        <p class="text-slate-600 text-xs leading-relaxed bg-slate-50/60 p-3 rounded-xl border border-slate-100">
                            {{ $syllabus->description }}
                        </p>
                    @endif
                </div>

            </div>
        @empty
            <!-- EMPTY STATE CARD -->
            <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs p-12 text-center space-y-4">
                <div class="w-16 h-16 rounded-2xl bg-emerald-50 text-[#3cb759] flex items-center justify-center mx-auto border border-emerald-100">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <div class="space-y-1 max-w-sm mx-auto">
                    <h3 class="text-base font-bold text-slate-900">Belum Ada Modul Silabus</h3>
                    <p class="text-xs text-slate-500">Program pelatihan ini belum memiliki kurikulum silabus. Klik tombol di bawah untuk menambah modul pertama.</p>
                </div>
                <button type="button" onclick="openCreateModal()" class="inline-flex items-center gap-2 bg-[#3cb759] hover:bg-[#329d4c] text-white font-bold text-xs px-5 py-2.5 rounded-xl transition-all shadow-sm cursor-pointer">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Tambah Modul Pertama
                </button>
            </div>
        @endforelse
    </div>

</div>

<!-- MODAL TAMBAH MODUL BARU -->
<div id="create-modal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <!-- Backdrop -->
    <div class="fixed inset-0 bg-slate-900/40 backdrop-blur-xs transition-opacity" onclick="closeCreateModal()"></div>

    <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
        <div class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-lg border border-slate-100">
            
            <!-- Modal Header -->
            <div class="bg-slate-50/80 px-6 py-4 border-b border-slate-100 flex items-center justify-between">
                <div class="flex items-center gap-2.5">
                    <div class="w-8 h-8 rounded-xl bg-emerald-100 text-[#3cb759] flex items-center justify-center font-bold">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-base font-bold text-slate-900" id="modal-title">Tambah Modul Silabus</h3>
                        <p class="text-[11px] text-slate-400">Tambahkan modul baru untuk {{ $program->name }}</p>
                    </div>
                </div>
                <button type="button" onclick="closeCreateModal()" class="text-slate-400 hover:text-slate-600 p-1 rounded-lg hover:bg-slate-100 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <!-- Modal Body Form -->
            <form action="{{ route('admin.programs.syllabuses.store', $program->id) }}" method="POST" class="p-6 space-y-4">
                @csrf

                <!-- Judul & Urutan -->
                <div class="grid grid-cols-1 sm:grid-cols-4 gap-4">
                    <div class="sm:col-span-3 space-y-1">
                        <label for="create_title" class="block text-xs font-bold text-slate-700">Judul Modul / Fase <span class="text-red-500">*</span></label>
                        <input type="text" id="create_title" name="title" required placeholder="Contoh: Fase 01: Fundamental AI & n8n Basics" class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-[#3cb759] focus:bg-white transition-all">
                    </div>
                    <div class="space-y-1">
                        <label for="create_sort_order" class="block text-xs font-bold text-slate-700">Urutan</label>
                        <input type="number" id="create_sort_order" name="sort_order" value="{{ count($syllabuses) + 1 }}" class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-800 focus:outline-none focus:ring-2 focus:ring-[#3cb759] focus:bg-white transition-all text-center font-bold">
                    </div>
                </div>

                <!-- Deskripsi Modul -->
                <div class="space-y-1">
                    <label for="create_description" class="block text-xs font-bold text-slate-700">Deskripsi / Penjelasan Modul</label>
                    <textarea id="create_description" name="description" rows="4" placeholder="Penjelasan mengenai materi dan keterampilan yang dipelajari pada modul ini..." class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-[#3cb759] focus:bg-white transition-all leading-relaxed"></textarea>
                </div>

                <!-- Footer Buttons -->
                <div class="flex items-center justify-end gap-2 pt-3 border-t border-slate-100">
                    <button type="button" onclick="closeCreateModal()" class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs rounded-xl border border-slate-200 transition-colors">
                        Batal
                    </button>
                    <button type="submit" class="px-5 py-2 bg-[#3cb759] hover:bg-[#329d4c] text-white font-bold text-xs rounded-xl shadow-sm transition-all">
                        Simpan Modul
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- MODAL EDIT MODUL -->
<div id="edit-modal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-edit-title" role="dialog" aria-modal="true">
    <!-- Backdrop -->
    <div class="fixed inset-0 bg-slate-900/40 backdrop-blur-xs transition-opacity" onclick="closeEditModal()"></div>

    <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
        <div class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-lg border border-slate-100">
            
            <!-- Modal Header -->
            <div class="bg-slate-50/80 px-6 py-4 border-b border-slate-100 flex items-center justify-between">
                <div class="flex items-center gap-2.5">
                    <div class="w-8 h-8 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center font-bold">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-base font-bold text-slate-900" id="modal-edit-title">Edit Modul Silabus</h3>
                        <p class="text-[11px] text-slate-400">Perbarui rincian modul silabus</p>
                    </div>
                </div>
                <button type="button" onclick="closeEditModal()" class="text-slate-400 hover:text-slate-600 p-1 rounded-lg hover:bg-slate-100 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <!-- Modal Body Form -->
            <form id="edit-form" method="POST" class="p-6 space-y-4">
                @csrf
                @method('PUT')

                <!-- Judul & Urutan -->
                <div class="grid grid-cols-1 sm:grid-cols-4 gap-4">
                    <div class="sm:col-span-3 space-y-1">
                        <label for="edit_title" class="block text-xs font-bold text-slate-700">Judul Modul / Fase <span class="text-red-500">*</span></label>
                        <input type="text" id="edit_title" name="title" required class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-800 focus:outline-none focus:ring-2 focus:ring-[#3cb759] focus:bg-white transition-all">
                    </div>
                    <div class="space-y-1">
                        <label for="edit_sort_order" class="block text-xs font-bold text-slate-700">Urutan</label>
                        <input type="number" id="edit_sort_order" name="sort_order" class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-800 focus:outline-none focus:ring-2 focus:ring-[#3cb759] focus:bg-white transition-all text-center font-bold">
                    </div>
                </div>

                <!-- Deskripsi Modul -->
                <div class="space-y-1">
                    <label for="edit_description" class="block text-xs font-bold text-slate-700">Deskripsi / Penjelasan Modul</label>
                    <textarea id="edit_description" name="description" rows="4" class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-800 focus:outline-none focus:ring-2 focus:ring-[#3cb759] focus:bg-white transition-all leading-relaxed"></textarea>
                </div>

                <!-- Footer Buttons -->
                <div class="flex items-center justify-end gap-2 pt-3 border-t border-slate-100">
                    <button type="button" onclick="closeEditModal()" class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs rounded-xl border border-slate-200 transition-colors">
                        Batal
                    </button>
                    <button type="submit" class="px-5 py-2 bg-[#3cb759] hover:bg-[#329d4c] text-white font-bold text-xs rounded-xl shadow-sm transition-all">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function openCreateModal() {
        document.getElementById('create-modal').classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    }

    function closeCreateModal() {
        document.getElementById('create-modal').classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }

    function openEditModal(syllabus) {
        const editForm = document.getElementById('edit-form');
        editForm.action = '{{ url("/admin/syllabuses") }}/' + syllabus.id;
        
        document.getElementById('edit_title').value = syllabus.title || '';
        document.getElementById('edit_sort_order').value = syllabus.sort_order || '';
        document.getElementById('edit_description').value = syllabus.description || '';

        document.getElementById('edit-modal').classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    }

    function closeEditModal() {
        document.getElementById('edit-modal').classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }
</script>
@endsection
