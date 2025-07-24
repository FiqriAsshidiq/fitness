<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LatihanController;
use App\Http\Controllers\RekomendasiController;
use App\Http\Controllers\RuleController;
use App\Http\Controllers\KonsultasiController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HasilRekomendasiController;
use App\Http\Controllers\KondisiTubuhController;
use App\Http\Controllers\PanduanGerakanController;
use App\Http\Controllers\PanduanNutrisiController;
use App\Http\Controllers\AktivitasFisikController;
use App\Http\Controllers\SaranController;



Route::get('/', function () {
    return view('home'); 
});

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Semua route dengan proteksi auth
Route::middleware('auth')->group(function () {

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // User (Admin)
    Route::get('/user', [UserController::class, 'index'])->name('admin.user');
    Route::get('/user/create', [UserController::class, 'create'])->name('admin.user.create');
    Route::post('/user', [UserController::class, 'store'])->name('admin.user.store');
    Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('admin.user.edit');
    Route::put('/user/{id}', [UserController::class, 'update'])->name('admin.user.update');
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('admin.user.destroy');

    // Saran (Admin)
    Route::get('/admin/saran', [SaranController::class, 'index'])->middleware('auth')->name('admin.saran.index');

    // Saran (User)
    Route::get('/saran', [SaranController::class, 'create'])->name('member.saran.create');
    Route::post('/saran', [SaranController::class, 'store'])->name('member.saran.store');



    // kondisi (Admin)
    Route::get('/kondisi_tubuh', [KondisiTubuhController::class, 'index'])->name('admin.kondisi_tubuh');
    Route::get('/kondisi_tubuh/create', [KondisiTubuhController::class, 'create'])->name('admin.kondisi_tubuh.create');
    Route::post('/kondisi_tubuh', [KondisiTubuhController::class, 'store'])->name('admin.kondisi_tubuh.store');
    Route::get('/kondisi_tubuh/{id}/edit', [KondisiTubuhController::class, 'edit'])->name('admin.kondisi_tubuh.edit');
    Route::put('/kondisi_tubuh/{id}', [KondisiTubuhController::class, 'update'])->name('admin.kondisi_tubuh.update');
    Route::delete('/kondisi_tubuh/{id}', [KondisiTubuhController::class, 'destroy'])->name('admin.kondisi_tubuh.destroy');

    // gerakan (Admin)
    Route::get('/panduan', [PanduanGerakanController::class, 'index'])->name('admin.gerakan');
    Route::get('/panduan/create', [PanduanGerakanController::class, 'create'])->name('admin.gerakan.create');
    Route::post('/panduan', [PanduanGerakanController::class, 'store'])->name('admin.gerakan.store');
    Route::get('/panduan/{panduan_gerakan}/edit', [PanduanGerakanController::class, 'edit'])->name('admin.gerakan.edit');
    Route::put('/panduan/{panduan_gerakan}', [PanduanGerakanController::class, 'update'])->name('admin.gerakan.update');
    Route::delete('/panduan/{panduan_gerakan}', [PanduanGerakanController::class, 'destroy'])->name('admin.gerakan.destroy');

    // gerakan(member)
    Route::get('/member/gerakan', [PanduanGerakanController::class, 'showToMember'])->name('member.gerakan');


    // Rute Admin Panduan Nutrisi
    Route::get('/panduan-nutrisi', [PanduanNutrisiController::class, 'index'])->name('admin.nutrisi');
    Route::get('/panduan-nutrisi/create', [PanduanNutrisiController::class, 'create'])->name('admin.nutrisi.create');
    Route::post('/panduan-nutrisi', [PanduanNutrisiController::class, 'store'])->name('admin.nutrisi.store');
    Route::get('/panduan-nutrisi/{id}/edit', [PanduanNutrisiController::class, 'edit'])->name('admin.nutrisi.edit');
    Route::put('/panduan-nutrisi/{id}', [PanduanNutrisiController::class, 'update'])->name('admin.nutrisi.update');
    Route::delete('/panduan-nutrisi/{id}', [PanduanNutrisiController::class, 'destroy'])->name('admin.nutrisi.destroy');

    // nutrisi(member)
    Route::get('/member/nutrisi', [PanduanNutrisiController::class, 'showToMember'])->name('member.nutrisi');

    // Konsultasi (Member)

    Route::get('/konsultasi', [KonsultasiController::class, 'index'])->name('member.konsultasi');
    Route::post('/konsultasi/proses', [KonsultasiController::class, 'proses'])->name('member.konsultasi.proses');
    Route::get('/konsultasi/hasil/{id}', [KonsultasiController::class, 'hasil'])->name('member.konsultasi.hasil');
    Route::get('/hasil-saya', [HasilRekomendasiController::class, 'index'])->name('member.hasil.saya');



    // Latihan (admin)
    Route::get('/latihan', [LatihanController::class, 'index'])->name('admin.latihan');
    Route::get('/latihan/create', [LatihanController::class, 'create'])->name('admin.latihan.create');
    Route::post('/latihan', [LatihanController::class, 'store'])->name('admin.latihan.store');
    Route::get('/latihan/{id}/edit', [LatihanController::class, 'edit'])->name('admin.latihan.edit');
    Route::put('/latihan/{id}', [LatihanController::class, 'update'])->name('admin.latihan.update');
    Route::delete('/latihan/{id}', [LatihanController::class, 'destroy'])->name('admin.latihan.destroy');
    

    // Aktivitas Fisik (Admin)
    Route::get('/admin/aktivitasfisik', [AktivitasFisikController::class, 'index'])->name('admin.aktivitasfisik.index');
    Route::get('/admin/aktivitasfisik/create', [AktivitasFisikController::class, 'create'])->name('admin.aktivitasfisik.create');
    Route::post('/admin/aktivitasfisik', [AktivitasFisikController::class, 'store'])->name('admin.aktivitasfisik.store');
    Route::get('/admin/aktivitasfisik/{id}/edit', [AktivitasFisikController::class, 'edit'])->name('admin.aktivitasfisik.edit');
    Route::put('/admin/aktivitasfisik/{id}', [AktivitasFisikController::class, 'update'])->name('admin.aktivitasfisik.update');
    Route::delete('/admin/aktivitasfisik/{id}', [AktivitasFisikController::class, 'destroy'])->name('admin.aktivitasfisik.destroy');


    // Rekomendasi (admin)
    Route::get('/rekomendasi', [RekomendasiController::class, 'index'])->name('admin.rekomendasi');
    Route::get('/rekomendasi/create', [RekomendasiController::class, 'create'])->name('admin.rekomendasi.create');
    Route::post('/rekomendasi', [RekomendasiController::class, 'store'])->name('admin.rekomendasi.store');
    Route::get('/rekomendasi/{id}/edit', [RekomendasiController::class, 'edit'])->name('admin.rekomendasi.edit');
    Route::put('/rekomendasi/{id}', [RekomendasiController::class, 'update'])->name('admin.rekomendasi.update');
    Route::delete('/rekomendasi/{id}', [RekomendasiController::class, 'destroy'])->name('admin.rekomendasi.destroy');
            
    // Rule / Aturan (admin)
    Route::get('/rule', [RuleController::class, 'index'])->name('admin.rule');
    Route::get('/rule/create', [RuleController::class, 'create'])->name('admin.rule.create');
    Route::post('/rule', [RuleController::class, 'store'])->name('admin.rule.store');
    Route::get('/rule/{id}/edit', [RuleController::class, 'edit'])->name('admin.rule.edit');
    Route::put('/rule/{id}', [RuleController::class, 'update'])->name('admin.rule.update');
    Route::delete('/rule/{id}', [RuleController::class, 'destroy'])->name('admin.rule.destroy');
    
   
});

// Logout
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->name('logout');

// Auth scaffolding routes
require __DIR__.'/auth.php';
