<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ChartsController;
use App\Http\Controllers\UtilitiesController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\TablesController;
use App\Http\Controllers\PemeriksaanController;


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
    return view('login.index');
});

Route::get('/dashboardadmin', [DashboardController::class, 'dashboardadmin'])->name('dashboardadmin')->middleware('auth');


Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::get('/dashboardadmin', [DashboardController::class, 'dashboardadmin'])->name('dashboardadmin')->middleware('auth');


Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/charts', [ChartsController::class, 'charts'])->name('charts')->middleware('auth');

Route::get('/tables', function() {
    return view('tables.index');
})->name('tables')->middleware('auth');

// Pasien 
Route::resource('pasienstable', 'PasiensTableController');

// Pegawai pegawai ya
Route::get('/pegawai', [PegawaiController::class, 'formulir'])->name('pegawai')->middleware('auth');
Route::post('/pegawai/store', [PegawaiController::class, 'store'])->name('store')->middleware('auth');
Route::post('/pegawai/update', [PegawaiController::class,'update'])->name('update')->middleware('auth');
Route::get('/pegawai/hapus/{id}', [PegawaiController::class, 'hapus'])->name('hapus')->middleware('auth');

// pengguna pegawai ya
Route::get('/pengguna', [PenggunaController::class, 'pengguna'])->name('pengguna')->middleware('auth');
Route::post('/pengguna/store', [PenggunaController::class, 'store'])->name('store')->middleware('auth');
Route::post('/pengguna/update', [PenggunaController::class,'update'])->name('update')->middleware('auth');
Route::get('/pengguna/hapus/{id}', [PenggunaController::class, 'hapus'])->name('hapus')->middleware('auth');

// Untuk Dokter ya
Route::get('/dokter', [DokterController::class, 'dokter'])->name('dokter')->middleware('auth');
Route::post('/dokter/store', [DokterController::class, 'store'])->name('store')->middleware('auth');
Route::post('/dokter/update', [DokterController::class, 'update'])->name('update')->middleware('auth');
Route::get('/dokter/hapus/{id}', [DokterController::class, 'hapus'])->name('hapus')->middleware('auth');

// Tabel Pemeriksaan
Route::get('/pemeriksaan', [PemeriksaanController::class, 'pemeriksaan'])->name('pemeriksaan')->middleware('auth');
Route::post('/pemeriksaan/store', [PemeriksaanController::class, 'store'])->name('store')->middleware('auth');
Route::post('/pemeriksaan/update', [PemeriksaanController::class, 'update'])->name('update')->middleware('auth');
Route::get('/pemeriksaan/hapus/{id}', [PemeriksaanController::class, 'hapus'])->name('hapus')->middleware('auth');


Route::get('/utilities-color', [UtilitiesController::class, 'utilitiescolor'])->name('utilities-color')->middleware('auth');
Route::get('/utilities-border', [UtilitiesController::class, 'utilitiesborder'])->name('utilities-border')->middleware('auth');
Route::get('/utilities-other', [UtilitiesController::class, 'utilitiesother'])->name('utilities-other')->middleware('auth');
Route::get('/utilities-animation', [UtilitiesController::class, 'utilitiesanimation'])->name('utilities-animation')->middleware('auth');
