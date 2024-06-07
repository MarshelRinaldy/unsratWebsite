<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PelangganController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.loginAdmin');
});

Route::get('/admin-dashboard', function () {
    return view('admin.dashboardAdmin');
});


Route::get('/registrasi_pelanggan', [PelangganController::class, 'registrasi_pelanggan'])->name('registrasi_pelanggan');
Route::post('/simpan_pelanggan', [PelangganController::class, 'simpan_pelanggan'])->name('simpan_pelanggan');

Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/dashboard_pelanggan', [PelangganController::class, 'dashboard_pelanggan'])->name('dashboard_pelanggan');

Route::get('/login_admin_view', [LoginController::class, 'login_admin_view'])->name('login_admin_view');