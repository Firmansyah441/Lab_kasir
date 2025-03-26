<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\TransaksiController;

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
    return redirect('/login');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'ceklogin'])->name('ceklogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/admin/home', [AdminController::class, 'index'])->name('admin.home');
Route::get('/admin/kategori', [KategoriController::class, 'index'])->name('admin.kategori');
Route::get('/admin/barang', [BarangController::class, 'index'])->name('admin.barang');

Route::get('/petugas/home', [PetugasController::class, 'index']);
Route::post('/tambah_kategori', [KategoriController::class, 'store'])->name('tambah_kategori');
Route::put('/edit_kategori/{id}', [KategoriController::class, 'update'])->name('update_kategori');
Route::delete('/hapus_kategori/{id}', [KategoriController::class, 'destroy'])->name('delete_kategori');

Route::post('/tambah_barang', [BarangController::class, 'store'])->name('tambah_barang');
Route::put('/edit_barang/{id}', [BarangController::class, 'update'])->name('update_barang');
Route::delete('/hapus_barang/{id}', [BarangController::class, 'destroy'])->name('delete_barang');

// transaksi
Route::get('/transaksi', [TransaksiController::class, 'index'])->name('admin.transaksi');
Route::get('/add_to_cart/{id}', [TransaksiController::class, 'add_cart'])->name('add_cart');
Route::delete('/delete_cart/{id}',[TransaksiController::class, 'destroy'])->name('keranjang.destroy');
Route::post('/keranjang/update/{id}',[TransaksiController::class, 'updateqty'])->name('keranjang.update');
Route::post('/transaksi',[TransaksiController::class, 'simpanTransaksi'])->name('transaksi.simpan');








