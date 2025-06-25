<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AbsensiController;
<<<<<<< HEAD
=======
use App\Http\Controllers\IzinController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\ApiAbsensiController;

>>>>>>> 422612dd441f886530c363ea23817141e2787b01

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [AbsensiController::class, 'scan'])->name('scan');
Route::get('/dashboard', [AbsensiController::class, 'dashboard'])->name('dashboard');
Route::get('/laporan', [AbsensiController::class, 'laporan'])->name('laporan');
Route::get('/cuti', [AbsensiController::class, 'cuti'])->name('cuti');
<<<<<<< HEAD
Route::get('/admin', [AbsensiController::class, 'admin'])->name('admin');
=======
Route::get('/admin', [AbsensiController::class, 'admin'])->name('admin');
Route::post('/karyawan/store', [KaryawanController::class, 'store'])->name('karyawan.store');
Route::post('/api/absen', [ApiAbsensiController::class, 'store']);
>>>>>>> 422612dd441f886530c363ea23817141e2787b01
