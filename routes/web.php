<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SocialAuthController;
use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfilController;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::middleware('guest')->group(function () {
    Route::get('/auth/google/pilih-role', [GoogleAuthController::class, 'showRoleSelection'])->name('google.role-selection');
    Route::get('/auth/google/redirect/{role}', [GoogleAuthController::class, 'redirect'])->name('google.redirect');
    Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback']);
    
    Route::get('/login', [LoginController::class, 'showLogin'])->name('showLogin');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});

Route::middleware('auth')->group(function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout.get');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/dashboard/cari-kerja', [DashboardController::class, 'cariKerja'])->name('dashboard.cari-kerja');
    Route::get('/dashboard/lms', [DashboardController::class, 'lms'])->name('dashboard.lms');
    Route::get('/dashboard/lamaran', [DashboardController::class, 'lamaran'])->name('dashboard.lamaran');
    Route::get('/dashboard/profil', [DashboardController::class, 'profil'])->name('dashboard.profil');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::patch('/profile/update-modal', [ProfilController::class, 'update'])->name('profile.update.modal');
});

Route::middleware(['auth', 'check.role'])->group(function () {
    Route::get('/lamaran', function () {
        return view('lamaran');
    })->name('lamaran');
    Route::get('/cari-kerja', function () {
        return view('cari-kerja');
    })->name('cari-kerja');
    Route::get('/lms', function () {
        return view('lms');
    })->name('lms');
    Route::get('/perusahaan', function () {
        return view('perusahaan');
    })->name('perusahaan');
    Route::get('/profil', function () {
        return view('profil');
    })->name('profil');
});

require __DIR__ . '/auth.php';
