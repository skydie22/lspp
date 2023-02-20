<?php

use App\Http\Controllers\admin\BukuController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\IdentitasController;
use App\Http\Controllers\admin\KategoriController;
use App\Http\Controllers\admin\LaporanController;
use App\Http\Controllers\admin\PemberitahuanController;
use App\Http\Controllers\admin\PeminjamanController;
use App\Http\Controllers\admin\PenerbitController;
use App\Http\Controllers\admin\pesanController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\user\DashboardController as UserDashboardController;
use App\Models\Pemberitahuan;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::post('/register', [RegisterController::class, 'store'])->name('auth.register');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('admin')->middleware(['auth' , 'role:admin'])->group(function() {
    Route::get('/dashboard', [DashboardController::class , 'index'])->name('admin.dashboard');
    Route::get('/anggota', [UserController::class, 'indexAnggota'])->name('admin.anggota');
    Route::post('/anggota/create', [UserController::class, 'storeAnggota'])->name('admin.anggota.create');
    Route::put('/anggota/update/{id}', [UserController::class, 'updateAnggota'])->name('admin.anggota.update');
    Route::delete('/anggota/delete/{id}', [UserController::class, 'destroyAnggota'])->name('admin.anggota.delete');

    Route::get('/penerbit', [PenerbitController::class, 'index'])->name('admin.penerbit');
    Route::post('/penerbit/create', [PenerbitController::class, 'store'])->name('admin.penerbit.create');
    Route::put('/penerbit/update{id}', [PenerbitController::class, 'update'])->name('admin.penerbit.update');
    Route::delete('/penerbit/delete{id}', [PenerbitController::class, 'destroy'])->name('admin.penerbit.delete');

    Route::get('/admin/data-admin', [UserController::class, 'indexAdmin'])->name('admin.admin');
    Route::post('/admin/create',[UserController::class, 'storeAdmin'])->name('admin.admin.create');
    Route::put('/admin/update/{id}', [UserController::class, 'updateAdmin'])->name('admin.admin.update');
    Route::delete('/admin/delete/{id}',[UserController::class, 'destroyAdmin'])->name('admin.admin.delete');

    Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('admin.peminjaman');

    Route::get('/identitas', [IdentitasController::class, 'index'])->name('admin.identitas');
    Route::put('/identitas/update', [IdentitasController::class, 'update'])->name('admin.identitas.update');

    Route::get('/buku', [BukuController::class, 'index'])->name('admin.buku');
    Route::post('/buku/store', [BukuController::class, 'store'])->name('admin.buku.create');
    Route::put('/buku/update/{id}', [BukuController::class, 'update'])->name('admin.buku.update');
    Route::delete('/buku/delete/{id}', [BukuController::class, 'destroy'])->name('admin.buku.delete');

    Route::get('/kategori', [KategoriController::class, 'index'])->name('admin.kategori');
    Route::post('/kategori/store', [KategoriController::class, 'store'])->name('admin.kategori.create');
    Route::put('/kategori/update{id}', [KategoriController::class, 'update'])->name('admin.kategori.update');
    Route::delete('/kategori/delete{id}', [KategoriController::class, 'destroy'])->name('admin.kategori.delete');

    Route::get('/laporan', [LaporanController::class, 'index'])->name('admin.laporan');
    Route::post('/laporan/tanggal_peminjaman/cetak', [LaporanController::class, 'cetakPeminjaman'])->name('admin.cetak.peminjaman');
    Route::post('/laporan/tanggal_pengembalian/cetak', [LaporanController::class, 'cetakPengembalian'])->name('admin.cetak.pengembalian');
    Route::post('/laporan/anggota/cetak', [LaporanController::class, 'cetakPeranggota'])->name('admin.cetak.anggota');

    Route::get('/pesan/masuk' , [pesanController::class, 'indexAdminMasuk'])->name('admin.pesan.masuk');
    Route::get('/pesan/terkirim' , [pesanController::class, 'indexAdminterkirim'])->name('admin.pesan.terkirim');
    Route::post('/pesan/kirim', [pesanController::class, 'kirimPesanAdmin'])->name('admin.pesan.kirim');
    Route::post('/pesan/masuk/Ubah_status' , [pesanController::class , 'updateStatusAdmin'])->name('admin.pesan.masuk.update');

    Route::get('/pemberitahuan', [PemberitahuanController::class, 'index'])->name('admin.pemberitahuan');
    Route::post('/pemberitahuan/store',[PemberitahuanController::class, 'store'])->name('admin.pemberitahuan.store');

});
Route::prefix('user')->middleware(['auth' , 'role:user'])->group(function() {
    Route::get('/dashboard', [UserDashboardController::class , 'index'])->name('user.dashboard');
});
