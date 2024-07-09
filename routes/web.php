<?php

use Illuminate\Support\Facades\Route;
use Symfony\Component\Process\Process;
use App\Http\Controllers\DashboardPoli;
use App\Http\Controllers\DashboardUser;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardEvent;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardDokter;
use App\Http\Controllers\DashboardController;
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

Route::get('/', [AuthController::class, 'index'])->name('welcome')->middleware('guest');

Route::post('/login', [AuthController::class, 'authenticate'])->name('auth')->middleware('guest');

Route::middleware(['admin'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/dashboard/create', [DashboardController::class, 'create'])->name('admin.dashboard.create');

    Route::get('/admin/user/{user}/show', [DashboardUser::class, 'show'])->name('admin.user.show');
    Route::put('/admin/user/{user}', [DashboardUser::class, 'update'])->name('admin.user.update');

    Route::get('/caripasien', [DashboardPendaftaran::class, 'caripasien'])->name('caripasien');
    Route::get('/getpasien/{idpas}', [DashboardPendaftaran::class, 'getpasien'])->name('getpasien');
    Route::get('/noantri/{poli}', [DashboardPendaftaran::class, 'noantri'])->name('noantri');

    Route::get('/admin/pendaftaran', [DashboardPendaftaran::class, 'index'])->name('admin.pendaftaran.index');
    Route::get('/admin/pendaftaran/create', [DashboardPendaftaran::class, 'create'])->name('admin.pendaftaran.create');
    Route::post('/admin/pendaftaran', [DashboardPendaftaran::class, 'store'])->name('admin.pendaftaran.store');
    Route::put('/admin/pendaftaran/{pendaftaran}', [DashboardPendaftaran::class, 'update'])->name('admin.pendaftaran.update');

    Route::middleware(['root'])->group(function () {

        Route::get('/admin/master/dokter', [DashboardDokter::class, 'index'])->name('admin.dokter.index');
        Route::get('/admin/master/dokter/create', [DashboardDokter::class, 'create'])->name('admin.dokter.create');
        Route::post('/admin/master/dokter', [DashboardDokter::class, 'store'])->name('admin.dokter.store');
        Route::get('/admin/master/dokter/{dokter}', [DashboardDokter::class, 'show'])->name('admin.dokter.show');
        Route::get('/admin/master/dokter/{dokter}/edit', [DashboardDokter::class, 'edit'])->name('admin.dokter.edit');
        Route::put('/admin/master/dokter/{dokter}', [DashboardDokter::class, 'update'])->name('admin.dokter.update');
        Route::delete('/admin/master/dokter/{dokter}', [DashboardDokter::class, 'destroy'])->name('admin.dokter.destroy');

        Route::get('/admin/master/user', [DashboardUser::class, 'index'])->name('admin.user.index');
        Route::get('/admin/master/user/create', [DashboardUser::class, 'create'])->name('admin.user.create');
        Route::post('/admin/master/user', [DashboardUser::class, 'store'])->name('admin.user.store');
        Route::get('/admin/master/user/{user}/edit', [DashboardUser::class, 'edit'])->name('admin.user.edit');
    
        Route::put('/admin/master/user/{user}/updateroot', [DashboardUser::class, 'updateroot'])->name('admin.user.updateroot');
        Route::patch('/admin/master/user/{user}/set-admin', [DashboardUser::class, 'set_admin'])->name('admin.user.set_admin');
        Route::patch('/admin/master/user/{user}/set-root', [DashboardUser::class, 'set_root'])->name('admin.user.set_root');
    });
    Route::delete('/admin/user/{user}', [DashboardUser::class, 'destroy'])->name('admin.user.destroy');
});