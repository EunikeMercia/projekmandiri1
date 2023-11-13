<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\RakController;
use App\Http\Controllers\SatuanBarangController;
use App\Http\Controllers\StokKeluarController;
use App\Http\Controllers\StokMasukController;
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
    return view('welcome');
});

//Auth
Route::get('/register',[AuthController::class,'index_register'])->name('index_register')->middleware('guest');
Route::post('/register',[AuthController::class,'store'])->name('register');
Route::get('/login',[AuthController::class,'index_login'])->name('index_login')->middleware('guest');
Route::post('/login',[AuthController::class,'login'])->name('login');

Route::middleware(['auth'])->group(function () {

    //rak
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::get('/admin/rak',[RakController::class,'index'])->name('rak.index');
    Route::get('/admin/rak/create',[RakController::class,'create'])->name('rak.create');
    Route::post('/admin/rak', [RakController::class, 'store'])->name('rak.store');
    Route::get('/admin/rak/{id}/edit', [RakController::class, 'edit'])->name('rak.edit');
    Route::put('/admin/rak/{id}', [RakController::class, 'update'])->name('rak.update');
    Route::delete('/admin/rak/{id}', [RakController::class, 'delete'])->name('rak.delete');
    
    //satuan
    Route::get('/admin/satuanbarang',[SatuanBarangController::class,'index'])->name('satuan.index');
    Route::get('/admin/satuanbarang/create',[SatuanBarangController::class,'create'])->name('satuan.create');
    Route::post('/admin/satuanbarang', [SatuanBarangController::class, 'store'])->name('satuan.store');
    Route::get('/admin/satuanbarang/{id}/edit', [SatuanBarangController::class, 'edit'])->name('satuan.edit');
    Route::put('/admin/satuanbarang/{id}', [SatuanBarangController::class, 'update'])->name('satuan.update');
    Route::delete('/admin/satuanbarang/{id}', [SatuanBarangController::class, 'delete'])->name('satuan.delete');
    
    //kategori
    Route::get('/admin/kategori',[KategoriController::class,'index'])->name('kategori.index');
    Route::get('/admin/kategori/create',[KategoriController::class,'create'])->name('kategori.create');
    Route::post('/admin/kategori', [KategoriController::class, 'store'])->name('kategori.store');
    Route::get('/admin/kategori/{id}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
    Route::put('/admin/kategori/{id}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::delete('/admin/kategori/{id}', [KategoriController::class, 'delete'])->name('kategori.delete');
    
    //barang
    Route::get('/admin/barang',[BarangController::class,'index'])->name('barang.index');
    Route::get('/admin/barang/create',[BarangController::class,'create'])->name('barang.create');
    Route::post('/admin/barang', [BarangController::class, 'store'])->name('barang.store');
    Route::get('/admin/barang/{id}/edit', [BarangController::class, 'edit'])->name('barang.edit');
    Route::put('/admin/barang/{id}', [BarangController::class, 'update'])->name('barang.update');
    Route::delete('/admin/barang/{id}', [BarangController::class, 'delete'])->name('barang.delete');
    
    //stokmasuk
    Route::get('/admin/stokmasuk',[StokMasukController::class,'index'])->name('stokmasuk.index');
    Route::get('/admin/stokmasuk/create',[StokMasukController::class,'create'])->name('stokmasuk.create');
    Route::post('/admin/stokmasuk', [StokMasukController::class, 'store'])->name('stokmasuk.store');
    Route::get('/admin/stokmasuk/{id}/edit', [StokMasukController::class, 'edit'])->name('stokmasuk.edit');
    Route::put('/admin/stokmasuk/{id}', [StokMasukController::class, 'update'])->name('stokmasuk.update');
    Route::delete('/admin/stokmasuk/{id}', [StokMasukController::class, 'delete'])->name('stokmasuk.delete');
    
    //stokkeluar
    Route::get('/admin/stokkeluar',[StokKeluarController::class,'index'])->name('stokkeluar.index');
    Route::get('/admin/stokkeluar/create',[StokKeluarController::class,'create'])->name('stokkeluar.create');
    Route::post('/admin/stokkeluar', [StokKeluarController::class, 'store'])->name('stokkeluar.store');
    Route::get('/admin/stokkeluar/{id}/edit', [StokKeluarController::class, 'edit'])->name('stokkeluar.edit');
    Route::put('/admin/stokkeluar/{id}', [StokKeluarController::class, 'update'])->name('stokkeluar.update');
    Route::delete('/admin/stokkeluar/{id}', [StokKeluarController::class, 'delete'])->name('stokkeluar.delete');

    //laporan
    Route::get('/laporan/stokmasuk',[StokMasukController::class,'indexlaporan'])->name('stokmasuk.indexlaporan');
    Route::get('/laporan/stokkeluar',[StokKeluarController::class,'indexlaporan'])->name('stokkeluar.indexlaporan');
    Route::get('/laporan/stokmasuk/downloadpdf',[StokMasukController::class,'downloadpdf'])->name('stokmasuk.downloadpdf');
    Route::get('/laporan/stokkeluar/downloadpdf',[StokKeluarController::class,'downloadpdf'])->name('stokkeluar.downloadpdf');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    //konfirmasi
    Route::get('/konfirmasi/stokmasuk',[StokMasukController::class,'indexkonfirmasi'])->name('stokmasuk.indexkonfirmasi');
    Route::get('/konfirmasi/stokmasuk/{id}',[StokMasukController::class,'konfirmasi'])->name('stokmasuk.konfirmasi');
    Route::get('/konfirmasi/stokkeluar',[StokKeluarController::class,'indexkonfirmasi'])->name('stokkeluar.indexkonfirmasi');
    Route::get('/konfirmasi/stokkeluar/{id}',[StokKeluarController::class,'konfirmasi'])->name('stokkeluar.konfirmasi');
});

