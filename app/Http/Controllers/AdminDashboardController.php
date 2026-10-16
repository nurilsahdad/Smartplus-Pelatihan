<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Enrollment;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    /**
     * Display the Admin Dashboard Overview.
     */
    public function index()
    {
        $totalUsers = User::where('role', 'user')->count();
        $totalEnrollments = Enrollment::count();
        $activeEnrollments = Enrollment::where('status', 'Aktif')->count();
        $completedEnrollments = Enrollment::where('status', 'Selesai')->count();

        $recentEnrollments = Enrollment::with('user')
            ->latest()
            ->take(10)
            ->get();

        $recentUsers = User::where('role', 'user')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalEnrollments',
            'activeEnrollments',
            'completedEnrollments',
            'recentEnrollments',
            'recentUsers'
        ));
    }

    /**
     * Display all enrollments list for Admin.
     */
    public function enrollments(Request $request)
    {
        $query = Enrollment::with(['user', 'certificate'])->latest();

        if ($request->has('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('program_name', 'like', "%{$search}%")
                  ->orWhereHas('user', function ($u) use ($search) {
                      $u->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%");
                  });
            });
        }

        $enrollments = $query->get();

        return view('admin.enrollments', compact('enrollments'));
    }

    /**
     * Update an enrollment's status.
     */
    public function updateEnrollmentStatus(Request $request, Enrollment $enrollment)
    {
        $request->validate([
            'status' => 'required|in:Aktif,Selesai,Dibatalkan',
        ]);

        $enrollment->update([
            'status' => $request->status,
        ]);

        return back()->with('success', 'Status pendaftaran berhasil diperbarui menjadi ' . $request->status . '.');
    }

    /**
     * Delete an enrollment record.
     */
    public function deleteEnrollment(Enrollment $enrollment)
    {
        $enrollment->delete();
        return back()->with('success', 'Data pendaftaran berhasil dihapus.');
    }

    /**
     * Display all registered users list for Admin.
     */
    public function users(Request $request)
    {
        $query = User::withCount('enrollments')->latest();

        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%");
            });
        }

        $users = $query->get();

        return view('admin.users', compact('users'));
    }
}
