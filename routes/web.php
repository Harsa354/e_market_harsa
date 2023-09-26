<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PemasokController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;

route::get('/', [HomeController::class,'index']);
route::get('/profile', [HomeController::class,'profile']);
route::get('/contact', [HomeController::class,'contact']);
route::resource('/produk',ProdukController::class);
route::resource('/pembelian',PembelianController::class);
route::resource('/pemasok',PemasokController::class);
route::resource('/user',UserController::class);
route::resource('/pelanggan',PelangganController::class);
route::get('/download', [ProdukController::class,'download']);
route::get('/download/produk', [ProdukController::class,'exportData'])->name('export_produk');
