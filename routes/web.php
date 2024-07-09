<?php

use Illuminate\Support\Facades\Route;
use Symfony\Component\Process\Process;
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
Route::get('/daftar', [AuthController::class, 'daftar'])->name('daftar')->middleware('guest');

Route::post('/login', [AuthController::class, 'authenticate'])->name('auth')->middleware('guest');
Route::post('/register', [AuthController::class, 'register'])->name('register')->middleware('guest');

Route::middleware(['admin'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('/admin/master/dokter', [DashboardDokter::class, 'index'])->name('admin.dokter.index');
    Route::get('/admin/master/dokter/create', [DashboardDokter::class, 'create'])->name('admin.dokter.create');
    Route::get('/admin/master/dokter/{dokter}', [DashboardDokter::class, 'show'])->name('admin.dokter.show');
    Route::get('/admin/master/dokter/{dokter}/edit', [DashboardDokter::class, 'edit'])->name('admin.dokter.edit');
    Route::put('/admin/master/dokter/{dokter}', [DashboardDokter::class, 'update'])->name('admin.dokter.update');
    Route::delete('/admin/master/dokter/{dokter}', [DashboardDokter::class, 'destroy'])->name('admin.dokter.destroy');

    Route::get('/admin/master/user', [DashboardUser::class, 'index'])->name('admin.user.index');
    Route::get('/admin/master/user/create', [DashboardUser::class, 'create'])->name('admin.user.create');
    Route::get('/admin/user/{user}/show', [DashboardUser::class, 'show'])->name('admin.user.show');
    Route::get('/admin/master/user/{user}/edit', [DashboardUser::class, 'edit'])->name('admin.user.edit');
    Route::put('/admin/master/user/{user}', [DashboardUser::class, 'update'])->name('admin.user.update');
    Route::delete('/admin/user/{user}', [DashboardUser::class, 'destroy'])->name('admin.user.destroy');
});