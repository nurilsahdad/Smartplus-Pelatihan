<header id="navbar" class="fixed top-0 inset-x-0 z-50 bg-[#2d5bf0] shadow-md transition-all duration-300">
    <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between h-20">
        <!-- Logo Brand -->
        <div class="flex items-center">
            <a href="{{ url('/') }}" class="text-white font-extrabold text-base sm:text-xl tracking-wide shrink-0">
                CV.SMARTPLUS INDONESIA
            </a>
        </div>

        <!-- Desktop Navigation Links (hidden on mobile, visible md+) -->
        <div class="hidden md:flex items-center space-x-8">
            <a href="{{ url('/') }}" class="text-white/90 font-medium hover:text-white transition-colors">Home</a>
            <a href="{{ url('/#about') }}" class="text-white/90 font-medium hover:text-white transition-colors">About</a>

            <!-- Desktop Product Dropdown -->
            <div class="relative group">
                <button type="button" class="text-white/90 font-medium hover:text-white inline-flex items-center gap-1 focus:outline-none py-2">
                    <span>Product</span>
                    <svg class="w-4 h-4 group-hover:rotate-180 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div class="absolute left-0 pt-2 w-52 hidden group-hover:block z-50">
                    <div class="bg-white rounded-xl shadow-xl border border-slate-100 py-2">
                        <a href="{{ url('/program/agentik-ai') }}" class="block px-4 py-2 text-sm text-slate-700 hover:bg-blue-50 hover:text-blue-600 font-medium">Agentik AI N8N</a>
                        <a href="{{ url('/program/iot-esp32') }}" class="block px-4 py-2 text-sm text-slate-700 hover:bg-blue-50 hover:text-blue-600 font-medium">IoT Prototype ESP32</a>
                        <a href="{{ url('/program/industrial-iot') }}" class="block px-4 py-2 text-sm text-slate-700 hover:bg-blue-50 hover:text-blue-600 font-medium">Industrial IoT (IIoT)</a>
                    </div>
                </div>
            </div>

            <a href="{{ url('/#artikel') }}" class="text-white/90 font-medium hover:text-white transition-colors">Artikel</a>
            <a href="{{ url('/#contact') }}" class="text-white/90 font-medium hover:text-white transition-colors">Contact</a>
        </div>

        <!-- Desktop Right Actions & Auth -->
        <div class="hidden md:flex items-center gap-3">
            @auth
                <!-- Notification Bell Button -->
                <button type="button" class="w-9 h-9 sm:w-10 sm:h-10 bg-white rounded-full flex items-center justify-center text-slate-600 hover:bg-slate-50 transition-colors shadow-sm focus:outline-none relative">
                    <svg class="w-5 h-5 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                    </svg>
                </button>

                <!-- User Profile Dropdown Pill -->
                <div class="relative group">
                    <button type="button" class="flex items-center gap-2 bg-white text-slate-800 font-semibold text-xs sm:text-sm px-3.5 py-1.5 sm:px-4 sm:py-2 rounded-full shadow-sm hover:shadow transition-all focus:outline-none">
                        @if(Auth::user()->photo)
                            <img src="{{ asset(Auth::user()->photo) }}" alt="{{ Auth::user()->name }}" class="w-6 h-6 rounded-full object-cover border border-white shrink-0">
                        @else
                            <div class="w-6 h-6 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold text-xs shrink-0">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                        @endif
                        <span class="max-w-[120px] truncate">{{ Auth::user()->name }}</span>
                        <svg class="w-4 h-4 text-slate-400 group-hover:rotate-180 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    
                    <div class="absolute right-0 pt-2 w-max min-w-[160px] hidden group-hover:block z-50">
                        <div class="bg-white rounded-xl shadow-xl border border-slate-100 py-2">
                            <a href="{{ route('dashboard') }}" class="flex items-center gap-2 px-4 py-2 text-sm text-slate-700 hover:bg-blue-50 hover:text-blue-600 font-medium transition-colors cursor-pointer whitespace-nowrap">
                                <svg class="w-4 h-4 shrink-0 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                Kelola Akun
                            </a>
                            <form action="{{ route('logout') }}" method="POST" class="w-full m-0">
                                @csrf
                                <button type="submit" class="flex items-center gap-2 w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50 font-medium transition-colors cursor-pointer">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                    </svg>
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @else
                <a href="{{ route('login') }}" class="text-white/90 hover:text-white font-semibold transition-colors text-sm sm:text-base px-2">
                    Login
                </a>
                <a href="{{ route('register') }}" class="bg-white/20 hover:bg-white/30 text-white font-semibold px-5 py-2 rounded-full border border-white/40 backdrop-blur-sm transition-all shadow-sm hover:shadow text-sm sm:text-base">
                    Register
                </a>
            @endauth
        </div>

        <!-- Mobile Controls (Hamburger Toggle Button) -->
        <div class="flex items-center gap-2 md:hidden">
            @auth
                <!-- Small User Badge on Mobile Bar -->
                <a href="{{ route('dashboard') }}" class="w-8 h-8 rounded-full bg-white/20 flex items-center justify-center text-white border border-white/40 shrink-0">
                    @if(Auth::user()->photo)
                        <img src="{{ asset(Auth::user()->photo) }}" alt="{{ Auth::user()->name }}" class="w-full h-full rounded-full object-cover">
                    @else
                        <span class="text-xs font-bold">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
                    @endif
                </a>
            @endauth

            <button type="button" id="mobile-menu-btn" class="p-2 rounded-xl text-white hover:bg-white/10 focus:outline-none transition-colors" aria-label="Toggle navigation menu">
                <!-- Hamburger Icon -->
                <svg id="hamburger-icon" class="w-6 h-6 block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
                <!-- Close Icon -->
                <svg id="close-icon" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    </nav>

    <!-- Mobile Drawer Menu (Hidden by default) -->
    <div id="mobile-menu" class="hidden md:hidden bg-[#244bd2] border-t border-white/15 px-4 pt-3 pb-6 space-y-3 shadow-2xl transition-all">
        <div class="space-y-1">
            <a href="{{ url('/') }}" class="block px-3 py-2.5 rounded-xl text-white font-semibold hover:bg-white/10 transition-colors">
                Home
            </a>
            <a href="{{ url('/#about') }}" class="block px-3 py-2.5 rounded-xl text-white/90 hover:text-white font-medium hover:bg-white/10 transition-colors">
                About
            </a>

            <!-- Mobile Accordion Product -->
            <div>
                <button type="button" id="mobile-product-btn" class="w-full flex items-center justify-between px-3 py-2.5 rounded-xl text-white/90 hover:text-white font-medium hover:bg-white/10 transition-colors text-left focus:outline-none">
                    <span>Product</span>
                    <svg id="mobile-product-arrow" class="w-4 h-4 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div id="mobile-product-dropdown" class="hidden pl-4 pr-2 pt-1 pb-2 space-y-1 bg-white/5 rounded-xl mt-1">
                    <a href="{{ url('/program/agentik-ai') }}" class="block px-3 py-2 text-xs sm:text-sm text-blue-100 hover:text-white hover:bg-white/10 rounded-lg font-medium transition-colors">
                        Agentik AI N8N
                    </a>
                    <a href="{{ url('/program/iot-esp32') }}" class="block px-3 py-2 text-xs sm:text-sm text-blue-100 hover:text-white hover:bg-white/10 rounded-lg font-medium transition-colors">
                        IoT Prototype ESP32
                    </a>
                    <a href="{{ url('/program/industrial-iot') }}" class="block px-3 py-2 text-xs sm:text-sm text-blue-100 hover:text-white hover:bg-white/10 rounded-lg font-medium transition-colors">
                        Industrial IoT (IIoT)
                    </a>
                </div>
            </div>

            <a href="{{ url('/#artikel') }}" class="block px-3 py-2.5 rounded-xl text-white/90 hover:text-white font-medium hover:bg-white/10 transition-colors">
                Artikel
            </a>

            <a href="{{ url('/#contact') }}" class="block px-3 py-2.5 rounded-xl text-white/90 hover:text-white font-medium hover:bg-white/10 transition-colors">
                Contact
            </a>
        </div>

        <!-- Mobile User Info / Auth Buttons -->
        <div class="pt-3 border-t border-white/15 space-y-2">
            @auth
                <div class="px-3 py-2 bg-white/10 rounded-xl flex items-center justify-between gap-3">
                    <div class="flex items-center gap-2 min-w-0">
                        @if(Auth::user()->photo)
                            <img src="{{ asset(Auth::user()->photo) }}" alt="{{ Auth::user()->name }}" class="w-8 h-8 rounded-full object-cover border border-white shrink-0">
                        @else
                            <div class="w-8 h-8 rounded-full bg-emerald-500 text-white flex items-center justify-center font-bold text-xs shrink-0">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                        @endif
                        <div class="min-w-0">
                            <p class="text-xs font-bold text-white truncate">{{ Auth::user()->name }}</p>
                            <p class="text-[10px] text-blue-200 truncate">{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                    <a href="{{ route('dashboard') }}" class="bg-white text-blue-700 hover:bg-blue-50 font-bold text-xs px-3 py-1.5 rounded-lg shrink-0 transition-colors">
                        Dashboard
                    </a>
                </div>

                <form action="{{ route('logout') }}" method="POST" class="w-full">
                    @csrf
                    <button type="submit" class="w-full flex items-center justify-center gap-2 px-4 py-2.5 bg-red-500/20 hover:bg-red-500/30 text-red-100 rounded-xl font-medium text-xs border border-red-400/30 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                        Logout
                    </button>
                </form>
            @else
                <div class="grid grid-cols-2 gap-3 pt-1">
                    <a href="{{ route('login') }}" class="w-full py-2.5 text-center text-white font-semibold text-xs sm:text-sm bg-white/10 hover:bg-white/20 rounded-xl border border-white/30 transition-all">
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="w-full py-2.5 text-center text-blue-900 font-bold text-xs sm:text-sm bg-white hover:bg-slate-100 rounded-xl shadow-sm transition-all">
                        Register
                    </a>
                </div>
            @endauth
        </div>
    </div>
</header>

<script>
    (function () {
        const navbar = document.getElementById('navbar');
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const hamburgerIcon = document.getElementById('hamburger-icon');
        const closeIcon = document.getElementById('close-icon');
        const mobileProductBtn = document.getElementById('mobile-product-btn');
        const mobileProductDropdown = document.getElementById('mobile-product-dropdown');
        const mobileProductArrow = document.getElementById('mobile-product-arrow');

        // Scroll listener for sticky navbar background change
        const onScroll = () => {
            const scrolled = window.scrollY > 10;
            navbar.classList.toggle('shadow-lg', scrolled);
            navbar.classList.toggle('bg-[#2d5bf0]/95', scrolled);
            navbar.classList.toggle('backdrop-blur-md', scrolled);
        };
        window.addEventListener('scroll', onScroll, { passive: true });
        onScroll();

        // Toggle mobile drawer
        if (mobileMenuBtn && mobileMenu) {
            mobileMenuBtn.addEventListener('click', () => {
                const isOpen = !mobileMenu.classList.contains('hidden');
                mobileMenu.classList.toggle('hidden', isOpen);
                hamburgerIcon.classList.toggle('hidden', !isOpen);
                closeIcon.classList.toggle('hidden', isOpen);
            });
        }

        // Toggle mobile Product accordion
        if (mobileProductBtn && mobileProductDropdown) {
            mobileProductBtn.addEventListener('click', (e) => {
                e.preventDefault();
                const isProdOpen = !mobileProductDropdown.classList.contains('hidden');
                mobileProductDropdown.classList.toggle('hidden', isProdOpen);
                if (mobileProductArrow) {
                    mobileProductArrow.classList.toggle('rotate-180', !isProdOpen);
                }
            });
        }
    })();
</script>