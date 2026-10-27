<footer id="contact" class="bg-[#2d3238] text-slate-300 pt-12 sm:pt-16 pb-8 sm:pb-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-12 gap-8 lg:gap-12 pb-8 sm:pb-12 border-b border-slate-700/60">

            <!-- Col 1: Brand & Address -->
            <div class="sm:col-span-2 lg:col-span-4 space-y-4">
                <h3 class="text-white font-extrabold text-base sm:text-lg tracking-wide uppercase">
                    CV.SMARTPLUS INDONESIA
                </h3>
                <p class="text-slate-400 text-xs leading-relaxed max-w-sm">
                    GRAND CIKARANG CITY BLOK G12 NO.4 BEKASI-INDONESIA
                </p>
                <div class="flex space-x-3 pt-2">
                    <a href="#" class="w-8 h-8 rounded-full bg-slate-700/80 flex items-center justify-center text-slate-300 hover:bg-slate-600 hover:text-white transition-colors">
                        <span class="text-xs font-semibold">fb</span>
                    </a>
                    <a href="#" class="w-8 h-8 rounded-full bg-slate-700/80 flex items-center justify-center text-slate-300 hover:bg-slate-600 hover:text-white transition-colors">
                        <span class="text-xs font-semibold">ig</span>
                    </a>
                    <a href="#" class="w-8 h-8 rounded-full bg-slate-700/80 flex items-center justify-center text-slate-300 hover:bg-slate-600 hover:text-white transition-colors">
                        <span class="text-xs font-semibold">in</span>
                    </a>
                </div>
            </div>

            <!-- Col 2: Company Links -->
            <div class="lg:col-span-2 space-y-3">
                <h4 class="text-white font-bold text-sm">Company</h4>
                <ul class="space-y-2 text-xs text-slate-400">
                    <li><a href="{{ url('/#about') }}" class="hover:text-white transition-colors">About us</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Blog</a></li>
                    <li><a href="#contact" class="hover:text-white transition-colors">Contact us</a></li>
                    <li><a href="{{ url('/#program') }}" class="hover:text-white transition-colors">Program</a></li>
                </ul>
            </div>

            <!-- Col 3: Support Links -->
            <div class="lg:col-span-2 space-y-3">
                <h4 class="text-white font-bold text-sm">Support</h4>
                <ul class="space-y-2 text-xs text-slate-400">
                    <li><a href="#" class="hover:text-white transition-colors">Help center</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Terms of service</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Privacy policy</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Status</a></li>
                </ul>
            </div>

            <!-- Col 4: Newsletter Form -->
            <div class="sm:col-span-2 lg:col-span-4 space-y-3">
                <h4 class="text-white font-bold text-sm">Stay up to date</h4>
                <form class="flex items-center max-w-sm w-full" onsubmit="event.preventDefault();">
                    <input type="email" placeholder="Your email address" class="w-full min-w-0 bg-slate-800 text-slate-200 placeholder-slate-500 text-xs px-3.5 sm:px-4 py-3 rounded-l-xl focus:outline-none focus:ring-1 focus:ring-blue-500 border border-slate-700">
                    <button type="submit" class="bg-slate-700 hover:bg-slate-600 text-white px-4 py-3 rounded-r-xl transition-colors border border-l-0 border-slate-700 shrink-0">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </button>
                </form>
            </div>

        </div>

        <!-- Copyright -->
        <div class="pt-6 sm:pt-8 text-center text-xs text-slate-500">
            &copy; {{ date('Y') }} CV. SMARTPLUS INDONESIA. All rights reserved.
        </div>
    </div>
</footer>

@include('partials.enroll-modal')

