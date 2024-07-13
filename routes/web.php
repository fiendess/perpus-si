<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\CekRole;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\KategoriController;


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

//Login
Route::get('/', [LoginController::class, 'index']);
Route::post('/', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

//Register
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

//Admin
Route::group(['middleware' => ['auth', 'cekrole:admin']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/buku', [BukuController::class, 'index'])->name('dashboard.buku.index');
    Route::get('/dashboard/buku/create', [BukuController::class, 'create'])->name('dashboard.buku.create');
    Route::post('/dashboard/buku', [BukuController::class, 'store'])->name('dashboard.buku.store');

    //user manajemen
     Route::get('/dashboard/admin/user', [DashboardController::class, 'getDataUser'])->name('dashboard.admin.user');

    //peminjaman
    Route::get('/dashboard/peminjaman', [PeminjamanController::class, 'index'])->name('dashboard.admin.peminjaman');

    //kategori
    Route::get('/dashboard/kategori', [KategoriController::class, 'index'])->name('dashboard.admin.kategori');
});

// Rute user
Route::group(['middleware' => ['auth', 'cekrole:user']], function () {
     Route::get('/dashboard/user', [DashboardController::class, 'user'])->name('dashboard.user.index');
});


