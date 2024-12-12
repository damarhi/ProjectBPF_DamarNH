<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\penggunaController;
use App\Http\Controllers\transaksiController;
use App\Http\Controllers\bookingController;
use App\Http\Controllers\produkController;
use App\Models\booking;
use App\Models\produk;
use App\Models\transaksi;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\auth;


Route::resource('transaksi', transaksiController::class);
Route::resource('pengguna', penggunaController::class);
Route::resource('booking', bookingController::class);
Route::resource('produk', produkController::class);
// Route::middleware([Authenticate::class])->group(function(){
//    Route::resource('transaksi',transaksiController::class);
//     Route::resource('pengguna', penggunaController::class);
//     Route::resource('booking', bookingController::class);
// //     Route::resource('laporan-pasien', laporanPasienController::class);
// //     Route::resource('laporan-daftar', laporanDaftarController::class);

// });


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('logout',function(){
    auth::logout();
    return redirect('login');
});
