@extends('admin.layout')

@section('title', 'Pengaturan Nomor WhatsApp')

@section('content')
    <!-- HEADER TITLE -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
        <div>
            <h1 class="text-2xl font-extrabold text-slate-900 tracking-tight">Pengaturan WhatsApp</h1>
            <p class="text-slate-500 text-xs sm:text-sm mt-0.5">Kelola nomor tujuan untuk tombol chat WhatsApp di halaman beranda</p>
        </div>
        <div class="flex items-center gap-2 shrink-0">
            <span class="inline-flex items-center gap-1.5 bg-emerald-50 text-[#3cb759] border border-emerald-200 text-xs font-bold px-3 py-1.5 rounded-full">
                <span class="w-2 h-2 rounded-full bg-[#3cb759]"></span>
                WhatsApp Button Active
            </span>
        </div>
    </div>

    <!-- MAIN FORM -->
    <div class="max-w-2xl bg-white rounded-2xl border border-slate-100 shadow-sm p-6 sm:p-8">
        <div class="flex items-center gap-3 pb-6 border-b border-slate-100 mb-6">
            <div class="w-10 h-10 rounded-xl bg-emerald-50 text-[#3cb759] flex items-center justify-center shrink-0 border border-emerald-100">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                </svg>
            </div>
            <div>
                <h2 class="text-base font-bold text-slate-800">Nomor WhatsApp Tujuan</h2>
                <p class="text-xs text-slate-400">Pengunjung beranda yang menekan icon WhatsApp akan langsung diarahkan ke chat nomor ini</p>
            </div>
        </div>

        <form action="{{ route('admin.settings.update') }}" method="POST" class="space-y-6">
            @csrf

            <!-- INPUT NOMOR WHATSAPP -->
            <div>
                <label for="whatsapp_number" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
                    Nomor WhatsApp <span class="text-red-500">*</span>
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                        <span class="text-xs font-bold text-slate-500 bg-slate-100 px-2 py-1 rounded">ID (+62)</span>
                    </div>
                    <input type="text" 
                           id="whatsapp_number" 
                           name="whatsapp_number" 
                           value="{{ old('whatsapp_number', $whatsappNumber) }}" 
                           placeholder="Contoh: 081234567890" 
                           class="w-full pl-24 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm font-semibold text-slate-800 placeholder-slate-400 focus:outline-none focus:border-[#3cb759] focus:bg-white focus:ring-1 focus:ring-[#3cb759] transition-all">
                </div>
                @error('whatsapp_number')
                    <p class="text-xs text-red-500 font-semibold mt-1.5">{{ $message }}</p>
                @enderror
                <p class="text-[11px] text-slate-500 mt-2 leading-relaxed">
                    Dapat ditulis dengan awalan <span class="font-bold text-slate-700">08...</span> atau <span class="font-bold text-slate-700">628...</span>. Sistem akan otomatis menyesuaikannya ke nomor tujuan WhatsApp.
                </p>
            </div>

            <!-- TOMBOL SIMPAN -->
            <div class="pt-4 border-t border-slate-100 flex items-center justify-end">
                <button type="submit" class="inline-flex items-center gap-2 bg-[#3cb759] hover:bg-[#329d4c] text-white px-6 py-2.5 rounded-xl font-bold text-xs shadow-md shadow-emerald-500/20 hover:shadow-lg transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
@endsection
