<?php

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PemesananController;

Route::get('/', function () {
    return view('pelanggan.loginPelanggan');
});




Route::get('/registrasi_pelanggan', [PelangganController::class, 'registrasi_pelanggan'])->name('registrasi_pelanggan');
Route::post('/simpan_pelanggan', [PelangganController::class, 'simpan_pelanggan'])->name('simpan_pelanggan');

//LOGIN
Route::get('/login_admin_view', [LoginController::class, 'login_admin_view'])->name('login_admin_view');

Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login/admin', [LoginController::class, 'login_admin'])->name('login_admin');


//DASHBOARD
Route::get('/dashboard_pelanggan', [PelangganController::class, 'dashboard_pelanggan'])->name('dashboard_pelanggan');
Route::get('/admin-dashboard', function () {
    return view('admin.dashboardAdmin');
})->name('dashboard_admin');


//ADMIN
Route::get('/beranda_admin', [AdminController::class, 'beranda_admin'])->name('beranda_admin');
Route::get('/mengelola_users_admin', [AdminController::class, 'mengelola_users_admin'])->name('mengelola_users_admin');
Route::get('/menu_admin', [AdminController::class, 'menu_admin'])->name('menu_admin');
Route::post('/store_menu', [AdminController::class, 'store_menu'])->name('store_menu');

Route::get('/show_daftar_pesanan', [AdminController::class, 'show_daftar_pesanan'])->name('show_daftar_pesanan');

Route::get('/kategori_admin', [AdminController::class, 'kategori_admin'])->name('kategori_admin');
Route::post('/store_kategori', [AdminController::class, 'store_kategori'])->name('store_kategori');

//CART
Route::get('/keranjang_view', [CartController::class, 'keranjang_view'])->name('keranjang_view');
Route::get('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add_to_cart');
// Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
Route::patch('/update-cart', [CartController::class, 'updateCart'])->name('update.cart');
Route::delete('/remove-from-cart', [CartController::class, 'removeCart'])->name('remove.from.cart');


//PEMESANAN
Route::get('/order-confirmation', [PemesananController::class, 'orderConfirmation'])->name('orderConfirmation');
Route::post('/confirm-order', [PemesananController::class, 'confirmOrder'])->name('confirmOrder');
Route::get('/input_nama_meja/{order_id}', [PemesananController::class, 'input_nama_meja'])->name('input_nama_meja');
Route::patch('/inputan_nama_dan_meja/{order_id}', [PemesananController::class,'inputan_nama_dan_meja'])->name('inputan_nama_dan_meja');

//LOGOUT
Route::get('/logout_admin', function () {
    Auth::logout();
    return redirect()->route('login_admin');
})->name('logout_admin');


