<?php

use App\Http\Controllers\TransaksiController;
use App\Models\Transaksi_h;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index', [
        'detailPemesan' => Transaksi_h::with('pemesan')->get(),
    ]);
});

Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi');
