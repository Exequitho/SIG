<?php

use App\Http\Controllers\RegenciesController;
use App\Http\Controllers\PetaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/beranda', function () {
    return view('beranda');
});

Route::get('/gempa', function () {
    return view('gempa');
});

Route::get('/peta',[PetaController::class, 'index'])->name('peta');

Route::get('/populasi', function () {
    return view('populasi');
});

Route::get('/regencies', [RegenciesController::class, 'index'])->name('regencies');

Route::get('/persebaranpenduduk', function () {
    return view('persebaranpenduduk');
});