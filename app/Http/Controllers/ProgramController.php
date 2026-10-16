<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProgramController extends Controller
{
    public static $programs = [
        'agentik-ai' => [
            'name' => 'Agentik AI N8N',
            'view' => 'program.detail-agentik-ai',
        ],
        'iot-esp32' => [
            'name' => 'IoT Prototype ESP32',
            'view' => 'program.detail-iot',
        ],
        'industrial-iot' => [
            'name' => 'Industrial Internet of Things (IIoT)',
            'view' => 'program.detail-iiot',
        ],
    ];

    public function detailAgentikAi()
    {
        $program = Program::where('id', 1)->orWhere('slug', 'agentik-ai')->orWhere('slug', 'agentik-ai-n8n')->first();
        $syllabuses = $program ? $program->syllabuses()->get() : collect();
        return view('program.detail-agentik-ai', compact('program', 'syllabuses'));
    }

    public function detailIot()
    {
        $program = Program::where('id', 2)->orWhere('slug', 'iot-esp32')->orWhere('slug', 'iot-prototype-esp32')->first();
        $syllabuses = $program ? $program->syllabuses()->get() : collect();
        return view('program.detail-iot', compact('program', 'syllabuses'));
    }

    public function detailIiot()
    {
        $program = Program::where('id', 3)->orWhere('slug', 'industrial-iot')->orWhere('slug', 'iiot-industrial-internet-of-things')->first();
        $syllabuses = $program ? $program->syllabuses()->get() : collect();
        return view('program.detail-iiot', compact('program', 'syllabuses'));
    }

    public function enroll($slug)
    {
        if (!array_key_exists($slug, self::$programs)) {
            return redirect('/#program')->withErrors(['program' => 'Program pelatihan tidak ditemukan.']);
        }

        $program = self::$programs[$slug];

        if (!Auth::check()) {
            session(['pending_enrollment' => $slug]);
            return redirect()->route('register')->with('info', 'Silakan mendaftar akun terlebih dahulu untuk mengikuti program pelatihan ' . $program['name'] . '.');
        }

        $user = Auth::user();

        // Check if already enrolled
        $existing = Enrollment::where('user_id', $user->id)
            ->where('program_slug', $slug)
            ->first();

        if ($existing) {
            return redirect()->route('dashboard')->with('info', 'Anda telah terdaftar pada program pelatihan ' . $program['name'] . '.');
        }

        // Create enrollment
        Enrollment::create([
            'user_id' => $user->id,
            'program_slug' => $slug,
            'program_name' => $program['name'],
            'status' => 'Aktif',
        ]);

        session()->forget('pending_enrollment');

        return redirect()->route('dashboard')->with('success', 'Selamat! Anda berhasil mendaftar pada program pelatihan ' . $program['name'] . '.');
    }

    public static function processPendingEnrollment($userId)
    {
        $slug = session('pending_enrollment');
        if ($slug && array_key_exists($slug, self::$programs)) {
            $program = self::$programs[$slug];
            $existing = Enrollment::where('user_id', $userId)
                ->where('program_slug', $slug)
                ->first();

            if (!$existing) {
                Enrollment::create([
                    'user_id' => $userId,
                    'program_slug' => $slug,
                    'program_name' => $program['name'],
                    'status' => 'Aktif',
                ]);
            }
            session()->forget('pending_enrollment');
            return $program['name'];
        }
        return null;
    }
}
