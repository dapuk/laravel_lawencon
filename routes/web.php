<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/produk', [ProdukController::class, 'index'])->name('produk');
Route::get('/produk/tambah', [ProdukController::class, 'tambah'])->name('formTambahProduk');
Route::post('/produk/tambah', [ProdukController::class, 'prosesTambah'])->name('prosesTambahProduk');
Route::get('/produk/ubah/{id}', [ProdukController::class, 'ubah'])->name('formUbahProduk');
Route::post('/produk/ubah/{id}', [ProdukController::class, 'prosesUbah'])->name('prosesUbahProduk');
Route::post('/produk/cari', [ProdukController::class, 'prosesCari'])->name('prosesCariProduk');



