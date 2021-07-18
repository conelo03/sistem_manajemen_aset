<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AsetController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PengadaanController;
use App\Http\Controllers\Admin\MaintenanceController;
use App\Http\Controllers\Admin\PeminjamanController;

use App\Http\Controllers\Laboran\LaboranController;
use App\Http\Controllers\Laboran\UserController as UserLaboran;
use App\Http\Controllers\Laboran\AsetController as AsetLaboran;

use App\Http\Controllers\Keuangan\KeuanganController;
use App\Http\Controllers\Keuangan\AsetController as AsetKeuangan;

use App\Http\Controllers\Wadek\WadekController;
use App\Http\Controllers\Wadek\AsetController as AsetWadek;

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
Route::middleware('auth')->group(function () {
  Route::middleware('is_admin')->group(function () {
    Route::prefix('admin')->group(function () {
      Route::get('/', [AdminController::class, 'index']);

      Route::prefix('/data_aset')->group(function () {
        Route::get('/', [AsetController::class, 'index']);
        Route::get('/tambah', [AsetController::class, 'create']);
        Route::post('/tambah', [AsetController::class, 'store']);
        Route::get('/hapus/{id}', [AsetController::class, 'destroy']);
        Route::get('/edit/{id}', [AsetController::class, 'edit']);
        Route::post('/edit/{id}', [AsetController::class, 'update']);
      });

      Route::prefix('/manajemen_user')->group(function () {
        Route::get('/', [UserController::class, 'index']);
        Route::get('/tambah', [UserController::class, 'create']);
        Route::post('/tambah', [UserController::class, 'store']);
        Route::get('/hapus/{id}', [UserController::class, 'destroy']);
        Route::get('/edit/{id}', [UserController::class, 'edit']);
        Route::post('/edit/{id}', [UserController::class, 'update']);
      });

      Route::prefix('/pengadaan')->group(function () {
        Route::get('/', [PengadaanController::class, 'index']);
        Route::get('/tambah', [PengadaanController::class, 'create']);
        Route::post('/tambah', [PengadaanController::class, 'store']);
        Route::get('/hapus/{id}', [PengadaanController::class, 'destroy']);
        Route::get('/edit/{id}', [PengadaanController::class, 'edit']);
        Route::post('/edit/{id}', [PengadaanController::class, 'update']);
        Route::get('/history', [PengadaanController::class, 'history']);
      });

      Route::prefix('/maintenance')->group(function () {
        Route::get('/', [MaintenanceController::class, 'index']);
        Route::get('/tambah', [MaintenanceController::class, 'create']);
        Route::post('/tambah', [MaintenanceController::class, 'store']);
        Route::get('/hapus/{id}', [MaintenanceController::class, 'destroy']);
        Route::get('/edit/{id}', [MaintenanceController::class, 'edit']);
        Route::post('/edit/{id}', [MaintenanceController::class, 'update']);
        Route::get('/history', [MaintenanceController::class, 'history']);
      });

      Route::prefix('/peminjaman')->group(function () {
        Route::get('/', [PeminjamanController::class, 'index']);
        Route::get('/tambah', [PeminjamanController::class, 'create']);
        Route::post('/tambah', [PeminjamanController::class, 'store']);
        Route::get('/hapus/{id}', [PeminjamanController::class, 'destroy']);
        Route::get('/edit/{id}', [PeminjamanController::class, 'edit']);
        Route::post('/edit/{id}', [PeminjamanController::class, 'update']);
        Route::get('/history', [PeminjamanController::class, 'history']);
      });
    });
  });
  
  Route::middleware('is_laboran')->group(function () {
    Route::prefix('laboran')->group(function () {
      Route::get('/', [LaboranController::class, 'index']);
      
      Route::prefix('/manajemen_user')->group(function () {
        Route::get('/', [UserLaboran::class, 'index']);
        Route::get('/hapus/{id}', [UserLaboran::class, 'destroy']);
        Route::get('/edit/{id}', [UserLaboran::class, 'edit']);
        Route::post('/edit/{id}', [UserLaboran::class, 'update']);
      });

      Route::prefix('/data_aset')->group(function () {
        Route::get('/', [AsetLaboran::class, 'index']);
        Route::get('/tambah', [AsetLaboran::class, 'create']);
        Route::post('/tambah', [AsetLaboran::class, 'store']);
        Route::get('/hapus/{id}', [AsetLaboran::class, 'destroy']);
        Route::get('/edit/{id}', [AsetLaboran::class, 'edit']);
        Route::post('/edit/{id}', [AsetLaboran::class, 'update']);
      });
    });
  });
  
  Route::middleware('keuangan')->group(function () {
    Route::prefix('keuangan')->group(function () {
      Route::get('/', [KeuanganController::class, 'index']);

      Route::prefix('/data_aset')->group(function () {
        Route::get('/', [AsetKeuangan::class, 'index']);
        Route::get('/hapus/{id}', [AsetKeuangan::class, 'destroy']);
        Route::get('/edit/{id}', [AsetKeuangan::class, 'edit']);
        Route::post('/edit/{id}', [AsetKeuangan::class, 'update']);
      });
    });
  });
  
  Route::middleware('wadek')->group(function () {
    Route::prefix('wadek')->group(function () {
      Route::get('/', [WadekController::class, 'index']);

      Route::prefix('/data_aset')->group(function () {
        Route::get('/', [AsetWadek::class, 'index']);
      });
    });
  });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
