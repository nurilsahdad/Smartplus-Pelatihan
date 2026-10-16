<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Syllabus;
use Illuminate\Http\Request;

class AdminSyllabusController extends Controller
{
    public function main(Request $request)
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

        $syllabuses = $program->syllabuses()->get();

        return view('admin.programs.syllabuses.index', compact('program', 'syllabuses', 'programs'));
    }

    public function index(Program $program)
    {
        $programs = Program::orderBy('name')->get();
        $syllabuses = $program->syllabuses()->get();
        return view('admin.programs.syllabuses.index', compact('program', 'syllabuses', 'programs'));
    }

    public function store(Request $request, Program $program)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'topics' => 'nullable|string',
            'sort_order' => 'nullable|integer',
        ]);

        if (!isset($validated['sort_order']) || $validated['sort_order'] === null) {
            $maxOrder = $program->syllabuses()->max('sort_order') ?? 0;
            $validated['sort_order'] = $maxOrder + 1;
        }

        $program->syllabuses()->create($validated);

        return redirect()->route('admin.programs.syllabuses.index', $program->id)
            ->with('success', 'Modul silabus baru berhasil ditambahkan.');
    }

    public function update(Request $request, Syllabus $syllabus)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'topics' => 'nullable|string',
            'sort_order' => 'nullable|integer',
        ]);

        $syllabus->update($validated);

        return redirect()->route('admin.programs.syllabuses.index', $syllabus->program_id)
            ->with('success', 'Modul silabus berhasil diperbarui.');
    }

    public function destroy(Syllabus $syllabus)
    {
        $programId = $syllabus->program_id;
        $syllabus->delete();

        return redirect()->route('admin.programs.syllabuses.index', $programId)
            ->with('success', 'Modul silabus berhasil dihapus.');
    }
}
