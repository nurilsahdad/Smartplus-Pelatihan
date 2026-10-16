<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pengaturan Profil - CV. SMARTPLUS INDONESIA</title>

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Vite Styles and Scripts / Tailwind Fallback -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        fontFamily: {
                            sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                        }
                    }
                }
            }
        </script>
    @endif
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>
<body class="bg-[#f4f7fe] text-slate-800 antialiased min-h-screen flex flex-col pt-20">

    <!-- TOP NAVBAR -->
    @include('partials.navbar')

    <!-- DASHBOARD CONTAINER WITH SIDEBAR & MAIN CONTENT -->
    <div class="flex-1 flex flex-col md:flex-row w-full min-h-[calc(100vh-5rem)]">

        <!-- LEFT SIDEBAR PANEL -->
        <aside class="w-full md:w-64 bg-white border-b md:border-b-0 md:border-r border-slate-100 p-4 sm:p-6 shrink-0 shadow-sm md:sticky md:top-20 md:h-[calc(100vh-5rem)] md:overflow-y-auto">
            <div class="flex md:flex-col overflow-x-auto md:overflow-visible gap-2 md:space-y-2 whitespace-nowrap pb-1 md:pb-0">
                <!-- Dashboard Item -->
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3.5 px-4 py-3 text-slate-500 hover:text-slate-900 hover:bg-slate-50 font-medium rounded-xl transition-colors shrink-0 text-xs sm:text-sm">
                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                    </svg>
                    <span>Dashboard</span>
                </a>

                <!-- Profile Item (Active) -->
                <a href="{{ route('profile') }}" class="flex items-center gap-3.5 px-4 py-3 bg-[#e8f0fe] text-[#2b54f5] font-bold rounded-xl transition-all shrink-0 text-xs sm:text-sm">
                    <svg class="w-5 h-5 text-[#2b54f5]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    <span>Profile</span>
                </a>

                <!-- Jadwal Pelatihan Item -->
                <a href="{{ route('schedules') }}" class="flex items-center gap-3.5 px-4 py-3 text-slate-500 hover:text-slate-900 hover:bg-slate-50 font-medium rounded-xl transition-colors shrink-0 text-xs sm:text-sm">
                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <span>Jadwal Pelatihan</span>
                </a>

                <!-- Sertifikat Item -->
                <a href="{{ route('certificates') }}" class="flex items-center gap-3.5 px-4 py-3 {{ request()->routeIs('certificates*') ? 'bg-[#e8f0fe] text-[#2b54f5] font-bold' : 'text-slate-500 hover:text-slate-900 hover:bg-slate-50 font-medium' }} rounded-xl transition-colors shrink-0 text-xs sm:text-sm">
                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                    </svg>
                    <span>Sertifikat</span>
                </a>

                <!-- Riwayat Pembayaran Item -->
                <a href="#" class="flex items-center gap-3.5 px-4 py-3 text-slate-500 hover:text-slate-900 hover:bg-slate-50 font-medium rounded-xl transition-colors shrink-0 text-xs sm:text-sm">
                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    <span>Riwayat Pembayaran</span>
                </a>
            </div>
        </aside>

        <!-- RIGHT MAIN CONTENT -->
        <main class="flex-1 p-6 sm:p-8 space-y-6 max-w-7xl">

            <!-- PAGE HEADER TITLE & SUBTITLE -->
            <div>
                <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">Pengaturan Profil</h1>
                <p class="text-slate-500 text-xs sm:text-sm font-normal mt-1">Kelola informasi pribadi dan pengaturan akun Anda</p>
            </div>

            @if(session('success'))
                <div class="p-4 bg-emerald-50 text-emerald-700 text-sm rounded-2xl border border-emerald-200 font-semibold flex items-center gap-2">
                    <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @if($errors->any())
                <div class="p-4 bg-red-50 text-red-700 text-sm rounded-2xl border border-red-200 font-medium">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- PROFILE FORM WRAPPER -->
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <!-- 1. TOP HEADER USER CARD -->
                <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 sm:p-8 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-6">
                    <div class="flex items-center gap-5">
                        <!-- User Avatar -->
                        <div class="relative group">
                            @if($user->photo)
                                <img src="{{ asset($user->photo) }}" alt="{{ $user->name }}" class="w-20 h-20 rounded-full object-cover border-2 border-blue-100 shadow-sm">
                            @else
                                <div class="w-20 h-20 bg-[#eef3ff] border border-blue-100 rounded-full flex items-center justify-center text-[#2b54f5] shrink-0">
                                    <svg class="w-10 h-10 text-[#2b54f5]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                            @endif
                        </div>

                        <!-- User Info Header -->
                        <div class="space-y-1.5">
                            <h2 class="text-xl sm:text-2xl font-bold text-slate-900 tracking-tight">
                                {{ $user->name }}
                            </h2>
                            <div>
                                <span class="inline-flex items-center gap-1.5 bg-[#eef2ff] text-[#2b54f5] border border-blue-100 font-semibold text-xs px-3 py-1 rounded-full">
                                    🎓 Peserta Pelatihan
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Edit Photo Button -->
                    <div>
                        <input type="file" id="photoInput" name="photo" accept="image/*" class="hidden" onchange="previewPhoto(event)">
                        <button type="button" onclick="document.getElementById('photoInput').click()"
                                class="inline-flex items-center gap-2 border-2 border-[#0052ff] text-[#0052ff] hover:bg-[#0052ff] hover:text-white font-bold text-xs sm:text-sm px-5 py-2.5 rounded-xl transition-all shadow-sm">
                            Edit Foto
                        </button>
                    </div>
                </div>

                <!-- 2. PERSONAL INFO CARD SECTION -->
                <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 sm:p-8 space-y-6">
                    <h3 class="text-lg font-bold text-slate-900 tracking-tight">Informasi Pribadi</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <!-- Field 1: Nama Lengkap -->
                        <div>
                            <label for="name" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Nama Lengkap</label>
                            <input type="text" id="name" name="name" required value="{{ old('name', $user->name) }}"
                                   class="w-full bg-[#f8fafc] border border-slate-200/80 rounded-xl px-4 py-3 text-sm text-slate-800 focus:outline-none focus:bg-white focus:ring-2 focus:ring-[#0052ff]/30 focus:border-[#0052ff] font-medium transition-all">
                        </div>

                        <!-- Field 2: Email -->
                        <div>
                            <label for="email" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Email</label>
                            <input type="email" id="email" name="email" required value="{{ old('email', $user->email) }}"
                                   class="w-full bg-[#f8fafc] border border-slate-200/80 rounded-xl px-4 py-3 text-sm text-slate-800 focus:outline-none focus:bg-white focus:ring-2 focus:ring-[#0052ff]/30 focus:border-[#0052ff] font-medium transition-all">
                        </div>

                        <!-- Field 3: Nomor Telepon -->
                        <div>
                            <label for="phone" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Nomor Telepon</label>
                            <input type="text" id="phone" name="phone" placeholder="+62 812-3456-7890" value="{{ old('phone', $user->phone ?? '+62 812-3456-7890') }}"
                                   class="w-full bg-[#f8fafc] border border-slate-200/80 rounded-xl px-4 py-3 text-sm text-slate-800 focus:outline-none focus:bg-white focus:ring-2 focus:ring-[#0052ff]/30 focus:border-[#0052ff] font-medium transition-all">
                        </div>

                        <!-- Field 4: Tanggal Lahir -->
                        <div>
                            <label for="birthdate" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Tanggal Lahir</label>
                            @php
                                $formattedBirthdate = '';
                                if (old('birthdate')) {
                                    $formattedBirthdate = old('birthdate');
                                } elseif (!empty($user->birthdate)) {
                                    try {
                                        $formattedBirthdate = \Carbon\Carbon::parse($user->birthdate)->format('Y-m-d');
                                    } catch (\Exception $e) {
                                        $formattedBirthdate = $user->birthdate;
                                    }
                                }
                            @endphp
                            <input type="date" id="birthdate" name="birthdate" value="{{ $formattedBirthdate }}"
                                   class="w-full bg-[#f8fafc] border border-slate-200/80 rounded-xl px-4 py-3 text-sm text-slate-800 focus:outline-none focus:bg-white focus:ring-2 focus:ring-[#0052ff]/30 focus:border-[#0052ff] font-medium transition-all cursor-pointer">
                        </div>

                        <!-- Field 5: Jenis Kelamin -->
                        <div>
                            <label for="gender" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Jenis Kelamin</label>
                            @php $currentGender = old('gender', $user->gender ?? 'Laki-laki'); @endphp
                            <select id="gender" name="gender"
                                    class="w-full bg-[#f8fafc] border border-slate-200/80 rounded-xl px-4 py-3 text-sm text-slate-800 focus:outline-none focus:bg-white focus:ring-2 focus:ring-[#0052ff]/30 focus:border-[#0052ff] font-medium transition-all cursor-pointer">
                                <option value="Laki-laki" {{ $currentGender == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ $currentGender == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>

                        <!-- Field 6: Alamat -->
                        <div>
                            <label for="address" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Alamat</label>
                            <input type="text" id="address" name="address" placeholder="Jl. Kaliurang KM 5.6, Sleman, Yogyakarta" value="{{ old('address', $user->address ?? 'Jl. Kaliurang KM 5.6, Sleman, Yogyakarta') }}"
                                   class="w-full bg-[#f8fafc] border border-slate-200/80 rounded-xl px-4 py-3 text-sm text-slate-800 focus:outline-none focus:bg-white focus:ring-2 focus:ring-[#0052ff]/30 focus:border-[#0052ff] font-medium transition-all">
                        </div>

                    </div>
                </div>

                <!-- 3. ACTION BUTTON -->
                <div class="flex justify-end pt-2">
                    <button type="submit"
                            class="bg-[#0052ff] hover:bg-[#0042d6] text-white font-bold text-sm px-8 py-3.5 rounded-xl shadow-md hover:shadow-lg transition-all hover:-translate-y-0.5">
                        Simpan Perubahan
                    </button>
                </div>

            </form>

        </main>

    </div>

    <script>
        function previewPhoto(event) {
            const input = event.target;
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    alert('Foto terpilih! Klik "Simpan Perubahan" untuk menyimpannya.');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

</body>
</html>
