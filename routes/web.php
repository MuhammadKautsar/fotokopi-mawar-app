<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
        $jumlah_produk = App\Models\Produk::all()->count();
        $jumlah_pembelian = App\Models\Pembelian::all()->count();
        $jumlah_penjualan = App\Models\Penjualan::all()->count();
    return view('pages.dashboard', compact('jumlah_produk', 'jumlah_pembelian', 'jumlah_penjualan'));
});

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

Route::get('/produk', [App\Http\Controllers\ProdukController::class, 'index'])->name('produk');
Route::get('/produk/create', [App\Http\Controllers\ProdukController::class, 'create'])->name('add.produk');
Route::post('/produk/store', [App\Http\Controllers\ProdukController::class, 'store'])->name('store.produk');

Route::get('/pembelian', [App\Http\Controllers\PembelianController::class, 'index'])->name('pembelian');
Route::get('/pembelian/create', [App\Http\Controllers\PembelianController::class, 'create'])->name('add.pembelian');
Route::post('/pembelian/store', [App\Http\Controllers\PembelianController::class, 'store'])->name('store.pembelian');

Route::get('/penjualan', [App\Http\Controllers\PenjualanController::class, 'index'])->name('penjualan');
Route::get('/penjualan/create', [App\Http\Controllers\PenjualanController::class, 'create'])->name('add.penjualan');
Route::post('/penjualan/store', [App\Http\Controllers\PenjualanController::class, 'store'])->name('store.penjualan');