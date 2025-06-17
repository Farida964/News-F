<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\AspirasiController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Arahkan root "/" ke halaman login
Route::get('/', function () {
    return redirect()->route('login');
});

// Semua rute berikut hanya bisa diakses jika user sudah login & terverifikasi
Route::middleware(['auth', 'verified'])->group(function () {

    // Setelah login, tampilkan home.blade.php
    Route::get('/home', function () {
        return view('home');
    })->name('home');

    // Resource routes hanya untuk user yang sudah login
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('/agenda', AgendaController::class);
    Route::resource('/aspirasi', AspirasiController::class);
    Route::resource('/announcement', AnnouncementController::class);
    Route::resource('/competition', CompetitionController::class);

    // Dashboard (opsional)
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Profile edit/update/delete
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rute bawaan Laravel untuk login, register, lupa password, dll.
require __DIR__.'/auth.php';
