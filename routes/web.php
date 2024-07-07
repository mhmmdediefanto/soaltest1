<?php


use App\Http\Controllers\ControllerServerSide;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ControllerServerSide::class, 'serverSide'])->name('api-server-side');

Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi');
Route::get('/detail-pemesan/detail', [TransaksiController::class, 'detailPemesan'])->name('detail-pemesan');
