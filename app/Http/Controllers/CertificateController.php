<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CertificateController extends Controller
{
    /**
     * Display list of certificates for the authenticated participant.
     */
    public function index()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $certificates = $user->certificates()->latest('issue_date')->get();

        return view('dashboard.certificates.index', compact('user', 'certificates'));
    }

    /**
     * Display a specific certificate for viewing and printing.
     */
    public function show($id)
    {
        $certificate = Certificate::with(['user', 'enrollment'])->findOrFail($id);

        // Security check: Only the owner or an admin can access private view
        if (Auth::user()->role !== 'admin' && Auth::id() !== $certificate->user_id) {
            abort(403, 'Anda tidak memiliki hak akses untuk melihat sertifikat ini.');
        }

        return view('dashboard.certificates.show', compact('certificate'));
    }
}
