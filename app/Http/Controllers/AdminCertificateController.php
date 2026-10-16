<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Enrollment;
use App\Models\Program;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminCertificateController extends Controller
{
    /**
     * Display a listing of all certificates.
     */
    public function index(Request $request)
    {
        $query = Certificate::with(['user', 'enrollment'])->latest('issue_date');

        if ($request->filled('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('certificate_number', 'like', "%{$search}%")
                  ->orWhere('program_name', 'like', "%{$search}%")
                  ->orWhere('verification_code', 'like', "%{$search}%")
                  ->orWhereHas('user', function ($u) use ($search) {
                      $u->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%");
                  });
            });
        }

        $certificates = $query->paginate(15)->withQueryString();

        $stats = [
            'total' => Certificate::count(),
            'active' => Certificate::where('status', 'Aktif')->count(),
            'revoked' => Certificate::where('status', 'Dicabut')->count(),
        ];

        return view('admin.certificates.index', compact('certificates', 'stats'));
    }

    /**
     * Show the form for creating a new certificate.
     */
    public function create(Request $request)
    {
        $selectedEnrollment = null;
        if ($request->filled('enrollment_id')) {
            $selectedEnrollment = Enrollment::with('user')->find($request->enrollment_id);
        }

        // Available enrollments for certificate issuance
        $enrollments = Enrollment::with('user')
            ->whereDoesntHave('certificate')
            ->latest()
            ->get();

        // If selectedEnrollment already has certificate or is provided, make sure it's in list if not already
        if ($selectedEnrollment && !$enrollments->contains('id', $selectedEnrollment->id)) {
            $enrollments->prepend($selectedEnrollment);
        }

        $users = User::where('role', 'user')->orderBy('name')->get();

        return view('admin.certificates.create', compact(
            'selectedEnrollment',
            'enrollments',
            'users'
        ));
    }

    /**
     * Store a newly created certificate in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'certificate_file' => 'required|file|mimes:pdf,jpg,jpeg,png,webp|max:10240',
            'enrollment_id' => 'required',
        ], [
            'enrollment_id.required' => 'Silakan pilih peserta yang akan diterbitkan sertifikatnya.',
            'certificate_file.required' => 'Silakan unggah gambar sertifikat.',
        ]);

        $selectedParticipant = $request->input('enrollment_id');
        $userId = null;
        $enrollmentId = null;
        $programName = 'Pelatihan Sertifikasi';
        $programSlug = null;

        if (str_starts_with($selectedParticipant, 'user_')) {
            $userId = (int) str_replace('user_', '', $selectedParticipant);
        } else {
            $enrollment = Enrollment::with('user')->find($selectedParticipant);
            if ($enrollment) {
                $enrollmentId = $enrollment->id;
                $userId = $enrollment->user_id;
                $programName = $enrollment->program_name;
                $programSlug = $enrollment->program_slug;
                $enrollment->update(['status' => 'Selesai']);
            }
        }

        if (!$userId) {
            return back()->withInput()->withErrors(['enrollment_id' => 'Peserta yang dipilih tidak valid.']);
        }

        // Simpan file sertifikat (gambar / pdf) yang diupload admin
        $file = $request->file('certificate_file');
        $filename = 'cert_' . time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/certificates'), $filename);
        $filePath = 'uploads/certificates/' . $filename;

        // Semua data teknis digenerate otomatis 100% di latar belakang oleh sistem
        $certificate = Certificate::create([
            'user_id' => $userId,
            'enrollment_id' => $enrollmentId,
            'program_name' => $programName,
            'program_slug' => $programSlug,
            'certificate_number' => Certificate::generateCertificateNumber(),
            'verification_code' => Certificate::generateVerificationCode(),
            'issue_date' => date('Y-m-d'),
            'predicate' => 'Kompeten / Sangat Memuaskan',
            'signed_by' => 'Direktur CV. SMARTPLUS INDONESIA',
            'status' => 'Aktif',
            'file_path' => $filePath,
        ]);

        return redirect()->route('admin.certificates.index')
            ->with('success', 'Sertifikat untuk ' . ($certificate->user->name ?? 'Peserta') . ' berhasil diunggah dan diterbitkan.');
    }

    /**
     * Show the form for editing the specified certificate.
     */
    public function edit(Certificate $certificate)
    {
        $certificate->load(['user', 'enrollment']);
        return view('admin.certificates.edit', compact('certificate'));
    }

    /**
     * Update the specified certificate in storage.
     */
    public function update(Request $request, Certificate $certificate)
    {
        $validated = $request->validate([
            'status' => 'nullable|in:Aktif,Dicabut',
            'certificate_file' => 'nullable|file|mimes:pdf,jpg,jpeg,png,webp|max:10240',
        ]);

        if (!empty($validated['status'])) {
            $certificate->status = $validated['status'];
        }

        // Handle file replacement if new file is uploaded
        if ($request->hasFile('certificate_file')) {
            if ($certificate->file_path && file_exists(public_path($certificate->file_path))) {
                @unlink(public_path($certificate->file_path));
            }

            $file = $request->file('certificate_file');
            $filename = 'cert_' . time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/certificates'), $filename);
            $certificate->file_path = 'uploads/certificates/' . $filename;
        }

        $certificate->save();

        return redirect()->route('admin.certificates.index')
            ->with('success', 'Data sertifikat ' . $certificate->certificate_number . ' berhasil diperbarui.');
    }

    /**
     * Remove the specified certificate from storage.
     */
    public function destroy(Certificate $certificate)
    {
        $number = $certificate->certificate_number;

        if ($certificate->file_path && file_exists(public_path($certificate->file_path))) {
            @unlink(public_path($certificate->file_path));
        }

        $certificate->delete();

        return redirect()->route('admin.certificates.index')
            ->with('success', 'Sertifikat ' . $number . ' berhasil dihapus.');
    }

    /**
     * Toggle certificate status (Aktif <-> Dicabut).
     */
    public function toggleStatus(Certificate $certificate)
    {
        $newStatus = $certificate->status === 'Aktif' ? 'Dicabut' : 'Aktif';
        $certificate->update(['status' => $newStatus]);

        return back()->with('success', "Status sertifikat {$certificate->certificate_number} diubah menjadi {$newStatus}.");
    }
}
