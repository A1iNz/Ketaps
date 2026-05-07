<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // Halaman Cari Kerja (Index)
    public function index() 
    {
        $user = Auth::user();
        return view('dashboard.cari-kerja', [
            'user' => $user,
            'active_page' => 'kerja' // Penanda halaman aktif
        ]);
    }

    // Halaman LMS Belajar
    public function lms() 
    {
        $user = Auth::user();
        return view('dashboard.lms_belajar', [
            'user' => $user,
            'active_page' => 'lms'
        ]);
    }

    // Halaman Status Lamaran
    public function lamaran() 
    {
        $user = Auth::user();
        return view('dashboard.lamaranku', [
            'user' => $user,
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

    public function cariKerja() 
    {
        $user = Auth::user();
        return view('dashboard.cari-kerja', [
            'user' => $user,
            'active_page' => 'kerja'
        ]);
    }
}