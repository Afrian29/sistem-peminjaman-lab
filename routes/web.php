<?php

use App\Http\Controllers\AslabController;
use App\Http\Controllers\MahasiswaController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('beranda',[MahasiswaController::class, 'beranda']);
Route::get('pengajuan',[AslabController::class, 'pengajuan']);