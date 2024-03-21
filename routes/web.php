<?php

use Illuminate\Support\Facades\Route;

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

Route::resource('users', \App\Http\Controllers\UserController::class)->middleware('auth');

Route::get('/karyawan', [App\Http\Controllers\KaryawanController::class, 'index'])->name('karyawan.index')->middleware('auth');
Route::get('/karyawan/create', [App\Http\Controllers\KaryawanController::class, 'create'])->name('karyawan.create')->middleware('auth');
Route::post('/karyawan/store', [App\Http\Controllers\KaryawanController::class, 'store'])->name('karyawan.store')->middleware('auth');
Route::get('/karyawan/edit/{id}', [App\Http\Controllers\KaryawanController::class, 'edit'])->name('karyawan.edit')->middleware('auth');
Route::post('/karyawan/update', [App\Http\Controllers\KaryawanController::class, 'update'])->name('karyawan.update')->middleware('auth');
Route::delete('/karyawan/delete/{id}', [App\Http\Controllers\KaryawanController::class, 'destroy'])->name('karyawan.delete')->middleware('auth');

Route::resource('pelanggan', \App\Http\Controllers\PelangganController::class)->middleware('auth');

Route::resource('profile', \App\Http\Controllers\ProfileController::class)->middleware('auth');

Route::resource('paketWisata', \App\Http\Controllers\PaketWisataController::class)->middleware('auth');

Route::get('/daftarPaket', [App\Http\Controllers\DaftarPaketController::class, 'index'])->name('daftarPaket.index')->middleware('auth');
Route::get('/daftarPaket/create', [App\Http\Controllers\DaftarPaketController::class, 'create'])->name('daftarPaket.create')->middleware('auth');
Route::post('/daftarPaket/store', [App\Http\Controllers\DaftarPaketController::class, 'store'])->name('daftarPaket.store')->middleware('auth');
Route::get('/daftarPaket/edit/{id}', [App\Http\Controllers\DaftarPaketController::class, 'edit'])->name('daftarPaket.edit')->middleware('auth');
Route::post('/daftarPaket/update', [App\Http\Controllers\DaftarPaketController::class, 'update'])->name('daftarPaket.update')->middleware('auth');
Route::delete('/daftarPaket/delete/{id}', [App\Http\Controllers\DaftarPaketController::class, 'destroy'])->name('daftarPaket.delete')->middleware('auth');


Route::resource('reservasi', \App\Http\Controllers\ReservasiController::class)->middleware('auth');

Route::resource('reservasiOperator', \App\Http\Controllers\ReservasiOperatorController::class)->middleware('auth');

Route::resource('laporan', \App\Http\Controllers\LaporanController::class)->middleware('auth');

Route::get('/exportpdf', [App\Http\Controllers\LaporanController::class, 'exportpdf'])->name('exportpdf');

Route::get('/search', [App\Http\Controllers\LaporanController::class, 'search'])->name('search');