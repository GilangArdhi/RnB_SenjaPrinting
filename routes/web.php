<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\DataProduk;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'login']);
Route::post('/edit', [DataProduk::class, 'edit']);
Route::post('/tolak', [DataProduk::class, 'tolak']);
Route::post('store', [DataProduk::class, 'store']);
Route::post('/masuk', [PageController::class, 'masuk'])->name('masuk');
Route::get('keterangan', [PageController::class, 'keterangan'] );

Route::middleware(['auth', 'role:customer service'])->group(function () {
    Route::get('cs', [PageController::class, 'index']);
});

Route::middleware(['auth', 'role:produksi'])->group(function () {
    Route::get('produksi', [PageController::class, 'produksiPage'] );
});

Route::middleware(['auth', 'role:quality control'])->group(function () {
    Route::get('qc', [PageController::class, 'qualityControl'] );
});

Route::middleware(['auth', 'role:package'])->group(function () {
    Route::get('package', [PageController::class, 'packaging'] );
});

Route::middleware(['auth', 'role:pengiriman'])->group(function () {
    Route::get('pengiriman', [PageController::class, 'pengiriman'] );
});