<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ProgramController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminProgramController;
use App\Http\Controllers\AdminSyllabusController;
use App\Http\Controllers\AdminScheduleController;
use App\Http\Controllers\AdminCertificateController;
use App\Http\Controllers\AdminArticleController;
use App\Http\Controllers\AdminSettingController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\ArticleController;
use App\Models\Article;

Route::get('/', function () {
    if (auth()->check() && auth()->user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    $articles = Article::where('status', 'Published')->latest()->take(6)->get();
    return view('home', compact('articles'));
});

Route::get('/artikel', function () {
    return redirect('/#artikel');
})->name('articles.index');
Route::get('/artikel/{slug}', function () {
    return redirect('/#artikel');
})->name('articles.show');

Route::get('/program/agentik-ai', [ProgramController::class, 'detailAgentikAi'])->name('program.agentik-ai');
Route::get('/program/iot-esp32', [ProgramController::class, 'detailIot'])->name('program.iot-esp32');
Route::get('/program/industrial-iot', [ProgramController::class, 'detailIiot'])->name('program.industrial-iot');
Route::get('/program/enroll/{slug}', [ProgramController::class, 'enroll'])->name('program.enroll');



Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/verify-otp', [AuthController::class, 'showVerifyOtpForm'])->name('verify.otp');
    Route::post('/verify-otp', [AuthController::class, 'verifyOtp']);

    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    // Forgot Password Routes
    Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetCode'])->name('password.email');
    Route::get('/forgot-password/verify', [ForgotPasswordController::class, 'showVerifyOtpForm'])->name('password.otp');
    Route::post('/forgot-password/verify', [ForgotPasswordController::class, 'verifyResetOtp'])->name('password.otp.verify');
    Route::get('/reset-password', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword'])->name('password.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/schedules', [DashboardController::class, 'schedules'])->name('schedules');
    Route::get('/certificates', [CertificateController::class, 'index'])->name('certificates');
    Route::get('/certificates/{id}', [CertificateController::class, 'show'])->name('certificates.show');
    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
    Route::post('/profile', [DashboardController::class, 'updateProfile'])->name('profile.update');
    Route::match(['get', 'post'], '/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/enrollments', [AdminDashboardController::class, 'enrollments'])->name('enrollments');
    Route::post('/enrollments/{enrollment}/status', [AdminDashboardController::class, 'updateEnrollmentStatus'])->name('enrollments.status');
    Route::delete('/enrollments/{enrollment}', [AdminDashboardController::class, 'deleteEnrollment'])->name('enrollments.delete');
    Route::get('/users', [AdminDashboardController::class, 'users'])->name('users');
    Route::resource('programs', AdminProgramController::class);
    Route::get('/syllabuses', [AdminSyllabusController::class, 'main'])->name('syllabuses.index');
    Route::get('/programs/{program}/syllabuses', [AdminSyllabusController::class, 'index'])->name('programs.syllabuses.index');
    Route::post('/programs/{program}/syllabuses', [AdminSyllabusController::class, 'store'])->name('programs.syllabuses.store');
    Route::put('/syllabuses/{syllabus}', [AdminSyllabusController::class, 'update'])->name('syllabuses.update');
    Route::delete('/syllabuses/{syllabus}', [AdminSyllabusController::class, 'destroy'])->name('syllabuses.destroy');
    Route::resource('schedules', AdminScheduleController::class)->only(['index', 'store', 'update', 'destroy']);
    Route::resource('certificates', AdminCertificateController::class);
    Route::post('/certificates/{certificate}/toggle-status', [AdminCertificateController::class, 'toggleStatus'])->name('certificates.toggle-status');
    Route::resource('articles', AdminArticleController::class);
    Route::get('/settings', [AdminSettingController::class, 'index'])->name('settings.index');
    Route::post('/settings', [AdminSettingController::class, 'update'])->name('settings.update');
});


