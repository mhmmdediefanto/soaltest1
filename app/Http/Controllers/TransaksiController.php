<?php

namespace App\Http\Controllers;

use App\Models\DetailPemesan;

use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        return view('transaksi');
    }

    public function detailPemesan(Request $request)
    {

        $nomor_transaksi = $request->query('nomor_transaksi');
        $detail = DetailPemesan::where('nomor_transaksi', $nomor_transaksi)->get();
        // dd($detail);
        $subTotal = $detail->sum('subtotal');
        return view('detail-pemesan',[
            'details' => $detail,
            'nomor_transaksi' => $nomor_transaksi,
            'subTotal' => $subTotal
        ]);
    }
}
