<?php

use GuzzleHttp\Middleware;
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

Route::resource('register_user', \App\Http\Controllers\Admin\RegisterUserController::class);

// Route::middleware(['auth:sanctum', 'verified', 'activated'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
Route::group(['middleware' => 'auth:sanctum', 'verified', 'activated'], function () {
    Route::resource('dashboard', \App\Http\Controllers\DashboardController::class);
});

Route::group(['middleware' => 'auth'], function () {
    Route::group(
        ['middleware' => 'role:pemodal', 'prefix' => 'pemodal', 'as' => 'pemodal.'],
        function () {
            Route::resource('hewans', \App\Http\Controllers\Pemodals\PemodalHewanController::class);
            Route::resource('items', \App\Http\Controllers\Pemodals\PemodalItemController::class);
            Route::resource('riwayats', \App\Http\Controllers\Pemodals\PemodalRiwayatController::class);
        }
    );
    Route::group(
        ['middleware' => 'role:pengadas', 'prefix' => 'pengadas', 'as' => 'pengadas.'],
        function () {
            Route::resource('hewans', \App\Http\Controllers\Pengadas\PengadasHewanController::class);
            Route::resource('riwayats', \App\Http\Controllers\Pengadas\PengadasRiwayatController::class);
        }
    );
    Route::group(
        ['middleware' => 'role:admin', 'prefix' => 'admin', 'as' => 'admin.'],
        function () {
            Route::resource('users', \App\Http\Controllers\Admin\AdminUserController::class);
            Route::resource('rekenings', \App\Http\Controllers\Admin\AdminRekeningController::class);
            Route::resource('hewans', \App\Http\Controllers\Admin\AdminHewanController::class);
            Route::resource('transaksis', \App\Http\Controllers\Admin\AdminTransaksiController::class);
            Route::resource('riwayat_hewans', \App\Http\Controllers\Admin\AdminRiwayatController::class);
            Route::resource('laporans', \App\Http\Controllers\Admin\AdminLaporanController::class);
            Route::resource('transfers', \App\Http\Controllers\Admin\AdminTransferController::class);
        }
    );
});
