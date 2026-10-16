<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth bg-slate-50">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Verifikasi OTP - CV. SMARTPLUS INDONESIA</title>

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
                <div class="w-14 h-14 bg-emerald-50 text-emerald-600 rounded-full flex items-center justify-center mx-auto mb-4 border border-emerald-100">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">Verifikasi Email</h2>
                <p class="mt-2 text-sm text-slate-600 leading-relaxed">
                    Masukkan kode OTP 6-digit yang telah kami kirimkan ke email Anda.
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

            <form class="mt-8 space-y-6" action="{{ route('verify.otp') }}" method="POST">
                @csrf
                
                <div>
                    <label for="otp" class="sr-only">Kode OTP</label>
                    <input id="otp" name="otp" type="text" inputmode="numeric" required class="appearance-none relative block w-full px-4 py-4 border border-slate-300 placeholder-slate-400 text-slate-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#3cb759] focus:border-[#3cb759] sm:text-lg text-center tracking-[0.5em] font-bold" placeholder="------" maxlength="6">
                </div>

                <div>
                    <button type="submit" class="group relative w-full flex justify-center py-3.5 px-4 border border-transparent text-sm font-bold rounded-xl text-white bg-[#3cb759] hover:bg-[#329d4c] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#3cb759] transition-all shadow-md">
                        Verifikasi OTP
                    </button>
                </div>
            </form>
            
            <div class="text-center mt-4">
                <p class="text-sm text-slate-500">
                    Tidak menerima email? <a href="{{ route('register') }}" class="font-medium text-[#3b66f5] hover:text-[#2b50d8]">Daftar ulang</a>
                </p>
            </div>
        </div>
    </main>

    <!-- FOOTER -->
    @include('partials.footer')

</body>
</html>
