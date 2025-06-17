<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiAbsensiController;

Route::post('/absen', [ApiAbsensiController::class, 'store']);
