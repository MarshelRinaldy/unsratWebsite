<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PelangganController;
use App\Models\Admin;
use Illuminate\Support\Facades\Route;

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

Route::get('/kategori_admin', [AdminController::class, 'kategori_admin'])->name('kategori_admin');
Route::post('/store_kategori', [AdminController::class, 'store_kategori'])->name('store_kategori');

//CART
Route::get('/keranjang_view', [CartController::class, 'keranjang_view'])->name('keranjang_view');
Route::get('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add_to_cart');
// Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
Route::patch('/update-cart', [CartController::class, 'updateCart'])->name('update.cart');
Route::delete('/remove-from-cart', [CartController::class, 'removeCart'])->name('remove.from.cart');



