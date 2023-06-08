<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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
Route::get('/', [HomeController::class, 'index']);
Route::get('/faq', function () {
    return view('faq');
})->name('faq');

Route::get('/about_us', function () {
    return view('about_us');
})->name('about_us');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Auth::routes();

Route::get('/logout', [LoginController::class, 'logout']);

Route::middleware(['auth', 'user-access:1'])->group(function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'userHome'])->name('user.home');
    Route::get('/search',[UserController::class, 'search'])->name('user.search');
    Route::get('/profile',[ProfileController::class, 'edit'])->name('profile');
    Route::get('/keranjang/',[KeranjangController::class, 'index'])->name('user.keranjang');
    Route::post('/keranjang/add',[KeranjangController::class, 'add_keranjang'])->name('user.add_keranjang');
});

Route::middleware(['auth', 'user-access:2'])->group(function(){
    Route::get('/mitra/home', [App\Http\Controllers\MitraController::class, 'index'])->name('mitra.home');
    Route::get('/mitra/produk', [App\Http\Controllers\ProdukController::class, 'index']);
    Route::resource('/mitra/produk', ProdukController::class);
});

Route::middleware(['auth', 'user-access:0'])->group(function(){
    Route::resource('/admin/', AdminController::class);
    Route::get('/admin/home', [AdminController::class, 'index'])->name('admin.home');
    Route::get('/admin/mitra', [AdminController::class, 'mitra'])->name('admin.mitra');
    Route::get('/admin/mitra/verifikasi/{id}', [AdminController::class, 'terima_mitra']);
    Route::get('/admin/mitra/tolak/{id}', [AdminController::class, 'tolak_mitra']);
    Route::get('/admin/mitra/detail/{id}', [AdminController::class, 'detail_mitra']);
    Route::get('/admin/mitra/produk/{id}', [AdminController::class, 'show_produk']);
    Route::get('/admin/mitra/hapus-verifikasi/{id}', [AdminController::class, 'hapus_verifikasi']);
    Route::get('/admin/transaksi', [AdminController::class, 'transaksi'])->name('admin.transaksi');
});