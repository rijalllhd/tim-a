<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormulirController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\TablesController;


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
})->middleware('guest');

Route::get('/dashboardadmin', [DashboardController::class, 'dashboardadmin'])->name('dashboardadmin')->middleware('auth');


Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::get('/dashboardadmin', [DashboardController::class, 'dashboardadmin'])->name('dashboardadmin')->middleware('auth');


Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/tables', [TablesController::class, 'tables'])->name('tables')->middleware('auth');

// Pasien 
Route::resource('pasienstable', 'PasiensTableController');

// Formulir pegawai ya
Route::get('/formulir', [FormulirController::class, 'formulir'])->name('formulir')->middleware('auth');
Route::post('/formulir/store', [FormulirController::class, 'store'])->name('store')->middleware('auth');
Route::post('/formulir/update', [FormulirController::class,'update'])->name('update')->middleware('auth');
Route::get('/formulir/hapus/{id}', [FormulirController::class, 'hapus'])->name('hapus')->middleware('auth');

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
