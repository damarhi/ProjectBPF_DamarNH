<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\penggunaController;
use App\Http\Controllers\transaksiController;
use App\Http\Controllers\bookingController;
use App\Http\Controllers\produkController;
use App\Http\Controllers\laporanController;
use App\Http\Controllers\HomeController;
use App\Models\booking;
use App\Models\produk;
use App\Models\transaksi;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\auth;

Auth::routes();

Route::middleware(['auth', 'user-access:admin'])->group(function () {

    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

    Route::resource('pengguna', penggunaController::class);
    Route::resource('transaksi', transaksiController::class);
    Route::resource('booking', bookingController::class);
    Route::resource('produk', produkController::class);
    Route::resource('laporan', laporanController::class);
});

Route::middleware(['auth', 'user-access:user'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

// Route::middleware([Authenticate::class])->group(function(){
//    Route::resource('transaksi',transaksiController::class);
//     Route::resource('pengguna', penggunaController::class);
//     Route::resource('booking', bookingController::class);
// //     Route::resource('laporan-pasien', laporanPasienController::class);
// //     Route::resource('laporan-daftar', laporanDaftarController::class);

// });
Route::get('logout',function(){
    auth::logout();
    return redirect('login');
});

