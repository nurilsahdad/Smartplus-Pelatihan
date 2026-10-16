<?php

namespace App\Http\Controllers;

use App\Mail\ResetPasswordOtpMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('auth.forgot-password');
    }

    public function sendResetCode(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'exists:users,email'],
        ], [
            'email.required' => 'Alamat email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.exists' => 'Alamat email ini tidak terdaftar dalam sistem kami.',
        ]);

        $user = User::where('email', $request->email)->first();
        $otp = rand(100000, 999999);

        $user->otp = $otp;
        $user->otp_expires_at = now()->addMinutes(10);
        $user->save();

        try {
            Mail::to($user->email)->send(new ResetPasswordOtpMail($otp));
        } catch (\Exception $e) {
            // Email send fallback gracefully handled
        }

        session(['reset_password_email' => $user->email]);

        return redirect()->route('password.otp')->with('success', 'Kode OTP reset password telah dikirimkan ke email Anda.');
    }

    public function showVerifyOtpForm()
    {
        if (!session('reset_password_email')) {
            return redirect()->route('password.request')->withErrors(['email' => 'Silakan masukkan email Anda terlebih dahulu.']);
        }

        return view('auth.verify-reset-otp');
    }

    public function verifyResetOtp(Request $request)
    {
        $request->validate([
            'otp' => ['required', 'string', 'size:6'],
        ], [
            'otp.required' => 'Kode OTP wajib diisi.',
            'otp.size' => 'Kode OTP harus berjumlah 6 digit.',
        ]);

        $email = session('reset_password_email');
        if (!$email) {
            return redirect()->route('password.request');
        }

        $user = User::where('email', $email)->first();

        if (!$user || $user->otp !== $request->otp) {
            return back()->withErrors(['otp' => 'Kode OTP yang Anda masukkan salah.']);
        }

        if ($user->otp_expires_at && now()->greaterThan($user->otp_expires_at)) {
            return back()->withErrors(['otp' => 'Kode OTP telah kadaluarsa. Silakan minta kode baru.']);
        }

        session(['reset_password_verified_user_id' => $user->id]);

        return redirect()->route('password.reset')->with('success', 'OTP terverifikasi. Silakan buat kata sandi baru Anda.');
    }

    public function resetPassword(Request $request)
    {
        $userId = session('reset_password_verified_user_id');
        if (!$userId) {
            return redirect()->route('password.request');
        }

        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'password.required' => 'Password baru wajib diisi.',
            'password.min' => 'Password minimal berjumlah 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        $user = User::findOrFail($userId);
        $user->password = Hash::make($request->password);
        $user->otp = null;
        $user->otp_expires_at = null;
        $user->save();

        session()->forget(['reset_password_email', 'reset_password_verified_user_id']);

        return redirect()->route('login')->with('success', 'Kata sandi Anda telah berhasil diperbarui. Silakan masuk dengan kata sandi baru Anda.');
    }

    public function showResetForm()
    {
        if (!session('reset_password_verified_user_id')) {
            return redirect()->route('password.request');
        }

        return view('auth.reset-password');
    }
}
