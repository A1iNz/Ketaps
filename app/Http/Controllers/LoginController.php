<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    /**
     * Menampilkan halaman Login
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * Memproses aksi Login
     */
    public function login(Request $request)
    {
        // 1. LOGIKA GUEST LOGIN (Masuk sebagai Tamu)
        if ($request->form_type === 'guest') {
            $guestUser = User::firstOrCreate(
                ['email' => 'guest@siaplulus.com'],
                [
                    'name' => 'Tamu Terhormat',
                    'password' => bcrypt('password_tamu_rahasia'),
                    'role' => 'GUEST',
                    'status' => 'APPROVED',
                    'match_score' => 0,
                    'xp' => 0
                ]
            );

            Auth::login($guestUser);
            $request->session()->regenerate();
            return redirect()->route('dashboard.index');
        }

        // 2. LOGIKA LOGIN BIASA (Siswa/Perusahaan/LPK & Admin)
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required'
        ]);

        $requestedRole = strtoupper($request->role);
        $user = User::where('email', $request->email)->first();

        // Validasi Role: Tolak jika role tidak cocok, KECUALI dia adalah ADMIN
        if ($user && $user->role !== 'ADMIN' && $user->role !== $requestedRole) {
            return back()->withInput()->withErrors(['email' => "Akun ini terdaftar sebagai {$user->role}, bukan {$requestedRole}."]);
        }

        // Tambahan Keamanan: Cegah Perusahaan yang masih PENDING untuk login
        if ($user && $user->role === 'PERUSAHAAN' && $user->status === 'PENDING') {
            return back()->withInput()->withErrors(['email' => 'Akun Perusahaan Anda sedang menunggu verifikasi admin (1-2 hari kerja).']);
        }

        // Coba Proses Login
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();

            // Jika yang login adalah ADMIN, arahkan ke halaman khusus Admin
            if (Auth::user()->role === 'ADMIN') {
                return redirect()->route('admin.dashboard');
            }
            
            if (Auth::user()->role === 'PERUSAHAAN') {
                return redirect()->route('company.dashboard');
            }

            // Jika user biasa, masuk ke dashboard utama
            return redirect()->route('dashboard.index');
        }

        // Jika Email/Password salah
        return back()->withInput()->withErrors(['email' => 'Email atau kata sandi salah.']);
    }

    /**
     * Memproses Logout
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('login');
    }
}