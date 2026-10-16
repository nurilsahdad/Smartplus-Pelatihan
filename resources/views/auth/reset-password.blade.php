<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth bg-slate-50">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Buat Kata Sandi Baru - CV. SMARTPLUS INDONESIA</title>

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: { extend: { fontFamily: { sans: ['"Plus Jakarta Sans"', 'sans-serif'] } } }
            }
        </script>
    @endif
</head>
<body class="font-sans antialiased text-slate-900 bg-[#f4f6f9] min-h-screen flex flex-col justify-between selection:bg-blue-500 selection:text-white">

    <!-- TOP NAVBAR HEADER -->
    <div class="h-20 bg-[#2d5bf0]">
        @include('partials.navbar')
    </div>

    <!-- MAIN CONTENT CARD CONTAINER -->
    <main class="flex-1 py-12 lg:py-20 px-4 sm:px-6 lg:px-8 flex items-center justify-center">
        <div class="max-w-md w-full space-y-8 bg-white p-8 sm:p-10 rounded-3xl shadow-xl border border-slate-100">
            <div class="text-center">
                <div class="w-14 h-14 bg-emerald-50 text-[#3cb759] rounded-full flex items-center justify-center mx-auto mb-4 border border-emerald-100">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                </div>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">Kata Sandi Baru</h2>
                <p class="mt-2 text-sm text-slate-600 leading-relaxed">
                    Buat kata sandi baru untuk akun Anda. Kata sandi minimal berjumlah 8 karakter.
                </p>
            </div>

            @if(session('success'))
                <div class="bg-emerald-50 text-emerald-600 p-4 rounded-xl text-sm border border-emerald-100 text-center font-medium">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="bg-red-50 text-red-600 p-4 rounded-xl text-sm border border-red-100 text-center font-medium">
                    {{ $errors->first() }}
                </div>
            @endif

            <form class="mt-8 space-y-5" action="{{ route('password.update') }}" method="POST">
                @csrf
                
                <div>
                    <label for="password" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Password Baru</label>
                    <input id="password" name="password" type="password" required minlength="8"
                           class="w-full bg-[#f8fafc] border border-slate-200 rounded-xl px-4 py-3.5 text-sm text-slate-800 focus:outline-none focus:bg-white focus:ring-2 focus:ring-[#3cb759]/40 focus:border-[#3cb759] font-medium transition-all"
                           placeholder="Minimal 8 karakter">
                </div>

                <div>
                    <label for="password_confirmation" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Konfirmasi Password Baru</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" required minlength="8"
                           class="w-full bg-[#f8fafc] border border-slate-200 rounded-xl px-4 py-3.5 text-sm text-slate-800 focus:outline-none focus:bg-white focus:ring-2 focus:ring-[#3cb759]/40 focus:border-[#3cb759] font-medium transition-all"
                           placeholder="Ulangi password baru">
                </div>

                <div>
                    <button type="submit" class="w-full flex justify-center py-3.5 px-4 border border-transparent text-sm font-bold rounded-xl text-white bg-[#3cb759] hover:bg-[#329d4c] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#3cb759] transition-all shadow-md">
                        Simpan Kata Sandi Baru
                    </button>
                </div>
            </form>
            
            <div class="text-center mt-4 pt-2">
                <p class="text-sm text-slate-500">
                    Batal reset? <a href="{{ route('login') }}" class="font-medium text-[#2b54f5] hover:underline">Kembali ke login</a>
                </p>
            </div>
        </div>
    </main>

    <!-- FOOTER -->
    @include('partials.footer')

</body>
</html>
