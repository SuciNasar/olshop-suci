<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Daftar_JualanController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\AuthController;  // Corrected controller name

/*
|----------------------------------------------------------------------
| Web Routes
|----------------------------------------------------------------------
| Here is where you can register web routes for your application.
|
*/

Route::middleware('auth')->group(function () {
Route::get('/', [Daftar_JualanController::class, 'index'])->name('daftar_jualan.index');

Route::resource('daftar_jualan', Daftar_JualanController::class);
Route::get('transaksi.transaksi', [Daftar_jualanController::class, 'transaksi'])->name('transaksi.transaksi');
Route::get('daftar_jualan.index', [Daftar_JualanController::class, 'index'])->name('daftar_jualan.index');
Route::resource('pelanggan', PelangganController::class);
});

// Halaman login untuk guest (belum login)
Route::get('/login', function () {
    return view('Auth.Login');
})->middleware('guest')->name('login');

//rute untuk mengakses halaman user
Route::get('pelanggan', [PelangganController::class, 'index'])->name('pelanggan.index');
Route::get('transaksi/{daftar_jualan_id}', [PelangganController::class, 'create'])->name('pelanggan.transaksi');
Route::post('/pelanggan/store', [PelangganController::class, 'store'])->name('pelanggan.store');

// Proses login dan logout
Route::post('/login-proses', [AuthController::class, 'login'])->name('loginproccess');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');