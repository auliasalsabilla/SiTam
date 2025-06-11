<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\IzinController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [AbsensiController::class, 'scan'])->name('scan');
Route::get('/dashboard', [AbsensiController::class, 'dashboard'])->name('dashboard');
Route::post('/izin/store', [IzinController::class, 'store'])->name('izin.store');
Route::post('/lihat-pengajuan', [IzinController::class, 'index'])->name('izin.lihat');
Route::get('/laporan', [AbsensiController::class, 'laporan'])->name('laporan');
Route::get('/cuti', [AbsensiController::class, 'cuti'])->name('cuti');
Route::get('/admin', [AbsensiController::class, 'admin'])->name('admin');