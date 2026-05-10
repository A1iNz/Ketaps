<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    // Form tambah loker
    public function create() {
        return view('perusahaan.jobs.create');
    }

    // Simpan ke database
    public function store(Request $request) {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'location' => 'required',
            'type' => 'required',
        ]);

        Job::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'company_name' => Auth::user()->name,
            'description' => $request->description,
            'location' => $request->location,
            'type' => $request->type,
            'status' => 'PENDING', // Harus disetujui admin dulu
        ]);

        return redirect()->route('perusahaan.dashboard')->with('success', 'Loker berhasil dikirim dan menunggu verifikasi admin.');
    }
}