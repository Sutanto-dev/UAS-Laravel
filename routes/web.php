<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransaksiAkhirController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Route;
// Route::get('/',[UserController::class, 'login'])->name('login');
Route::get('/',[UserController::class, 'index'])->name('login');
Route::post('/login-proses',[UserController::class, 'login_proses'])->name('login-proses');
Route::get('/logout',[UserController::class, 'logout'])->name('logout');
Route::get('/register',[UserController::class, 'register'])->name('register');
Route::post('/register-proses',[UserController::class, 'register_proses'])->name('register-proses');

Route::middleware(['auth']) -> group(function(){
    Route::get('/product', [ProductController::class, 'index'])->name('product.index');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/create', [ProductController::class, 'create']);
    Route::get('/edit/{id}', [ProductController::class, 'edit']);
    Route::put('/update/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::get('delete/{id}',[ProductController::class,'deleteData']);
    Route::get('/search', [ProductController::class, 'search'])->name('product.search');


    Route::post('/store',[TransaksiController::class, 'store'])->name('store');
    Route::get('/transaksi',[TransaksiController::class, 'dataTransaksi'])->name('transaksi.index');
    Route::get('/transaksi/buatTransaksi',[TransaksiController::class, 'buatTransaksi'])->name('transaksi.buat');
    Route::get('/transaksi/checkout',[TransaksiController::class, 'checkout'])->name('transaksi.checkout');
    Route::post('/transaksi/simpanKeranjang', [TransaksiController::class, 'simpanKerajang'])->name('simpan.kerajang');
    Route::get('/transaksi/{id}/hapusKeranjang', [TransaksiController::class, 'hapusKerajang'])->name('hapus.kerajang');

    Route::get('/riwayat',[TransaksiAkhirController::class, 'riwayat'])->name('transaksi.riwayat');
    Route::post('/transaksi/pembayaran',[TransaksiAkhirController::class, 'pembayaran'])->name('transaksi.pembayaran');
});
