<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AsetController;
use App\Http\Controllers\Admin\UserController;

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
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
