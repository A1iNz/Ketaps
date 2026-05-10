<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Perusahaan;
use App\Models\Lpk;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // 1. Validasi Input Dasar
        $request->validate([
            'role' => 'required|in:siswa,perusahaan,lpk',
            'password' => 'required|min:8',
        ]);

        $role = strtoupper($request->role);
        $status = ($role === 'PERUSAHAAN') ? 'PENDING' : 'APPROVED';

        // Menggunakan DB Transaction agar jika terjadi error, data tidak tersimpan setengah-setengah
        DB::beginTransaction();

        try {
            // 2. Olah Data Berdasarkan Role
            if ($role === 'SISWA') {
                $request->validate([
                    'fullname' => 'required|string|max:255',
                    'email' => 'required|email|unique:users,email',
                    'sekolah' => 'required',
                    'jurusan' => 'required'
                ]);
                
                // Simpan ke tabel users
                $user = User::create([
                    'name' => $request->fullname,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'role' => $role,
                    'status' => $status,
                    'sekolah' => $request->sekolah,
                    'jurusan' => $request->jurusan,
                    'match_score' => 0,
                    'xp' => 0,
                ]);
            } 
            elseif ($role === 'PERUSAHAAN') {
                $request->validate([
                    'company_type' => 'required',
                    'company_name' => 'required',
                    'company_email' => 'required|email|unique:users,email',
                    'company_sector' => 'required'
                ]);

                // Gabungkan PT/CV dengan Nama untuk ditampilkan di tabel Users
                $fullNameCompany = $request->company_type . ' ' . $request->company_name;

                // Simpan akun utama ke tabel users
                $user = User::create([
                    'name' => $fullNameCompany, 
                    'email' => $request->company_email,
                    'password' => Hash::make($request->password),
                    'role' => $role,
                    'status' => $status,
                    'match_score' => 0,
                    'xp' => 0,
                ]);

                // Simpan profil detailnya ke tabel perusahaan
                Perusahaan::create([
                    'user_id' => $user->id,
                    'jenis_perusahaan' => $request->company_type,
                    'nama_perusahaan' => $request->company_name,
                    'bidang_industri' => $request->company_sector,
                ]);
            } 
            elseif ($role === 'LPK') {
                $request->validate([
                    'lpk_name' => 'required',
                    'lpk_email' => 'required|email|unique:users,email'
                ]);

                // Simpan akun utama ke tabel users
                $user = User::create([
                    'name' => $request->lpk_name,
                    'email' => $request->lpk_email,
                    'password' => Hash::make($request->password),
                    'role' => $role,
                    'status' => $status,
                    'match_score' => 0,
                    'xp' => 0,
                ]);

                // Simpan detail lembaga ke tabel LPK
                Lpk::create([
                    'user_id' => $user->id,
                    'nama_lembaga' => $request->lpk_name,
                ]);
            }

            // Jika semua query berhasil, Commit (simpan permanen) ke Database
            DB::commit();

            // 3. Pembelokan Arah (Redirect) Setelah Daftar
            if ($status === 'PENDING') {
                // Perusahaan butuh verifikasi
                return redirect()->route('login')->with('success', 'Pendaftaran berhasil! Akun Perusahaan Anda sedang ditinjau oleh Administrator.');
            }

            // Siswa & LPK langsung login
            Auth::login($user);
            return redirect()->route('dashboard.index');

        } catch (\Exception $e) {
            // Jika ada yang error/gagal (misal kolom database belum dibuat), batalkan semua inputan
            DB::rollback();
            return back()->withInput()->withErrors(['error' => 'Terjadi kesalahan sistem: ' . $e->getMessage()]);
        }
    }
}