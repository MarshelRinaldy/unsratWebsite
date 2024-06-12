<?php

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\SettingController;


Route::get('/', function () {
    return view('pelanggan.loginPelanggan');
});




Route::get('/registrasi_pelanggan', [PelangganController::class, 'registrasi_pelanggan'])->name('registrasi_pelanggan');
Route::post('/simpan_pelanggan', [PelangganController::class, 'simpan_pelanggan'])->name('simpan_pelanggan');

//LOGIN
Route::get('/login_admin_view', [LoginController::class, 'login_admin_view'])->name('login_admin_view');
Route::get('/login_pelanggan_view', [LoginController::class, 'login_pelanggan_view'])->name('login_pelanggan_view');

Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login/admin', [LoginController::class, 'login_admin'])->name('login_admin');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');



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

Route::get('/orders/{orderId}', [PemesananController::class, 'showOrder'])->name('orders.show');
Route::post('/orders/{orderId}/confirm', [PemesananController::class, 'confirmOrders'])->name('orders.confirm');
Route::get('/orders/{orderId}/pdf', [PemesananController::class, 'generatePdf'])->name('orders.pdf');

Route::put('/kategori/update/{id}', [AdminController::class, 'update_kategori'])->name('update_kategori');
Route::delete('/kategori/delete/{id}', [AdminController::class, 'delete_kategori'])->name('delete_kategori');

Route::put('/menu/{id}', [AdminController::class, 'update_menu'])->name('update_menu');
Route::delete('/menu/{id}', [AdminController::class, 'delete_menu'])->name('delete_menu');

Route::put('/admin/pelanggan/{id}', [AdminController::class, 'updatePelanggan'])->name('update_pelanggan');
Route::delete('/admin/pelanggan/{id}', [AdminController::class, 'deletePelanggan'])->name('delete_pelanggan');

Route::put('/admin/admin/{id}', [AdminController::class, 'updateAdmin'])->name('update_admin');
Route::delete('/admin/admin/{id}', [AdminController::class, 'deleteAdmin'])->name('delete_admin');

Route::get('/admin/mengelola-akun', [AdminController::class, 'mengelola_users_admin'])->name('admin.mengelolaAkunAdmin');

Route::get('/admin/settings', [SettingController::class, 'index'])->name('admin.setting');
Route::post('/admin/settings', [SettingController::class, 'update'])->name('admin.settings.update');





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

//ABOUT US
Route::get('/about-us', [SettingController::class, 'aboutUs'])->name('about_us');


//LOGOUT
Route::get('/logout_admin', function () {
    Auth::logout();
    return redirect()->route('login_admin');
})->name('logout_admin');


