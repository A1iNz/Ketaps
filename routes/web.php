<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SocialAuthController;
use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\SectorController;
use App\Http\Controllers\CompanyController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('index');
})->name('index');

/*
|--------------------------------------------------------------------------
| Admin Routes (Dengan Middleware & Prefix)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    
    // Dashboard & Approval Perusahaan
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::post('/approve/{id}', [AdminController::class, 'approve'])->name('approve');

    // Manajemen Pengguna (CRUD)
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::put('/users/{id}', [AdminController::class, 'updateUser'])->name('users.update');
    Route::delete('/users/{id}', [AdminController::class, 'destroyUser'])->name('users.destroy');
    Route::get('/users/{id}/edit', [AdminController::class, 'editUser'])->name('users.edit');

    // Verifikasi Lowongan Kerja
    Route::get('/jobs/verification', [AdminController::class, 'jobVerification'])->name('jobs.index');
    Route::post('/jobs/approve/{id}', [AdminController::class, 'approveJob'])->name('jobs.approve');

    // Manajemen Materi Vokasi (LMS)
    Route::get('/materi', [MateriController::class, 'index'])->name('materi.index');
    Route::post('/materi', [MateriController::class, 'store'])->name('materi.store');
    Route::delete('/materi/{id}', [MateriController::class, 'destroy'])->name('materi.destroy');
    
    // Perusahaan Pending & Sektor Industri
    Route::get('/perusahaan/pending', [AdminController::class, 'index'])->name('perusahaan.pending');
    
    // --- MANAJEMEN SEKTOR INDUSTRI ---
    Route::get('/sectors', [SectorController::class, 'index'])->name('sectors.index');
    Route::post('/sectors', [SectorController::class, 'store'])->name('sectors.store');
    Route::delete('/sectors/{id}', [SectorController::class, 'destroy'])->name('sectors.destroy');

    // Audit Log Aktivitas
    Route::get('/logs', function() {
        $logs = \App\Models\ActivityLog::latest()->get();
        return view('admin.logs', compact('logs'));
    })->name('logs');
});

/*
|--------------------------------------------------------------------------
| Routes Khusus Perusahaan (Mitra Industri)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->prefix('company')->name('company.')->group(function () {
    
    // Halaman Dashboard Utama (Daftar Lowongan)
    Route::get('/dashboard', [CompanyController::class, 'index'])->name('dashboard');
    
    // Proses CRUD Lowongan Pekerjaan
    Route::post('/jobs', [CompanyController::class, 'store'])->name('jobs.store');
    Route::put('/jobs/{id}', [CompanyController::class, 'update'])->name('jobs.update');
    Route::delete('/jobs/{id}', [CompanyController::class, 'destroy'])->name('jobs.destroy');

    // Halaman Sidebar Lainnya
    Route::get('/applicants', [CompanyController::class, 'applicants'])->name('applicants');
    Route::get('/profile', [CompanyController::class, 'profile'])->name('profile');
    
});

/*
|--------------------------------------------------------------------------
| Authentication Routes (Guest)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    // Google Auth
    Route::get('/auth/google/pilih-role', [GoogleAuthController::class, 'showRoleSelection'])->name('google.role-selection');
    Route::get('/auth/google/redirect/{role}', [GoogleAuthController::class, 'redirect'])->name('google.redirect');
    Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback']);

    // Manual Login & Register
    Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
    Route::get('/register', [RegisterController::class, 'showRegister'])->name('register');
    Route::post('/login', [LoginController::class, 'login'])->name('login.post');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.post');
});

/*
|--------------------------------------------------------------------------
| Authenticated User Routes (Siswa/Alumni/Perusahaan)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    // Session Management
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout.get');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // Dashboard General
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/dashboard/cari-kerja', [DashboardController::class, 'cariKerja'])->name('dashboard.cari-kerja');
    Route::get('/dashboard/lms', [DashboardController::class, 'lms'])->name('dashboard.lms');
    Route::get('/dashboard/lamaran', [DashboardController::class, 'lamaran'])->name('dashboard.lamaran');
    Route::get('/dashboard/profil', [DashboardController::class, 'profil'])->name('dashboard.profil');

    // Profile Management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::patch('/profile/update-modal', [ProfilController::class, 'update'])->name('profile.update.modal');
});

/*
|--------------------------------------------------------------------------
| Role Specific Content (Siswa Focus)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'check.role'])->group(function () {
    Route::get('/lamaran', function () { return view('lamaran'); })->name('lamaran');
    Route::get('/cari-kerja', function () { return view('cari-kerja'); })->name('cari-kerja');
    Route::get('/lms', function () { return view('lms'); })->name('lms');
    Route::get('/perusahaan', function () { return view('perusahaan'); })->name('perusahaan');
    Route::get('/profil', function () { return view('profil'); })->name('profil');
});

require __DIR__ . '/auth.php';