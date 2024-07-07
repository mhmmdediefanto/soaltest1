<?php

namespace App\Http\Controllers;

use App\Models\Ms_customer;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        return view('transaksi');
    }
}
