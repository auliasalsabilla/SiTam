<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AbsensiController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [AbsensiController::class, 'scan'])->name('scan');
Route::get('/dashboard', [AbsensiController::class, 'dashboard'])->name('dashboard');
Route::get('/laporan', [AbsensiController::class, 'laporan'])->name('laporan');
Route::get('/cuti', [AbsensiController::class, 'cuti'])->name('cuti');
Route::get('/admin', [AbsensiController::class, 'admin'])->name('admin');