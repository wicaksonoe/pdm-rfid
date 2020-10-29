<?php

use App\Http\Controllers\DosenController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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
    return redirect()->route('absensi.index');
});

Route::name('auth.')->group(function () {
    Route::get('/login', [App\Http\Controllers\AuthController::class, 'index'])->name('index');
    Route::post('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login');
    Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::resource('/dosen', App\Http\Controllers\DosenController::class, ['except' => ['create', 'edit']]);
    Route::resource('/matkul', App\Http\Controllers\MatkulController::class, ['except' => ['create', 'edit']]);
    Route::resource('/jadwal', App\Http\Controllers\JadwalController::class, ['except' => ['create', 'edit']]);
    Route::resource('/absensi', App\Http\Controllers\AbsensiController::class, ['except' => ['create', 'edit']]);

    Route::get('/table/dosen', [App\Http\Controllers\DosenController::class, 'dataTable'])->name('table.Mdosens');
    Route::get('/table/Matkul', [App\Http\Controllers\MatkulController::class, 'dataTable'])->name('table.Matkul');
    Route::get('/table/jadwal', [App\Http\Controllers\JadwalController::class, 'dataTable'])->name('table.Jadwal');
    Route::get('/table/absensi', [App\Http\Controllers\AbsensiController::class, 'dataTable'])->name('table.Absensi');
});
