<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailTransaksiController;
use App\Http\Controllers\GudangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::controller(LoginController::class)->group(function () {
//     Route::get('/', 'index')->name('login');
//     Route::post('/login-proses', 'LoginController@login_proses')->name('login_proses');
// });


Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login-proses', [LoginController::class, 'login_proses'])->name('login_proses');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


Route::controller(DashboardController::class)->group(function () {
    Route::get('/dashboard', 'index')->name('dashboard');
});
// Route::get('/dashboard', [DashboardController::class, 'index']);


Route::controller(ProdukController::class)->group(function () {
    Route::get('/produk', 'index');
    Route::get('/produk/create', 'create');
    Route::post('/produk/store', 'store');
    Route::get('/produk/edit/{id}', 'edit');
    Route::post('/produk/update/{id}', 'update');
    Route::delete('/produk/delete/{id}', 'destroy');
    Route::post('/produk/update-stok', 'updateStok');
});

Route::controller(SupplierController::class)->group(function () {
    Route::get('/supplier', 'index');
    Route::get('/supplier/create', 'create');
    Route::post('/supplier/store', 'store');
    Route::get('/supplier/edit/{id}', 'edit');
    Route::post('/supplier/update/{id}', 'update');
    Route::delete('/supplier/delete/{id}', 'destroy');
});

Route::controller(KategoriController::class)->group(function () {
    Route::get('/kategori', 'index');
    Route::get('/kategori/create', 'create');
    Route::post('/kategori/store', 'store');
    Route::get('/kategori/edit/{id}', 'edit');
    Route::post('/kategori/update/{id}', 'update');
    Route::delete('/kategori/delete/{id}', 'destroy');
});

Route::controller(SatuanController::class)->group(function () {
    Route::get('/satuan', 'index');
    Route::get('/satuan/create', 'create');
    Route::post('/satuan/store', 'store');
    Route::get('/satuan/edit/{id}', 'edit');
    Route::post('/satuan/update/{id}', 'update');
    Route::delete('/satuan/delete/{id}', 'destroy');
});

Route::controller(GudangController::class)->group(function () {
    Route::get('/gudang', 'index');
    Route::get('/gudang/create', 'create');
    Route::post('/gudang/store', 'store');
    Route::get('/gudang/edit/{id}', 'edit');
    Route::post('/gudang/update/{id}', 'update');
    Route::delete('/gudang/delete/{id}', 'destroy');
});

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/data', [UserController::class, 'data'])->name('user.data');
Route::resource('users', UserController::class)->except(['index']);
Route::delete('/users/delete/{id}', [UserController::class, 'destroy']);
Route::post('/users', [UserController::class, 'store'])->name('users.store');
// Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/update/{id}', [UserController::class, 'update'])->name('users.update');



Route::controller(TransaksiController::class)->group(function () {
    Route::get('/transaksi', 'index')->name('transaksi');
    Route::get('/transaksi/create', 'create')->name('transaksi.create');
    Route::post('/transaksi/store', 'store')->name('transaksi.store');
});

Route::controller(DetailTransaksiController::class)->group(function () {
    Route::get('/transaksi/data/{id}', 'data')->name('transaksi.data');
});

Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
Route::get('/laporan/test', [LaporanController::class, 'test'])->name('laporan.test');
Route::get('/laporan/data/{awal}/{akhir}', [LaporanController::class, 'data'])->name('laporan.data');
Route::get('/laporan/pdf/{awal}/{akhir}', [LaporanController::class, 'exportPDF'])->name('laporan.export_pdf');
Route::post('/laporan/update-periode', [LaporanController::class, 'updatePeriode'])->name('laporan.update_periode');
// Route::get('/laporan/data-gudang/{tanggal}', [LaporanController::class, 'dataGudang'])->name('laporan.data_gudang');

Route::controller(SettingController::class)->group(function () {
    Route::get('/setting', 'index')->name('setting');
    Route::get('/setting/frist', 'show')->name('setting.show');
    Route::post('/setting', 'update')->name('setting.update');
});

