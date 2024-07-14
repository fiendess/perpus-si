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

    //buku
    Route::get('/dashboard/buku', [BukuController::class, 'index'])->name('dashboard.buku.index');
    Route::get('/dashboard/buku/create', [BukuController::class, 'create'])->name('dashboard.buku.create');
    Route::post('/dashboard/buku', [BukuController::class, 'store'])->name('dashboard.buku.store');
    Route::get('/dashboard/buku/{buku}/edit', [BukuController::class, 'edit'])->name('dashboard.buku.edit-buku');
    Route::put('/dashboard/buku/{buku}', [BukuController::class, 'update'])->name('dashboard.buku.update');
    Route::delete('/dashboard/buku/{buku}', [BukuController::class, 'destroy'])->name('dashboard.buku.destroy');

    //user manajemen
     Route::get('/dashboard/admin/user', [DashboardController::class, 'getDataUser'])->name('dashboard.admin.user');

    //peminjaman
    Route::get('/dashboard/peminjaman', [PeminjamanController::class, 'index'])->name('dashboard.admin.peminjaman');
    Route::get('/dashboard/peminjaman/create', [PeminjamanController::class, 'create'])->name('dashboard.peminjaman.create');
    Route::post('/dashboard/peminjaman', [PeminjamanController::class, 'store'])->name('dashboard.peminjaman.store');
    Route::get('/dashboard/peminjaman/{peminjaman}/edit', [PeminjamanController::class, 'edit'])->name('dashboard.peminjaman.edit');
    Route::put('/dashboard/peminjaman/{peminjaman}', [PeminjamanController::class, 'update'])->name('dashboard.peminjaman.update');
    Route::delete('/dashboard/peminjaman/{peminjaman}', [PeminjamanController::class, 'destroy'])->name('dashboard.peminjaman.destroy');

    //kategori
    Route::get('/dashboard/kategori', [KategoriController::class, 'index'])->name('dashboard.admin.kategori');
    Route::get('/dashboard/kategori/create', [KategoriController::class, 'create'])->name('dashboard.kategori.create');
    Route::post('/dashboard/kategori', [KategoriController::class, 'store'])->name('dashboard.kategori.store');
});

// Rute user
Route::group(['middleware' => ['auth', 'cekrole:user']], function () {
     Route::get('/dashboard/user', [DashboardController::class, 'user'])->name('dashboard.user.index');
});


