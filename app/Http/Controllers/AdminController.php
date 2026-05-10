<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Job;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $totalSiswa = User::where('role', 'SISWA')->count();
        $totalPerusahaan = User::where('role', 'PERUSAHAAN')->count();
        $totalLpk = User::where('role', 'LPK')->count();

        $lowonganAktif = Job::where('status', 'APPROVED')->count();

        $totalMateri = 14;

        $pendingCompanies = User::where('role', 'PERUSAHAAN')->where('status', 'PENDING')->get();

        $usersTerbaru = User::orderBy('created_at', 'desc')->limit(10)->get();

        return view('admin.index', compact(
            'totalSiswa',
            'totalPerusahaan',
            'totalLpk',
            'lowonganAktif',
            'totalMateri',
            'pendingCompanies',
            'usersTerbaru'
        ));
    }

    public function approve($id)
    {
        $user = User::findOrFail($id);
        $user->update(['status' => 'APPROVED']);

        \App\Models\ActivityLog::create([
            'admin_name' => auth()->user()->name,
            'aksi' => 'Menyetujui pendaftaran Perusahaan : ' . $user->nama_perusahaan
        ]);

        return back()->with('success', "Akun {$user->name} berhasil diverifikasi!");
    }

    public function users(Request $request)
    {
        $users = User::when($request->search, function ($query) use ($request) {
            $query->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%');
        })->orderBy('created_at', 'desc')->get();

        $siswa = $users->where('role', 'SISWA');
        $perusahaan = $users->where('role', 'PERUSAHAAN');
        $lpk = $users->where('role', 'LPK');
        $admin = $users->where('role', 'ADMIN');

        return view('admin.users', compact('siswa', 'perusahaan', 'lpk', 'admin'));
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|in:SISWA,PERUSAHAAN,LPK,ADMIN',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ]);

        \App\Models\ActivityLog::create([
            'admin_name' => auth()->user()->name,
            'aksi' => 'Menyetujui Update User: ' . $user->name
        ]);

        return back()->with('success', "Data {$user->name} berhasil diperbarui!");
    }

    public function jobVerification()
    {
        $jobs = Job::with('user')->where('status', 'PENDING')->orderBy('created_at', 'desc')->get();
        return view('admin.jobs-verification', compact('jobs'));
    }

    public function approveJob($id)
    {
        $job = Job::findOrFail($id);
        $job->update(['status' => 'APPROVED']);

        \App\Models\ActivityLog::create([
            'admin_name' => auth()->user()->name,
            'aksi' => 'Menyetujui Pekerjaan : ' . $job->title,
        ]);

        return back()->with('success', "Lowongan '{$job->title}' berhasil diverifikasi dan ditayangkan.");
    }

    public function destroyUser($id)
    {
        $user = User::findOrFail($id);

        if ($user->role === 'ADMIN') {
            return back()->with('error', 'Tindakan ditolak! Anda tidak dapat menghapus akun Administrator.');
        }
        \App\Models\ActivityLog::create([
            'admin_name' => auth()->user()->name,
            'aksi' => 'Menghapus User: ' . $user->name
        ]);

        $user->delete();

        return back()->with('success', 'Akun pengguna berhasil dihapus dari sistem.');
    }
}