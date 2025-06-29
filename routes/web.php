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


Route::get('/', function () {
    return view('login'); 
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
    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');

    // Konsultasi (Member)

    Route::get('/konsultasi', [KonsultasiController::class, 'index'])->name('konsultasi.index');
    Route::post('/konsultasi/proses', [KonsultasiController::class, 'proses'])->name('konsultasi.proses');
    Route::get('/konsultasi/hasil/{id}', [KonsultasiController::class, 'hasil'])->name('konsultasi.hasil');


    // Latihan (Trainer)
    Route::get('/latihan', [LatihanController::class, 'index'])->name('latihan');
    Route::get('/latihan/create', [LatihanController::class, 'create'])->name('latihan.create');
    Route::post('/latihan', [LatihanController::class, 'store'])->name('latihan.store');
    Route::get('/latihan/{id}/edit', [LatihanController::class, 'edit'])->name('latihan.edit');
    Route::put('/latihan/{id}', [LatihanController::class, 'update'])->name('latihan.update');
    Route::delete('/latihan/{id}', [LatihanController::class, 'destroy'])->name('latihan.destroy');
    
    // Rekomendasi (Trainer)
    Route::get('/rekomendasi', [RekomendasiController::class, 'index'])->name('rekomendasi');
    Route::get('/rekomendasi/create', [RekomendasiController::class, 'create'])->name('rekomendasi.create');
    Route::post('/rekomendasi', [RekomendasiController::class, 'store'])->name('rekomendasi.store');
    Route::get('/rekomendasi/{id}/edit', [RekomendasiController::class, 'edit'])->name('rekomendasi.edit');
    Route::put('/rekomendasi/{id}', [RekomendasiController::class, 'update'])->name('rekomendasi.update');
    Route::delete('/rekomendasi/{id}', [RekomendasiController::class, 'destroy'])->name('rekomendasi.destroy');
            
    // Rule / Aturan (Trainer)
    Route::get('/rule', [RuleController::class, 'index'])->name('rule');
    Route::get('/rule/create', [RuleController::class, 'create'])->name('rule.create');
    Route::post('/rule', [RuleController::class, 'store'])->name('rule.store');
    Route::get('/rule/{id}/edit', [RuleController::class, 'edit'])->name('rule.edit');
    Route::put('/rule/{id}', [RuleController::class, 'update'])->name('rule.update');
    Route::delete('/rule/{id}', [RuleController::class, 'destroy'])->name('rule.destroy');
    
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
