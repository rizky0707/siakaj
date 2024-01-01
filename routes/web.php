<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UstadzController;
use App\Http\Controllers\AcaraController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('admin/ustadz', UstadzController::class)->middleware('auth');
Route::resource('admin/acara', AcaraController::class)->middleware('auth');
Route::resource('admin/peserta', PesertaController::class)->middleware('auth');
Route::resource('admin/absensi', AbsensiController::class)->middleware('auth');
Route::get('admin/laporan_absen', [AbsensiController::class, 'indexLaporan'])->name('indexLaporan')->middleware('auth');
Route::get('absensi/export/', [App\Http\Controllers\AbsensiController::class, 'export'])->name('absensi.export');
Route::get('admin/profile/', [App\Http\Controllers\HomeController::class, 'profile'])->name('admin.profile');
Route::post('peserta', [PesertaController::class, 'import'])->name('peserta.import');
Route::post('absensi', [AbsensiController::class, 'import'])->name('absensi.import');
Route::get('admin/user/index', [UserController::class, 'index'])->name('user.index');