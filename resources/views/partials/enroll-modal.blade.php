<!-- SweetAlert2 Library -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
    /* Custom SweetAlert2 Styling to match SmartPlus brand */
    .swal2-popup.smartplus-swal {
        font-family: 'Plus Jakarta Sans', sans-serif !important;
        border-radius: 1.5rem !important;
        padding: 2rem 1.75rem !important;
        box-shadow: 0 25px 50px -12px rgba(15, 23, 42, 0.25) !important;
    }
    .swal2-title.smartplus-title {
        font-size: 1.35rem !important;
        font-weight: 800 !important;
        color: #0f172a !important;
        letter-spacing: -0.02em !important;
    }
    .swal2-html-container.smartplus-content {
        font-size: 0.95rem !important;
        color: #475569 !important;
        line-height: 1.6 !important;
        margin-top: 0.75rem !important;
    }
    .swal2-actions.smartplus-actions {
        margin-top: 1.75rem !important;
        gap: 0.75rem !important;
    }
    .swal2-confirm.smartplus-btn-confirm {
        border-radius: 0.875rem !important;
        font-weight: 700 !important;
        font-size: 0.875rem !important;
        padding: 0.75rem 1.5rem !important;
        box-shadow: 0 4px 14px 0 rgba(60, 183, 89, 0.39) !important;
    }
    .swal2-cancel.smartplus-btn-cancel {
        border-radius: 0.875rem !important;
        font-weight: 600 !important;
        font-size: 0.875rem !important;
        padding: 0.75rem 1.25rem !important;
        background-color: #f1f5f9 !important;
        color: #64748b !important;
    }
    .swal2-cancel.smartplus-btn-cancel:hover {
        background-color: #e2e8f0 !important;
        color: #334155 !important;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    @php
        $authUser = auth()->user();
        $isLoggedIn = auth()->check();
        $isAdmin = $isLoggedIn && $authUser->role === 'admin';
        
        // Kumpulkan seluruh slug dan nama program yang telah terdaftar
        $enrolledList = [];
        if ($isLoggedIn) {
            foreach ($authUser->enrollments as $enr) {
                $enrolledList[] = strtolower(trim($enr->program_slug));
                if (!empty($enr->program_name)) {
                    $enrolledList[] = strtolower(trim($enr->program_name));
                }
            }
        }
    @endphp

    const authConfig = {
        isLoggedIn: {{ $isLoggedIn ? 'true' : 'false' }},
        isAdmin: {{ $isAdmin ? 'true' : 'false' }},
        enrolledList: @json($enrolledList),
        dashboardUrl: "{{ route('dashboard') }}",
        programs: {
            'agentik-ai': {
                name: 'Agentik AI N8N',
                aliases: ['agentik-ai', 'agentik-ai-n8n', 'agentik ai n8n']
            },
            'iot-esp32': {
                name: 'IoT Prototype ESP32',
                aliases: ['iot-esp32', 'iot-prototype-esp32', 'iot prototype esp32']
            },
            'industrial-iot': {
                name: 'Industrial Internet of Things (IIoT)',
                aliases: ['industrial-iot', 'iiot-industrial-internet-of-things', 'industrial internet of things (iiot)', 'iiot industrial iot']
            }
        }
    };

    // Helper untuk mengecek apakah user sudah terdaftar di program tertentu
    function isAlreadyEnrolled(slug) {
        if (!authConfig.isLoggedIn || !authConfig.enrolledList.length) return false;
        
        const normSlug = slug.toLowerCase().trim();
        if (authConfig.enrolledList.includes(normSlug)) return true;

        const prog = authConfig.programs[normSlug];
        if (prog && prog.aliases) {
            for (const alias of prog.aliases) {
                if (authConfig.enrolledList.includes(alias.toLowerCase())) {
                    return true;
                }
            }
        }
        return false;
    }

    // Intercept semua klik pada tombol/link pendaftaran program
    document.addEventListener('click', function (e) {
        const targetLink = e.target.closest('a[href*="/program/enroll/"]');
        if (!targetLink) return;

        e.preventDefault();
        const targetUrl = targetLink.href;
        
        // Ambil slug program dari URL
        const matches = targetUrl.match(/\/program\/enroll\/([^/?#]+)/);
        const slug = matches ? matches[1] : '';
        const programInfo = authConfig.programs[slug] || { name: 'Program Pelatihan' };
        const programName = programInfo.name;

        // 1. Validasi jika role Admin
        if (authConfig.isAdmin) {
            Swal.fire({
                icon: 'warning',
                title: 'Akses Dibatasi',
                html: 'Akun <b>Administrator</b> tidak dapat mendaftar sebagai peserta program pelatihan.',
                confirmButtonColor: '#3b66f5',
                confirmButtonText: 'Kembali',
                customClass: {
                    popup: 'smartplus-swal',
                    title: 'smartplus-title',
                    htmlContainer: 'smartplus-content',
                    confirmButton: 'smartplus-btn-confirm'
                }
            });
            return;
        }

        // 2. Validasi Duplikasi Pendaftaran (jika user sudah terdaftar)
        if (isAlreadyEnrolled(slug)) {
            Swal.fire({
                icon: 'info',
                title: 'Sudah Terdaftar!',
                html: `Anda sudah terdaftar pada program pelatihan <b>${programName}</b> sebelumnya.<br><span class="text-slate-500 text-sm mt-2 block">Silakan akses Dashboard Anda untuk melihat modul pembelajaran dan jadwal sesi pelatihan.</span>`,
                showCancelButton: true,
                confirmButtonColor: '#3b66f5',
                cancelButtonColor: '#f1f5f9',
                confirmButtonText: 'Buka Dashboard',
                cancelButtonText: 'Tutup',
                reverseButtons: true,
                customClass: {
                    popup: 'smartplus-swal',
                    title: 'smartplus-title',
                    htmlContainer: 'smartplus-content',
                    actions: 'smartplus-actions',
                    confirmButton: 'smartplus-btn-confirm',
                    cancelButton: 'smartplus-btn-cancel'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = authConfig.dashboardUrl;
                }
            });
            return;
        }

        // 3. Validasi & Konfirmasi jika user belum login
        if (!authConfig.isLoggedIn) {
            Swal.fire({
                icon: 'question',
                title: 'Daftar Program Pelatihan',
                html: `Anda akan mendaftar program pelatihan <b>${programName}</b>.<br><span class="text-slate-500 text-sm mt-2 block">Untuk melanjutkan pendaftaran, Anda akan diarahkan untuk membuat akun baru atau masuk terlebih dahulu.</span>`,
                showCancelButton: true,
                confirmButtonColor: '#3cb759',
                cancelButtonColor: '#f1f5f9',
                confirmButtonText: 'Lanjutkan Pendaftaran',
                cancelButtonText: 'Batal',
                reverseButtons: true,
                customClass: {
                    popup: 'smartplus-swal',
                    title: 'smartplus-title',
                    htmlContainer: 'smartplus-content',
                    actions: 'smartplus-actions',
                    confirmButton: 'smartplus-btn-confirm',
                    cancelButton: 'smartplus-btn-cancel'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = targetUrl;
                }
            });
            return;
        }

        // 4. Konfirmasi Pendaftaran untuk user yang sudah login dan belum terdaftar
        Swal.fire({
            icon: 'question',
            title: 'Konfirmasi Pendaftaran',
            html: `Apakah Anda yakin ingin mendaftar pada program pelatihan <b>${programName}</b>?`,
            showCancelButton: true,
            confirmButtonColor: '#3cb759',
            cancelButtonColor: '#f1f5f9',
            confirmButtonText: 'Ya, Daftar Sekarang',
            cancelButtonText: 'Batal',
            reverseButtons: true,
            customClass: {
                popup: 'smartplus-swal',
                title: 'smartplus-title',
                htmlContainer: 'smartplus-content',
                actions: 'smartplus-actions',
                confirmButton: 'smartplus-btn-confirm',
                cancelButton: 'smartplus-btn-cancel'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Memproses Pendaftaran...',
                    text: 'Mohon tunggu sebentar',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    },
                    customClass: {
                        popup: 'smartplus-swal',
                        title: 'smartplus-title'
                    }
                });
                window.location.href = targetUrl;
            }
        });
    });

    // Menampilkan Flash Message jika ada sesi redirect
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: "{{ session('success') }}",
            confirmButtonColor: '#3cb759',
            customClass: {
                popup: 'smartplus-swal',
                title: 'smartplus-title',
                confirmButton: 'smartplus-btn-confirm'
            }
        });
    @endif

    @if(session('warning'))
        Swal.fire({
            icon: 'warning',
            title: 'Perhatian',
            text: "{{ session('warning') }}",
            confirmButtonColor: '#f59e0b',
            customClass: {
                popup: 'smartplus-swal',
                title: 'smartplus-title',
                confirmButton: 'smartplus-btn-confirm'
            }
        });
    @endif

    @if(session('info'))
        Swal.fire({
            icon: 'info',
            title: 'Informasi',
            text: "{{ session('info') }}",
            confirmButtonColor: '#3b66f5',
            customClass: {
                popup: 'smartplus-swal',
                title: 'smartplus-title',
                confirmButton: 'smartplus-btn-confirm'
            }
        });
    @endif

    @if(session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: "{{ session('error') }}",
            confirmButtonColor: '#ef4444',
            customClass: {
                popup: 'smartplus-swal',
                title: 'smartplus-title',
                confirmButton: 'smartplus-btn-confirm'
            }
        });
    @endif
});
</script>
