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
use App\Http\Controllers\TargetOtotController;
use App\Http\Controllers\TingkatPengalamanController;
use App\Http\Controllers\TujuannController;




Route::get('/', function () {
    return view('home'); 
});

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/eror', [DashboardController::class, 'index'])->name('eror');

// Semua route dengan proteksi auth
Route::middleware('auth')->group(function () {

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // ================= ADMIN =================
    Route::middleware('admin')->group(function () {
            // admin
    // User (Admin)
    Route::get('/user', [UserController::class, 'index'])->name('admin.user');
    Route::put('/admin/user/reset-password/{id}', [UserController::class, 'resetPassword'])->name('admin.user.resetPassword');
    Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('admin.user.edit');
    Route::put('/user/{id}', [UserController::class, 'update'])->name('admin.user.update');
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('admin.user.destroy');

    // Saran (Admin)
    Route::get('/admin/saran', [SaranController::class, 'index'])->middleware('auth')->name('admin.saran.index');

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

    // Rute Admin Panduan Nutrisi
    Route::get('/panduan-nutrisi', [PanduanNutrisiController::class, 'index'])->name('admin.nutrisi');
    Route::get('/panduan-nutrisi/create', [PanduanNutrisiController::class, 'create'])->name('admin.nutrisi.create');
    Route::post('/panduan-nutrisi', [PanduanNutrisiController::class, 'store'])->name('admin.nutrisi.store');
    Route::get('/panduan-nutrisi/{id}/edit', [PanduanNutrisiController::class, 'edit'])->name('admin.nutrisi.edit');
    Route::put('/panduan-nutrisi/{id}', [PanduanNutrisiController::class, 'update'])->name('admin.nutrisi.update');
    Route::delete('/panduan-nutrisi/{id}', [PanduanNutrisiController::class, 'destroy'])->name('admin.nutrisi.destroy');

    // Latihan (admin)
    Route::get('/latihan', [LatihanController::class, 'index'])->name('admin.latihan');
    Route::get('/latihan/create', [LatihanController::class, 'create'])->name('admin.latihan.create');
    Route::post('/latihan', [LatihanController::class, 'store'])->name('admin.latihan.store');
    Route::get('/latihan/{id}/edit', [LatihanController::class, 'edit'])->name('admin.latihan.edit');
    Route::put('/latihan/{id}', [LatihanController::class, 'update'])->name('admin.latihan.update');
    Route::delete('/latihan/{id}', [LatihanController::class, 'destroy'])->name('admin.latihan.destroy');
 
    // Admin (Tujuan)

    Route::get('/tujuan', [TujuannController::class, 'index'])->name('admin.tujuan');
    Route::get('/tujuan/create', [TujuannController::class, 'create'])->name('admin.tujuan.create');
    Route::post('/tujuan', [TujuannController::class, 'store'])->name('admin.tujuan.store');
    Route::get('/tujuan/{id}/edit', [TujuannController::class, 'edit'])->name('admin.tujuan.edit');
    Route::put('/tujuan/{id}', [TujuannController::class, 'update'])->name('admin.tujuan.update');
    Route::delete('/tujuan/{id}', [TujuannController::class, 'destroy'])->name('admin.tujuan.destroy');

    //Admin (Pengalaman)
    Route::get('/pengalaman', [TingkatPengalamanController::class, 'index'])->name('admin.pengalaman');
    Route::get('/pengalaman/create', [TingkatPengalamanController::class, 'create'])->name('admin.pengalaman.create');
    Route::post('/pengalaman', [TingkatPengalamanController::class, 'store'])->name('admin.pengalaman.store');
    Route::get('/pengalaman/{id}/edit', [TingkatPengalamanController::class, 'edit'])->name('admin.pengalaman.edit');
    Route::put('/pengalaman/{id}', [TingkatPengalamanController::class, 'update'])->name('admin.pengalaman.update');
    Route::delete('/pengalaman/{id}', [TingkatPengalamanController::class, 'destroy'])->name('admin.pengalaman.destroy');

    // Target Otot (admin)
    Route::get('/otot', [TargetOtotController::class, 'index'])->name('admin.otot');
    Route::get('/otot/create', [TargetOtotController::class, 'create'])->name('admin.otot.create');
    Route::post('/otot', [TargetOtotController::class, 'store'])->name('admin.otot.store');
    Route::get('/otot/{id}/edit', [TargetOtotController::class, 'edit'])->name('admin.otot.edit');
    Route::put('/otot/{id}', [TargetOtotController::class, 'update'])->name('admin.otot.update');
    Route::delete('/otot/{id}', [TargetOtotController::class, 'destroy'])->name('admin.otot.destroy');
    

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


    
    Route::middleware('member')->group(function () {

            // member
            // nutrisi(member)
            Route::get('/member/nutrisi', [PanduanNutrisiController::class, 'showToMember'])->name('member.nutrisi');

            // gerakan(member)
            Route::get('/member/gerakan', [PanduanGerakanController::class, 'showToMember'])->name('member.gerakan');

            // Saran (User)
            Route::get('/saran', [SaranController::class, 'create'])->name('member.saran.create');
            Route::post('/saran', [SaranController::class, 'store'])->name('member.saran.store');


                // Konsultasi (Member)
            Route::get('/konsultasi', [KonsultasiController::class, 'index'])->name('member.konsultasi');
            Route::post('/konsultasi/proses', [KonsultasiController::class, 'proses'])->name('member.konsultasi.proses');
            Route::get('/konsultasi/hasil/{id}', [KonsultasiController::class, 'hasil'])->name('member.konsultasi.hasil');
            Route::get('/hasil-saya', [HasilRekomendasiController::class, 'index'])->name('member.hasil.saya');

        });

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
