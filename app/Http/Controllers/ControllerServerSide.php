<?php

namespace App\Http\Controllers;

use App\Models\Transaksi_h;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ControllerServerSide extends Controller
{

    public function serverSide(Request $request)
    {

        if ($request->ajax()) {
            $data = Transaksi_h::with('pemesan')->latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('nomor_transaksi', function ($data) {
                    return $data->nomor_transaksi;
                })
                ->addColumn('customer', function ($data) {
                    return $data->pemesan->nama;
                })
                ->addColumn('total_harga', function ($data) {
                    return $data->total_harga;
                })
                ->addColumn('action', function ($data) {

                    $detailPemesan  = '/detail-pemesan/detail?nomor_transaksi=' .  $data->nomor_transaksi;
                    return ' <a href="" class="text-blue-600 hover:text-blue-800">Edit</a> |
                                <a href="#" class="text-red-600 hover:text-red-800">Hapus</a>|
                                 <a href="' . $detailPemesan . '" class="text-yellow-600 hover:text-yellow-800">Detail</a>';
                })
                ->make(true);
        }
        return view('index', [
            'detailPemesan' => '',
        ]);
    }
}
