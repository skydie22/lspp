<?php

use App\Http\Controllers\admin\PemberitahuanController;
use App\Http\Controllers\API\admin\bukuApiController;
use App\Http\Controllers\API\admin\identitasApiController;
use App\Http\Controllers\API\admin\kategoriApiController;
use App\Http\Controllers\API\admin\pemberitahuanApiController as AdminPemberitahuanApiController;
use App\Http\Controllers\API\admin\peminjamanApiController as AdminPeminjamanApiController;
use App\Http\Controllers\API\admin\penerbitApiController;
use App\Http\Controllers\API\admin\pesanApiController as AdminPesanApiController;
use App\Http\Controllers\API\admin\profileApiController as AdminProfileApiController;
use App\Http\Controllers\API\admin\userApiController;
use App\Http\Controllers\API\loginApiController;
use App\Http\Controllers\API\pemberitahuanApiController;
use App\Http\Controllers\API\user\peminjamanApiController;
use App\Http\Controllers\API\user\pengembalianApiController;
use App\Http\Controllers\API\user\pesanApiController;
use App\Http\Controllers\API\user\profileApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/login', [loginApiController::class, 'login']);
Route::post('/register', [registerApiController::class, 'register']);

Route::middleware(['auth:sanctum' , 'role:user'])->prefix('user')->group(function() {
    Route::post('/logout', [loginApiController::class, 'logout']);
    Route::get('/pemberitahuan', [pemberitahuanApiController::class, 'index']);
    Route::prefix('peminjaman')->controller(peminjamanApiController::class)->group(function() {
        Route::get('/', 'index');
        Route::post('/store','store');
    });
    Route::prefix('pengembalian')->controller(pengembalianApiController::class)->group(function() {
        Route::get('/','index');
        Route::post('/store','store');
    });
    Route::prefix('pesan')->controller(pesanApiController::class)->group(function(){
        Route::get('/','index');
        Route::post('/store', 'store');
        Route::post('/update' , 'update');

    });
    Route::prefix('/profile')->controller(profileApiController::class)->group(function () {
        Route::get('/','index');
        Route::post('/update','update');
    });

});

Route::middleware(['auth:sanctum','role:admin'])->prefix('admin')->group(function() {
    //master data
    Route::prefix('/data-admin')->controller(userApiController::class)->group(function () {
        Route::get('/','allAdmin');
        Route::post('/store','tambahAdmin');
        Route::post('/update/{id}','updateAdmin');
        Route::delete('/delete/{id}','destroyAdmin');
    });

    Route::prefix('/data-anggota')->controller(userApiController::class)->group(function () {
        Route::get('/','indexAnggota');
        Route::post('/store','storeAnggota');
        Route::post('/update/{id}','updateAnggota');
        Route::delete('/delete/{id}','destroyAnggota');
    });

    Route::get('/peminjaman',[AdminPeminjamanApiController::class, 'index']);

    Route::prefix('penerbit')->controller(penerbitApiController::class)->group(function () {
        Route::get('/' , 'index');
        Route::post('/store' , 'store');
        Route::post('/update/{id}','update');
        Route::delete('/delete/{id}','destroy');
    });

    //katalog buku
    Route::prefix('kategori')->controller(kategoriApiController::class)->group(function () {
        Route::get('/' , 'index');
        Route::post('/store' , 'store');
        Route::post('/update/{id}','update');
        Route::delete('/delete/{id}','destroy');
    });

    Route::prefix('buku')->controller(bukuApiController::class)->group(function () {
        Route::get('/' , 'index');
        Route::post('/store' , 'store');
        Route::post('/update/{id}','update');
        Route::delete('/delete/{id}','destroy');
    });

    //identitas
    Route::prefix('identitas')->controller(identitasApiController::class)->group(function () {
        Route::get('/','index');
        Route::post('/update','update');
    });

    Route::prefix('pesan')->controller(AdminPesanApiController::class)->group(function(){
        Route::get('/','index');
        Route::post('/store', 'store');
        Route::post('/update' , 'update');

    });

    Route::prefix('pemberitahuan')->controller(AdminPemberitahuanApiController::class)->group(function(){
        Route::get('/','index');
        Route::post('/store', 'store');
        Route::post('/update/{id}' , 'update');
        Route::delete('/delete/{id}' , 'destroy');
    });

    Route::prefix('/profile')->controller(AdminProfileApiController::class)->group(function () {
        Route::get('/','index');
        Route::post('/update','update');
    });
});
