<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\RegisterOtpMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rules;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'min:3'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:20'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ], [
            'name.required' => 'Nama lengkap wajib diisi.',
            'name.min' => 'Nama lengkap minimal 3 karakter.',
            'email.required' => 'Alamat email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email ini sudah terdaftar.',
            'phone.required' => 'Nomor telepon / WhatsApp wajib diisi.',
            'password.required' => 'Password wajib diisi.',
            'password.confirmed' => 'Konfirmasi password tidak sesuai.',
            'password.min' => 'Password minimal 8 karakter.',
        ]);

        $otp = mt_rand(100000, 999999);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'otp' => (string) $otp,
            'otp_expires_at' => Carbon::now()->addMinutes(10),
            'email_verified_at' => null,
        ]);

        try {
            Mail::to($user->email)->send(new RegisterOtpMail($otp));
        } catch (\Exception $e) {
            // Log if email fails, but continue to verification page (admin can check logs, user can ask resend)
        }

        session(['verify_email' => $user->email]);

        return redirect()->route('verify.otp')->with('success', 'Pendaftaran berhasil! Silakan periksa email Anda untuk kode OTP.');
    }

    public function showVerifyOtpForm()
    {
        if (!session('verify_email')) {
            return redirect()->route('register')->withErrors(['email' => 'Silakan daftar terlebih dahulu.']);
        }
        return view('auth.verify-otp');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => ['required', 'digits:6'],
        ], [
            'otp.required' => 'Kode OTP wajib diisi.',
            'otp.digits' => 'Kode OTP harus berupa 6 angka.',
        ]);

        $email = session('verify_email');
        if (!$email) {
            return redirect()->route('register')->withErrors(['email' => 'Sesi Anda telah habis. Silakan daftar kembali.']);
        }

        $user = User::where('email', $email)->first();

        if (!$user) {
            return redirect()->route('register')->withErrors(['email' => 'Pengguna tidak ditemukan.']);
        }

        if ($user->otp !== $request->otp) {
            return back()->withErrors(['otp' => 'Kode OTP yang Anda masukkan salah.']);
        }

        if (Carbon::now()->greaterThan($user->otp_expires_at)) {
            return back()->withErrors(['otp' => 'Kode OTP Anda telah kedaluwarsa. Silakan daftar kembali atau hubungi admin.']);
        }

        $user->email_verified_at = Carbon::now();
        $user->otp = null;
        $user->otp_expires_at = null;
        $user->save();

        session()->forget('verify_email');

        $enrolledProgram = ProgramController::processPendingEnrollment($user->id);
        if ($enrolledProgram) {
            Auth::login($user);
            return redirect()->route('dashboard')->with('success', 'Verifikasi berhasil & Anda telah otomatis terdaftar pada program ' . $enrolledProgram . '!');
        }

        return redirect()->route('login')->with('success', 'Verifikasi berhasil! Akun Anda telah aktif, silakan Log in.');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'Alamat email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.',
        ]);

        $email = strtolower(trim($request->email));
        $password = $request->password;

        $user = User::where('email', $email)->first();

        if (!$user) {
            return back()->withErrors([
                'email' => 'Alamat email ini belum terdaftar.',
            ])->onlyInput('email');
        }

        if (is_null($user->email_verified_at)) {
            session(['verify_email' => $user->email]);
            return redirect()->route('verify.otp')->withErrors([
                'email' => 'Akun Anda belum diverifikasi. Silakan verifikasi email Anda dengan kode OTP.',
            ]);
        }

        $credentials = [
            'email' => $user->email,
            'password' => $password,
        ];

        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard')->with('success', 'Selamat datang Kembali, Admin!');
            }

            $enrolledProgram = ProgramController::processPendingEnrollment($user->id);
            if ($enrolledProgram) {
                return redirect()->route('dashboard')->with('success', 'Berhasil masuk & Anda telah otomatis terdaftar pada program ' . $enrolledProgram . '!');
            }
            return redirect('/')->with('success', 'Berhasil masuk. Selamat datang kembali!');
        }

        return back()->withErrors([
            'password' => 'Password yang Anda masukkan salah.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Anda telah berhasil keluar.');
    }
}
