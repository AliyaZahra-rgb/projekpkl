<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\DashboardController;
use App\Http\Controllers\Web\KaryawanController;
use App\Http\Controllers\Web\AbsensiController;
use App\Http\Controllers\Web\AdminAuthController;

Route::get('/', function () {
    return view('landing');
})->name('landing');

Route::get('/dashboard', function () {
    return view('utama');
});

Route::get('/register', [AuthController::class, 'showRegister'])->name('auth.register');
Route::post('/register', [AuthController::class, 'register']);

// Login & Logout
Route::get('/login', [AuthController::class, 'showLogin'])->name('auth.login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



// Dashboard
Route::get('/admin', [DashboardController::class, 'index'])->name('admin.admin');
Route::get('/index', [KaryawanController::class, 'index'])->name('karyawan.index');
Route::get('/create', [KaryawanController::class, 'create'])->name('karyawan.create');
Route::post('/karyawan/store', [KaryawanController::class, 'store'])->name('karyawan.store');
Route::get('/karyawan/export-spreadsheet', [\App\Http\Controllers\Web\KaryawanController::class, 'exportSpreadsheet'])->name('karyawan.export.spreadsheet');


// Form edit & update data
Route::get('/karyawan/{id}/edit', [KaryawanController::class, 'edit'])->name('karyawan.edit');
Route::put('/karyawan/{id}', [KaryawanController::class, 'update'])->name('karyawan.update');

// Hapus data
Route::delete('/karyawan/{id}', [KaryawanController::class, 'destroy'])->name('karyawan.destroy');

// Optional: Show detail karyawan
Route::get('/karyawan/{id}', [KaryawanController::class, 'show'])->name('karyawan.show');

// Absensi
Route::get('/absensi', [AbsensiController::class, 'index'])->name('absensi.index');
Route::get('/scan', [AbsensiController::class, 'scan'])->name('absensi.scan');
Route::post('/absensi/check-in', [AbsensiController::class, 'checkIn'])->name('absensi.checkin');
Route::post('/absensi/check-out', [AbsensiController::class, 'checkOut'])->name('absensi.checkout');

// 🟦 Form Login & Register (tanpa middleware)
Route::get('/adminlogin', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('/adminlogin', [AdminAuthController::class, 'login'])->name('admin.login.post');

Route::get('/adminregister', [AdminAuthController::class, 'showRegister'])->name('admin.register');
Route::post('/adminregister', [AdminAuthController::class, 'register'])->name('admin.register.post');

Route::middleware('admin')->group(function () {
Route::post('/adminlogout', [AdminAuthController::class, 'logout'])->name('admin.logout');
});

