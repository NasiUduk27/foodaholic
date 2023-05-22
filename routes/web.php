<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
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

Auth::routes();
Route::get('/logout', [LoginController::class, 'logout']);

Route::middleware(['auth', 'user-access:1'])->group(function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'userHome'])->name('user.home');
});

Route::middleware(['auth', 'user-access:2'])->group(function(){
    Route::get('/mitra/home', [App\Http\Controllers\HomeController::class, 'mitraHome'])->name('mitra.home');
});

Route::middleware(['auth', 'user-access:0'])->group(function(){
    Route::resource('/admin/home', AdminController::class);
});