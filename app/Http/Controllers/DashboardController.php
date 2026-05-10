<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Job;
use App\Models\Materi;
use App\Models\Sector;

class DashboardController extends Controller
{
    // Halaman Cari Kerja (Index)
    public function index(Request $request) 
    {
        $user = Auth::user();
        $sectors = \App\Models\Sector::orderBy('nama_sektor', 'asc')->get();

        // 2. Logika filter: Jika ada query 'sector' di URL, filter datanya
        $query = Job::with('sector')->where('status', 'APPROVED');

        if ($request->has('sector') && $request->sector != '') {
            $query->whereHas('sector', function ($q) use ($request) {
                $q->where('slug', $request->sector);
            });
        }

        // 3. Jalankan query
        $jobs = $query->latest()->get();
        
        
        return view('dashboard.cari-kerja', [
            'user' => $user,
            'jobs' => $jobs,
            'sectors' => $sectors,
            'active_page' => 'kerja' // Penanda halaman aktif
        ]);
    }

    // Halaman LMS Belajar
    public function lms() 
    {
        $user = Auth::user();
        $materis = Materi::latest()->get();
        return view('dashboard.lms_belajar', [
            'user' => $user,
            'materis' => $materis,
            'active_page' => 'lms'
        ]);
    }

    // Halaman Status Lamaran
    public function lamaran() 
    {
        $user = Auth::user();
        // $lamarans = Application::where('user_id', Auth::id())->latest()->get();
        
        $lamarans = []; // Kosongkan sementara sebelum tabel lamaran dibuat
        return view('dashboard.lamaranku', [
            'user' => $user,
            'lamarans' => $lamarans,
            'active_page' => 'lamaran'
        ]);
    }

    // Halaman Profil (Sekarang memanggil index agar tetap dalam satu layout)
    public function profil() 
    {
        $user = Auth::user();
        return view('dashboard.profil', [
            'user' => $user,
            'active_page' => 'profil'
        ]);
    }

    public function cariKerja(Request $request) 
    {
        $user = Auth::user();
        $sectors = \App\Models\Sector::orderBy('nama_sektor', 'asc')->get();

        // 2. Logika filter: Jika ada query 'sector' di URL, filter datanya
        $query = Job::with('sector')->where('status', 'APPROVED');

        if ($request->has('sector') && $request->sector != '') {
            $query->whereHas('sector', function ($q) use ($request) {
                $q->where('slug', $request->sector);
            });
        }

        // 3. Jalankan query
        $jobs = $query->latest()->get();
        
        return view('dashboard.cari-kerja', [
            'user' => $user,
            'jobs' => $jobs,
            'sectors' => $sectors,
            'active_page' => 'kerja'
        ]);
    }
}