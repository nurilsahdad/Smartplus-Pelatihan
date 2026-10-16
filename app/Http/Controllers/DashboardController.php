<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $enrollments = $user->enrollments()->latest()->get();

        $stats = [
            'available_trainings' => count($enrollments),
            'my_certificates' => $user->certificates()->where('status', 'Aktif')->count(),
            'my_payments' => 0,
        ];

        $recentTrainings = [
            [
                'title' => 'IoT Prototype ESP32',
                'category' => 'IoT',
                'image' => 'images/AssetsIOT.png',
                'description' => 'Pelatihan dasar hingga menengah mengenai pengembangan perangkat IoT menggunakan ESP32, sensor, dan koneksi internet.',
                'link' => url('/program/iot-esp32'),
            ],
            [
                'title' => 'Agentik AI N8N',
                'category' => 'AI',
                'image' => 'images/AssetsN8N.png',
                'description' => 'Pelatihan pengenalan dasar Artificial Intelligence mulai dari konsep, pemrograman, hingga penerapan AI sederhana.',
                'link' => url('/program/agentik-ai'),
            ],
        ];

        return view('dashboard.index', compact('user', 'stats', 'recentTrainings', 'enrollments'));
    }

    public function profile()
    {
        $user = Auth::user();
        return view('dashboard.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,'.$user->id],
            'phone' => ['nullable', 'string', 'max:50'],
            'birthdate' => ['nullable', 'date'],
            'gender' => ['nullable', 'string', 'max:50'],
            'address' => ['nullable', 'string', 'max:500'],
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'],
        ]);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/profile'), $filename);
            $validated['photo'] = 'uploads/profile/' . $filename;
        }

        $user->update($validated);

        return back()->with('success', 'Profil Anda berhasil diperbarui!');
    }

    public function schedules()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $enrollments = $user->enrollments()->latest()->get();
        $programSlugs = $enrollments->pluck('program_slug')->filter()->unique()->toArray();

        // Get programs matching registered slugs with their schedules
        $programs = \App\Models\Program::whereIn('slug', $programSlugs)
            ->with(['schedules' => function ($query) {
                $query->orderBy('date', 'asc')->orderBy('start_time', 'asc');
            }])
            ->get();

        $programIds = $programs->pluck('id')->toArray();

        $allSchedules = \App\Models\Schedule::whereIn('program_id', $programIds)
            ->with('program')
            ->orderBy('date', 'asc')
            ->orderBy('start_time', 'asc')
            ->get();

        return view('dashboard.schedules', compact('user', 'enrollments', 'programs', 'allSchedules'));
    }
}
