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
use App\Http\Controllers\Laboran\PeminjamanController as PeminjamanLaboran;
use App\Http\Controllers\Laboran\PengadaanController as PengadaanLaboran;
use App\Http\Controllers\Laboran\MaintenanceController as MaintenanceLaboran;

use App\Http\Controllers\Keuangan\KeuanganController;
use App\Http\Controllers\Keuangan\AsetController as AsetKeuangan;
use App\Http\Controllers\Keuangan\PengadaanController as PengadaanKeuangan;
use App\Http\Controllers\Keuangan\MaintenanceController as MaintenanceKeuangan;

use App\Http\Controllers\Wadek\WadekController;
use App\Http\Controllers\Wadek\AsetController as AsetWadek;
use App\Http\Controllers\Wadek\PengadaanController as PengadaanWadek;
use App\Http\Controllers\Wadek\MaintenanceController as MaintenanceWadek;
use App\Http\Controllers\Wadek\PeminjamanController as PeminjamanWadek;

use App\Http\Controllers\KaurLaboratorium\KaurLaboratoriumController;
use App\Http\Controllers\KaurLaboratorium\AsetController as AsetKaurLaboratorium;
use App\Http\Controllers\KaurLaboratorium\PengadaanController as PengadaanKaurLaboratorium;
use App\Http\Controllers\KaurLaboratorium\MaintenanceController as MaintenanceKaurLaboratorium;
use App\Http\Controllers\KaurLaboratorium\PeminjamanController as PeminjamanKaurLaboratorium;

use App\Http\Controllers\StaffKeuangan\StaffKeuanganController;
use App\Http\Controllers\StaffKeuangan\AsetController as AsetStaffKeuangan;
use App\Http\Controllers\StaffKeuangan\PengadaanController as PengadaanStaffKeuangan;
use App\Http\Controllers\StaffKeuangan\MaintenanceController as MaintenanceStaffKeuangan;

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
        Route::get('/print', [AsetController::class, 'print']);
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
        Route::get('/print', [PengadaanController::class, 'print']);
        Route::get('/print_history', [PengadaanController::class, 'printHistory']);
      });

      Route::prefix('/maintenance')->group(function () {
        Route::get('/', [MaintenanceController::class, 'index']);
        Route::get('/tambah', [MaintenanceController::class, 'create']);
        Route::post('/tambah', [MaintenanceController::class, 'store']);
        Route::get('/hapus/{id}', [MaintenanceController::class, 'destroy']);
        Route::get('/edit/{id}', [MaintenanceController::class, 'edit']);
        Route::post('/edit/{id}', [MaintenanceController::class, 'update']);
        Route::get('/history', [MaintenanceController::class, 'history']);
        Route::get('/print_history', [MaintenanceController::class, 'printHistory']);
        Route::get('/print', [MaintenanceController::class, 'print']);
      });

      Route::prefix('/peminjaman')->group(function () {
        Route::get('/', [PeminjamanController::class, 'index']);
        Route::get('/tambah', [PeminjamanController::class, 'create']);
        Route::post('/tambah', [PeminjamanController::class, 'store']);
        Route::get('/hapus/{id}', [PeminjamanController::class, 'destroy']);
        Route::get('/edit/{id}', [PeminjamanController::class, 'edit']);
        Route::post('/edit/{id}', [PeminjamanController::class, 'update']);
        Route::get('/history', [PeminjamanController::class, 'history']);
        Route::get('/print_history', [PeminjamanController::class, 'printHistory']);
        Route::get('/print', [PeminjamanController::class, 'print']);
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
        Route::get('/print', [AsetLaboran::class, 'print']);
      });

      Route::prefix('/peminjaman')->group(function () {
        Route::get('/', [PeminjamanLaboran::class, 'index']);
        Route::get('/tambah', [PeminjamanLaboran::class, 'create']);
        Route::post('/tambah', [PeminjamanLaboran::class, 'store']);
        Route::get('/hapus/{id}', [PeminjamanLaboran::class, 'destroy']);
        Route::get('/edit/{id}', [PeminjamanLaboran::class, 'edit']);
        Route::post('/edit/{id}', [PeminjamanLaboran::class, 'update']);
        Route::get('/history', [PeminjamanLaboran::class, 'history']);
        Route::get('/print', [PeminjamanLaboran::class, 'print']);
        Route::get('/print_history', [PeminjamanLaboran::class, 'printHistory']);
      });

      Route::prefix('/pengadaan')->group(function () {
        Route::get('/', [PengadaanLaboran::class, 'index']);
        Route::get('/tambah', [PengadaanLaboran::class, 'create']);
        Route::post('/tambah', [PengadaanLaboran::class, 'store']);
        Route::get('/hapus/{id}', [PengadaanLaboran::class, 'destroy']);
        Route::get('/edit/{id}', [PengadaanLaboran::class, 'edit']);
        Route::post('/edit/{id}', [PengadaanLaboran::class, 'update']);
        Route::get('/history', [PengadaanLaboran::class, 'history']);
        Route::get('/print_history', [PengadaanLaboran::class, 'printHistory']);
        Route::get('/print', [PengadaanLaboran::class, 'print']);
      });

      Route::prefix('/maintenance')->group(function () {
        Route::get('/', [MaintenanceLaboran::class, 'index']);
        Route::get('/tambah', [MaintenanceLaboran::class, 'create']);
        Route::post('/tambah', [MaintenanceLaboran::class, 'store']);
        Route::get('/hapus/{id}', [MaintenanceLaboran::class, 'destroy']);
        Route::get('/edit/{id}', [MaintenanceLaboran::class, 'edit']);
        Route::post('/edit/{id}', [MaintenanceLaboran::class, 'update']);
        Route::get('/history', [MaintenanceLaboran::class, 'history']);
        Route::get('/print_history', [MaintenanceLaboran::class, 'printHistory']);
        Route::get('/print', [MaintenanceLaboran::class, 'print']);
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
        Route::get('/print', [AsetKeuangan::class, 'print']);
      });

      Route::prefix('/pengadaan')->group(function () {
        Route::get('/', [PengadaanKeuangan::class, 'index']);
        Route::get('/hapus/{id}', [PengadaanKeuangan::class, 'destroy']);
        Route::get('/edit/{id}', [PengadaanKeuangan::class, 'edit']);
        Route::post('/edit/{id}', [PengadaanKeuangan::class, 'update']);
        Route::get('/{status}/{id}', [PengadaanKeuangan::class, 'updateStatus']);
        Route::get('/history', [PengadaanKeuangan::class, 'history']);
        Route::get('/print', [PengadaanKeuangan::class, 'print']);
        Route::get('/print_history', [PengadaanKeuangan::class, 'printHistory']);
      });

      Route::prefix('/maintenance')->group(function () {
        Route::get('/', [MaintenanceKeuangan::class, 'index']);
        Route::get('/tambah', [MaintenanceKeuangan::class, 'create']);
        Route::post('/tambah', [MaintenanceKeuangan::class, 'store']);
        Route::get('/hapus/{id}', [MaintenanceKeuangan::class, 'destroy']);
        Route::get('/edit/{id}', [MaintenanceKeuangan::class, 'edit']);
        Route::post('/edit/{id}', [MaintenanceKeuangan::class, 'update']);
        Route::get('/history', [MaintenanceKeuangan::class, 'history']);
        Route::get('/{status}/{id}', [MaintenanceKeuangan::class, 'updateStatus']);
        Route::get('/print_history', [MaintenanceKeuangan::class, 'printHistory']);
        Route::get('/print', [MaintenanceKeuangan::class, 'print']);
      });

      Route::prefix('/peminjaman')->group(function () {
        Route::get('/', [PeminjamanKeuangan::class, 'index']);
        Route::get('/history', [PeminjamanKeuangan::class, 'history']);
        Route::get('/{status}/{id}', [PeminjamanKeuangan::class, 'updateStatus']);
        Route::get('/print_history', [MaintenanceKeuangan::class, 'printHistory']);
      });
    });
  });
  
  Route::middleware('staff_keuangan')->group(function () {
    Route::prefix('staff_keuangan')->group(function () {
      Route::get('/', [StaffKeuanganController::class, 'index']);

      Route::prefix('/data_aset')->group(function () {
        Route::get('/', [AsetStaffKeuangan::class, 'index']);
        Route::get('/hapus/{id}', [AsetStaffKeuangan::class, 'destroy']);
        Route::get('/edit/{id}', [AsetStaffKeuangan::class, 'edit']);
        Route::post('/edit/{id}', [AsetStaffKeuangan::class, 'update']);
        Route::get('/print', [AsetStaffKeuangan::class, 'print']);
        Route::get('/tambah', [AsetStaffKeuangan::class, 'create']);
        Route::post('/tambah', [AsetStaffKeuangan::class, 'store']);
      });

      Route::prefix('/pengadaan')->group(function () {
        Route::get('/', [PengadaanStaffKeuangan::class, 'index']);
        Route::get('/hapus/{id}', [PengadaanStaffKeuangan::class, 'destroy']);
        Route::get('/edit/{id}', [PengadaanStaffKeuangan::class, 'edit']);
        Route::post('/edit/{id}', [PengadaanStaffKeuangan::class, 'update']);
        Route::get('/{status}/{id}', [PengadaanStaffKeuangan::class, 'updateStatus']);
        Route::get('/history', [PengadaanStaffKeuangan::class, 'history']);
        Route::get('/print', [PengadaanStaffKeuangan::class, 'print']);
        Route::get('/print_history', [PengadaanStaffKeuangan::class, 'printHistory']);
        Route::get('/tambah', [PengadaanStaffKeuangan::class, 'create']);
        Route::post('/tambah', [PengadaanStaffKeuangan::class, 'store']);
      });

      Route::prefix('/maintenance')->group(function () {
        Route::get('/', [MaintenanceStaffKeuangan::class, 'index']);
        Route::get('/tambah', [MaintenanceStaffKeuangan::class, 'create']);
        Route::post('/tambah', [MaintenanceStaffKeuangan::class, 'store']);
        Route::get('/hapus/{id}', [MaintenanceStaffKeuangan::class, 'destroy']);
        Route::get('/edit/{id}', [MaintenanceStaffKeuangan::class, 'edit']);
        Route::post('/edit/{id}', [MaintenanceStaffKeuangan::class, 'update']);
        Route::get('/history', [MaintenanceStaffKeuangan::class, 'history']);
        Route::get('/{status}/{id}', [MaintenanceStaffKeuangan::class, 'updateStatus']);
        Route::get('/print_history', [MaintenanceStaffKeuangan::class, 'printHistory']);
        Route::get('/print', [MaintenanceStaffKeuangan::class, 'print']);
      });

      Route::prefix('/peminjaman')->group(function () {
        Route::get('/', [PeminjamanKeuangan::class, 'index']);
        Route::get('/history', [PeminjamanKeuangan::class, 'history']);
        Route::get('/{status}/{id}', [PeminjamanKeuangan::class, 'updateStatus']);
        Route::get('/print_history', [MaintenanceKeuangan::class, 'printHistory']);
      });
    });
  });
  
  Route::middleware('wadek')->group(function () {
    Route::prefix('wadek')->group(function () {
      Route::get('/', [WadekController::class, 'index']);

      Route::prefix('/data_aset')->group(function () {
        Route::get('/', [AsetWadek::class, 'index']);
        Route::get('/print', [AsetWadek::class, 'print']);
      });

      Route::prefix('/pengadaan')->group(function () {
        Route::get('/', [PengadaanWadek::class, 'index']);
        Route::get('/update_status/{status}/{id}', [PengadaanWadek::class, 'updateStatus']);
        Route::get('/history', [PengadaanWadek::class, 'history']);
        Route::get('/print', [PengadaanWadek::class, 'print']);
        Route::get('/print_history', [PengadaanWadek::class, 'printHistory']);
        Route::get('/edit/{id}', [PengadaanWadek::class, 'edit']);
        Route::post('/edit/{id}', [PengadaanWadek::class, 'update']);
        Route::get('/hapus/{id}', [PengadaanWadek::class, 'destroy']);
      });

      Route::prefix('/maintenance')->group(function () {
        Route::get('/', [MaintenanceWadek::class, 'index']);
        Route::get('/{status}/{id}', [MaintenanceWadek::class, 'updateStatus']);
        Route::get('/history', [MaintenanceWadek::class, 'history']);
        Route::get('/print_history', [MaintenanceWadek::class, 'printHistory']);
        Route::get('/print', [MaintenanceWadek::class, 'print']);
      });
    });
  });
  
  Route::middleware('KaurLaboratorium')->group(function () {
    Route::prefix('kaur_laboratorium')->group(function () {
      Route::get('/', [KaurLaboratoriumController::class, 'index']);

      Route::prefix('/data_aset')->group(function () {
        Route::get('/', [AsetKaurLaboratorium::class, 'index']);
        Route::get('/hapus/{id}', [AsetKaurLaboratorium::class, 'destroy']);
        Route::get('/edit/{id}', [AsetKaurLaboratorium::class, 'edit']);
        Route::post('/edit/{id}', [AsetKaurLaboratorium::class, 'update']);
        Route::get('/tambah', [AsetKaurLaboratorium::class, 'create']);
        Route::post('/tambah', [AsetKaurLaboratorium::class, 'store']);
        Route::get('/print', [AsetKaurLaboratorium::class, 'print']);
      });

      Route::prefix('/pengadaan')->group(function () {
        Route::get('/', [PengadaanKaurLaboratorium::class, 'index']);
        Route::get('/tambah', [PengadaanKaurLaboratorium::class, 'create']);
        Route::post('/tambah', [PengadaanKaurLaboratorium::class, 'store']);
        Route::get('/hapus/{id}', [PengadaanKaurLaboratorium::class, 'destroy']);
        Route::get('/edit/{id}', [PengadaanKaurLaboratorium::class, 'edit']);
        Route::post('/edit/{id}', [PengadaanKaurLaboratorium::class, 'update']);
        Route::get('/history', [PengadaanKaurLaboratorium::class, 'history']);
        Route::get('/{status}/{id}', [PengadaanKaurLaboratorium::class, 'updateStatus']);
      });

      Route::prefix('/maintenance')->group(function () {
        Route::get('/', [MaintenanceKaurLaboratorium::class, 'index']);
        Route::get('/tambah', [MaintenanceKaurLaboratorium::class, 'create']);
        Route::post('/tambah', [MaintenanceKaurLaboratorium::class, 'store']);
        Route::get('/hapus/{id}', [MaintenanceKaurLaboratorium::class, 'destroy']);
        Route::get('/edit/{id}', [MaintenanceKaurLaboratorium::class, 'edit']);
        Route::post('/edit/{id}', [MaintenanceKaurLaboratorium::class, 'update']);
        Route::get('/history', [MaintenanceKaurLaboratorium::class, 'history']);
        Route::get('/{status}/{id}', [MaintenanceKaurLaboratorium::class, 'updateStatus']);
        Route::get('/print_history', [MaintenanceKaurLaboratorium::class, 'printHistory']);
      });

      Route::prefix('/peminjaman')->group(function () {
        Route::get('/', [PeminjamanKaurLaboratorium::class, 'index']);
        Route::get('/tambah', [PeminjamanKaurLaboratorium::class, 'create']);
        Route::post('/tambah', [PeminjamanKaurLaboratorium::class, 'store']);
        Route::get('/hapus/{id}', [PeminjamanKaurLaboratorium::class, 'destroy']);
        Route::get('/edit/{id}', [PeminjamanKaurLaboratorium::class, 'edit']);
        Route::post('/edit/{id}', [PeminjamanKaurLaboratorium::class, 'update']);
        Route::get('/history', [PeminjamanKaurLaboratorium::class, 'history']);
        Route::get('/{status}/{id}', [PeminjamanKaurLaboratorium::class, 'updateStatus']);
        Route::get('/print_history', [PeminjamanKaurLaboratorium::class, 'printHistory']);
      });
    });
  });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
