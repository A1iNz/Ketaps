<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Sector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    /**
     * 1. Menampilkan Halaman Dashboard & Daftar Lowongan
     */
    public function index()
    {
        // Ambil data lowongan khusus milik perusahaan yang sedang login
        $jobs = Job::where('user_id', Auth::id())->latest()->get();
        
        // Ambil data sektor industri untuk dropdown di modal form
        $sectors = Sector::orderBy('nama_sektor', 'asc')->get();
        
        return view('company.index', compact('jobs', 'sectors'));
    }

    /**
     * 2. Menyimpan Lowongan Kerja Baru
     */
    public function store(Request $request)
    {
        // Validasi input dari modal
        $request->validate([
            'title'       => 'required|string|max:255',
            'location'    => 'required|string|max:255',
            'type'        => 'required|string',
            'sector_id'   => 'required|exists:sectors,id',
            'description' => 'required|string',
            'salary'      => 'nullable|string|max:255'
        ]);

        // Simpan ke database
        Job::create([
            'user_id'      => Auth::id(),
            'title'        => $request->title,
            'company_name' => Auth::user()->name, // Ambil nama perusahaan dari akun yang login
            'location'     => $request->location,
            'type'         => $request->type,
            'sector_id'    => $request->sector_id,
            'description'  => $request->description,
            'salary'       => $request->salary,
            'status'       => 'PENDING' // Default PENDING agar diverifikasi Admin dulu
        ]);

        return back()->with('success', 'Lowongan berhasil dibuat dan sedang dalam antrean persetujuan Admin.');
    }

    /**
     * 3. Mengupdate/Mengedit Lowongan Kerja
     */
    public function update(Request $request, $id)
    {
        // Cari loker berdasarkan ID, dan pastikan itu milik user yang sedang login (Keamanan)
        $job = Job::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        // Validasi input
        $request->validate([
            'title'       => 'required|string|max:255',
            'location'    => 'required|string|max:255',
            'type'        => 'required|string',
            'sector_id'   => 'required|exists:sectors,id',
            'description' => 'required|string',
            'salary'      => 'nullable|string|max:255'
        ]);

        // Update data
        $job->update([
            'title'       => $request->title,
            'location'    => $request->location,
            'type'        => $request->type,
            'sector_id'   => $request->sector_id,
            'description' => $request->description,
            'salary'      => $request->salary,
            // Catatan: Status tidak diubah menjadi PENDING lagi di sini agar perusahaan 
            // tidak perlu menunggu verifikasi ulang hanya karena typo. 
            // Ubah jika aturan bisnismu mengharuskan verifikasi ulang.
        ]);

        return back()->with('success', 'Detail lowongan berhasil diperbarui.');
    }

    /**
     * 4. Menghapus Lowongan Kerja
     */
    public function destroy($id)
    {
        // Cari loker dan pastikan milik user yang login
        $job = Job::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $job->delete();

        return back()->with('success', 'Lowongan kerja berhasil dihapus.');
    }

    /**
     * 5. Menampilkan Halaman Daftar Pelamar (Placeholder)
     */
    public function applicants()
    {
        // Nantinya query untuk mengambil pelamar bisa diletakkan di sini.
        // Contoh konsep: Ambil pelamar yang melamar ke Job milik Auth::id()
        
        return view('company.applicants');
    }

    /**
     * 6. Menampilkan Halaman Profil Perusahaan
     */
    public function profile()
    {
        // Ambil data user yang sedang login untuk ditampilkan di form profil
        $user = Auth::user();
        
        return view('company.profile', compact('user'));
    }
}