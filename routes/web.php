<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardUkm;
use Symfony\Component\Process\Process;
use App\Http\Controllers\DashboardUser;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardEvent;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardProduk;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardKelasUsaha;
use App\Http\Controllers\DashboardBidangUsaha;
use App\Http\Controllers\DashboardPendaftaran;

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

Route::get('/', [HomeController::class, 'index'])->name('welcome')->middleware('guest');
Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::get('/daftar', [AuthController::class, 'daftar'])->name('daftar')->middleware('guest');
Route::get('/daftaradmin', [AuthController::class, 'daftaradmin'])->name('daftaradmin')->middleware('guest');

Route::post('/login', [AuthController::class, 'authenticate'])->name('auth')->middleware('guest');
Route::post('/register', [AuthController::class, 'register'])->name('register')->middleware('guest');
Route::post('/regadmin', [AuthController::class, 'regadmin'])->name('regadmin')->middleware('guest');

Route::middleware(['admin'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('/dashboard/profilumkm', [DashboardController::class, 'profilumkm'])->name('admin.profilumkm');
    Route::put('/dashboard/profilumkm/{profilumkm}', [DashboardController::class, 'profilumkmupdate'])->name('admin.profilumkm.update');

    Route::get('/admin/user/{user}/show', [DashboardUser::class, 'show'])->name('admin.user.show');

    Route::get('/admin/master/produk', [DashboardProduk::class, 'index'])->name('admin.produk.index');
    Route::get('/admin/master/produk/create', [DashboardProduk::class, 'create'])->name('admin.produk.create');
    Route::post('/admin/master/produk', [DashboardProduk::class, 'store'])->name('admin.produk.store');
    Route::get('/admin/master/produk/{produk}', [DashboardProduk::class, 'show'])->name('admin.produk.show');
    Route::get('/admin/master/produk/{produk}/edit', [DashboardProduk::class, 'edit'])->name('admin.produk.edit');
    Route::put('/admin/master/produk/{produk}', [DashboardProduk::class, 'update'])->name('admin.produk.update');
    Route::delete('/admin/master/produk/{produk}', [DashboardProduk::class, 'destroy'])->name('admin.produk.destroy');

    Route::middleware(['super'])->group(function () {
        Route::get('/admin/ukm', [DashboardUkm::class, 'index'])->name('admin.ukm.index');

        Route::get('/admin/master/bidang_usaha', [DashboardBidangUsaha::class, 'index'])->name('admin.bidang_usaha.index');
        Route::get('/admin/master/bidang_usaha/create', [DashboardBidangUsaha::class, 'create'])->name('admin.bidang_usaha.create');
        Route::post('/admin/master/bidang_usaha', [DashboardBidangUsaha::class, 'store'])->name('admin.bidang_usaha.store');
        Route::get('/admin/master/bidang_usaha/{bidang_usaha}', [DashboardBidangUsaha::class, 'show'])->name('admin.bidang_usaha.show');
        Route::get('/admin/master/bidang_usaha/{bidang_usaha}/edit', [DashboardBidangUsaha::class, 'edit'])->name('admin.bidang_usaha.edit');
        Route::put('/admin/master/bidang_usaha/{bidang_usaha}', [DashboardBidangUsaha::class, 'update'])->name('admin.bidang_usaha.update');
        Route::delete('/admin/master/bidang_usaha/{bidang_usaha}', [DashboardBidangUsaha::class, 'destroy'])->name('admin.bidang_usaha.destroy');

        Route::get('/admin/master/kelas_usaha', [DashboardKelasUsaha::class, 'index'])->name('admin.kelas_usaha.index');
        Route::get('/admin/master/kelas_usaha/create', [DashboardKelasUsaha::class, 'create'])->name('admin.kelas_usaha.create');
        Route::post('/admin/master/kelas_usaha', [DashboardKelasUsaha::class, 'store'])->name('admin.kelas_usaha.store');
        Route::get('/admin/master/kelas_usaha/{kelas_usaha}', [DashboardKelasUsaha::class, 'show'])->name('admin.kelas_usaha.show');
        Route::get('/admin/master/kelas_usaha/{kelas_usaha}/edit', [DashboardKelasUsaha::class, 'edit'])->name('admin.kelas_usaha.edit');
        Route::put('/admin/master/kelas_usaha/{kelas_usaha}', [DashboardKelasUsaha::class, 'update'])->name('admin.kelas_usaha.update');
        Route::delete('/admin/master/kelas_usaha/{kelas_usaha}', [DashboardKelasUsaha::class, 'destroy'])->name('admin.kelas_usaha.destroy');

        Route::get('/admin/master/user', [DashboardUser::class, 'index'])->name('admin.user.index');
        Route::get('/admin/master/user/create', [DashboardUser::class, 'create'])->name('admin.user.create');
        Route::get('/admin/master/user/{user}/edit', [DashboardUser::class, 'edit'])->name('admin.user.edit');
        Route::put('/admin/master/user/{user}', [DashboardUser::class, 'update'])->name('admin.user.update');
        Route::put('/admin/master/user/{user}/verif', [DashboardUser::class, 'updateverif'])->name('admin.user.updateverif');
        Route::put('/admin/master/user/{user}/reject', [DashboardUser::class, 'updatereject'])->name('admin.user.updatereject');
        Route::delete('/admin/user/{user}', [DashboardUser::class, 'destroy'])->name('admin.user.destroy');
    });

});