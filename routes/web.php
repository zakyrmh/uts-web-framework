<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\DosenController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('landing');

// Route untuk Guest (Belum Login)
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Route untuk User yang Sudah Login (Protected Route)
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard');
    Route::resource('mahasiswa', MahasiswaController::class);
    Route::resource('ruangan', RuanganController::class);
    Route::resource('prodi', ProdiController::class);
    Route::resource('dosen', DosenController::class);
});
