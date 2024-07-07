@extends('layouts.main')

@section('main')
    <div class="bg-white p-10 rounded-lg">
        <div class="my-10">
            <h2 class="font-bold">Detail Pemesan</h2>
            <h3>Nomor Transaksi : {{ $nomor_transaksi }}</h3>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-300">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 border-b border-gray-300 text-left text-sm font-medium text-gray-700">
                            No</th>
                        <th class="px-6 py-3 border-b border-gray-300 text-left text-sm font-medium text-gray-700">
                            Nama Barang</th>
                        <th class="px-6 py-3 border-b border-gray-300 text-left text-sm font-medium text-gray-700">
                            Qty</th>
                        <th class="px-6 py-3 border-b border-gray-300 text-left text-sm font-medium text-gray-700">
                            Subtotal</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @forelse ($details as $barang)
                        <tr>
                            <td class="px-6 py-4 border-b border-gray-300 text-sm text-gray-700">
                                {{ $loop->iteration }}</td>
                            <td class="px-6 py-4 border-b border-gray-300 text-sm text-gray-700">{{ $barang->nm_barang }}
                            </td>
                            <td class="px-6 py-4 border-b border-gray-300 text-sm text-gray-700">{{ $barang->qty }}</td>
                            <td class="px-6 py-4 border-b border-gray-300 text-sm text-gray-700">{{ $barang->subtotal }}
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 border-b border-gray-300 text-sm text-gray-700 text-center">
                                Tidak ada data
                            </td>
                        </tr>
                        @endforelse
                        <tr class="font-bold text-lg">
                            <td colspan="3" class="px-6 py-4 border-b border-gray-300 text-sm text-gray-700">Subtotal</td>
                            <td class="px-6 py-4 border-b border-gray-300 text-sm text-gray-700">{{ $subTotal }}</td>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
