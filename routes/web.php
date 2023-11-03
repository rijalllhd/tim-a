<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ComponentsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ChartsController;
use App\Http\Controllers\UtilitiesController;

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

Route::get('/coba', function() {
    return view('layouts.main');
})->middleware('auth');

Route::get('/dashboard', [DashboardController::class, 'dashboard', [ "title"=>"dashboard"]])->name('dashboard')->middleware('auth');

Route::get('/buttons', [ComponentsController::class, 'buttons'])->name('buttons')->middleware('auth');
Route::get('/buttons', [ComponentsController::class, 'buttons'])->name('buttons')->middleware('auth');
Route::get('/cards', [ComponentsController::class, 'cards'])->name('cards')->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/charts', [ChartsController::class, 'charts'])->name('charts')->middleware('auth');

Route::get('/tables', function() {
    return view('tables.index');
})->name('tables')->middleware('auth');

Route::get('/utilities-color', [UtilitiesController::class, 'utilitiescolor'])->name('utilities-color')->middleware('auth');
Route::get('/utilities-border', [UtilitiesController::class, 'utilitiesborder'])->name('utilities-border')->middleware('auth');
Route::get('/utilities-other', [UtilitiesController::class, 'utilitiesother'])->name('utilities-other')->middleware('auth');
Route::get('/utilities-animation', [UtilitiesController::class, 'utilitiesanimation'])->name('utilities-animation')->middleware('auth');
