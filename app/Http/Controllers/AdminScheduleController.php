<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Schedule;
use Illuminate\Http\Request;

class AdminScheduleController extends Controller
{
    public function index(Request $request)
    {
        $programs = Program::orderBy('name')->get();

        if ($programs->isEmpty()) {
            return redirect()->route('admin.programs.index')
                ->with('error', 'Belum ada program pelatihan. Silakan buat program terlebih dahulu.');
        }

        $programId = $request->query('program_id');
        $program = $programId ? Program::find($programId) : $programs->first();

        if (!$program) {
            $program = $programs->first();
        }

        $schedules = $program ? $program->schedules()->orderBy('date', 'asc')->orderBy('start_time', 'asc')->get() : collect();

        return view('admin.schedules.index', compact('programs', 'program', 'schedules'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'program_id' => 'required|exists:programs,id',
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
            'location' => 'required|string|max:255',
            'speaker' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:mendatang,berlangsung,selesai',
        ]);

        Schedule::create($validated);

        return redirect()->route('admin.schedules.index', ['program_id' => $request->program_id])
            ->with('success', 'Jadwal pelatihan baru berhasil ditambahkan.');
    }

    public function update(Request $request, Schedule $schedule)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
            'location' => 'required|string|max:255',
            'speaker' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:mendatang,berlangsung,selesai',
        ]);

        $schedule->update($validated);

        return redirect()->route('admin.schedules.index', ['program_id' => $schedule->program_id])
            ->with('success', 'Jadwal pelatihan berhasil diperbarui.');
    }

    public function destroy(Schedule $schedule)
    {
        $programId = $schedule->program_id;
        $schedule->delete();

        return redirect()->route('admin.schedules.index', ['program_id' => $programId])
            ->with('success', 'Jadwal pelatihan berhasil dihapus.');
    }
}
