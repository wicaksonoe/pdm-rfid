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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/dosen','App\Http\Controllers\DosenController');
Route::resource('/matkul','App\Http\Controllers\MatkulController');
Route::resource('/jadwal','App\Http\Controllers\JadwalController');
Route::resource('/absensi','App\Http\Controllers\AbsensiController');

Route::get('/table/dosen', 'App\Http\Controllers\DosenController@dataTable')->name('table.Mdosens');
Route::get('/table/Matkul', 'App\Http\Controllers\MatkulController@dataTable')->name('table.Matkul');
Route::get('/table/jadwal', 'App\Http\Controllers\JadwalController@dataTable')->name('table.Jadwal');
Route::get('/table/absensi', 'App\Http\Controllers\AbsensiController@dataTable')->name('table.Absensi');
