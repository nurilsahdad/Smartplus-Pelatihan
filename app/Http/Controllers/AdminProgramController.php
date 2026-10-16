<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminProgramController extends Controller
{
    public function index(Request $request)
    {
        $query = Program::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('category', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $programs = $query->latest()->paginate(10)->withQueryString();

        return view('admin.programs.index', compact('programs'));
    }

    public function create()
    {
        return view('admin.programs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:2048',
            'description' => 'nullable|string',
            'price' => 'nullable|string|max:255',
            'duration' => 'nullable|string|max:255',
            'level' => 'nullable|string|max:255',
            'badge' => 'nullable|string|max:255',
            'status' => 'required|in:Aktif,Nonaktif',
        ]);

        $validated['slug'] = Str::slug($validated['name']);
        $validated['category'] = 'Pelatihan';

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/programs'), $filename);
            $validated['image'] = 'images/programs/' . $filename;
        }

        Program::create($validated);

        return redirect()->route('admin.programs.index')
            ->with('success', 'Program pelatihan baru berhasil ditambahkan.');
    }

    public function edit(Program $program)
    {
        return view('admin.programs.edit', compact('program'));
    }

    public function update(Request $request, Program $program)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:2048',
            'description' => 'nullable|string',
            'price' => 'nullable|string|max:255',
            'duration' => 'nullable|string|max:255',
            'level' => 'nullable|string|max:255',
            'badge' => 'nullable|string|max:255',
            'status' => 'required|in:Aktif,Nonaktif',
        ]);

        if (empty($program->slug)) {
            $validated['slug'] = Str::slug($validated['name']);
        }
        
        if ($request->hasFile('image')) {
            // Delete old file if exists in public/images/programs
            if ($program->image && file_exists(public_path($program->image))) {
                @unlink(public_path($program->image));
            }

            $file = $request->file('image');
            $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/programs'), $filename);
            $validated['image'] = 'images/programs/' . $filename;
        }

        $program->update($validated);

        return redirect()->route('admin.programs.index')
            ->with('success', 'Data program pelatihan berhasil diperbarui.');
    }

    public function destroy(Program $program)
    {
        $program->delete();

        return redirect()->route('admin.programs.index')
            ->with('success', 'Program pelatihan berhasil dihapus.');
    }
}
