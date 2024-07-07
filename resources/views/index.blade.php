@extends('layouts.main')

@section('main')
    <div class="w-full p-20 bg-white rounded-xl shadow-sm">
        <h2 class="uppercase text-3xl font-bold mb-5">transaksi penjualan</h2>
        <p class="font-bold text-slate-700 mb-2">Filter tanggal transaksi</p>


        <div class="flex justify-between items-center">
            <div>
                <input type="date" name="tanggal_awal" id="tanggal_awal"
                    class= " w-[220px] py-2 px-5 border border-gray-300 rounded-lg" placeholder="datePicker"> <span
                    class="font-bold me-2 ml-2">sd</span>
                <input type="date" name="tanggal_akhir" id="tanggal_awal"
                    class="py-2 px-5 border border-gray-300 rounded-lg w-[220px]" placeholder="datePicker">
                <button class="py-2 bg-blue-600 px-3 rounded-lg ml-3"><i
                        class="bi bi-hourglass-split text-xl text-white"></i></button>
            </div>
            <div>
                <a href="/transaksi" class="bg-blue-600 text-white px-3 py-2 rounded-lg flex items-center "><i
                        class="bi bi-plus-circle text-white  me-2"></i>
                    Tambah Transaksi</a>
            </div>
        </div>


        <div class="flex justify-between items-center w-full mt-10">
            <div>
                <input type="text" name="tanggal_awal" id="tanggal_awal"
                    class="w-[220px] py-2 px-5 border border-gray-300 rounded-lg" placeholder="search"> <span
                    class="font-bold me-2 ml-2">
            </div>
            <div>
                <button class="bg-blue-600 text-white px-3 py-2 rounded-lg flex items-center"><i
                        class="bi bi-filetype-xlsx  me-2"></i>Export Exel</button>
            </div>

        </div>

        {{-- table --}}
        <div class="mt-10">
            <table class="mt-4 w-full min-w-max table-auto text-left">
                <thead>
                    <tr>
                        <th
                            class="cursor-pointer border-y border-blue-gray-100 bg-blue-gray-50/50 p-4 transition-colors hover:bg-blue-gray-50">
                            <p
                                class="antialiased font-sans text-sm text-blue-gray-900 flex items-center justify-between gap-2 font-normal leading-none opacity-70">
                                No <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" aria-hidden="true" class="h-4 w-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"></path>
                                </svg>
                            </p>
                        </th>
                        <th
                            class="cursor-pointer border-y border-blue-gray-100 bg-blue-gray-50/50 p-4 transition-colors hover:bg-blue-gray-50">
                            <p
                                class="antialiased font-sans text-sm text-blue-gray-900 flex items-center justify-between gap-2 font-normal leading-none opacity-70">
                                Nomor Transaksi <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" aria-hidden="true" class="h-4 w-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"></path>
                                </svg>
                            </p>
                        </th>
                        <th
                            class="cursor-pointer border-y border-blue-gray-100 bg-blue-gray-50/50 p-4 transition-colors hover:bg-blue-gray-50">
                            <p
                                class="antialiased font-sans text-sm text-blue-gray-900 flex items-center justify-between gap-2 font-normal leading-none opacity-70">
                                Customer <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" aria-hidden="true" class="h-4 w-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"></path>
                                </svg>
                            </p>
                        </th>
                        <th
                            class="cursor-pointer border-y border-blue-gray-100 bg-blue-gray-50/50 p-4 transition-colors hover:bg-blue-gray-50">
                            <p
                                class="antialiased font-sans text-sm text-blue-gray-900 flex items-center justify-between gap-2 font-normal leading-none opacity-70">
                                Total Transaksi <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" aria-hidden="true" class="h-4 w-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"></path>
                                </svg>
                            </p>
                        </th>
                        <th
                            class="cursor-pointer border-y border-blue-gray-100 bg-blue-gray-50/50 p-4 transition-colors hover:bg-blue-gray-50">
                            <p
                                class="antialiased font-sans text-sm text-blue-gray-900 flex items-center justify-between gap-2 font-normal leading-none opacity-70">
                                Actions</p>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detailPemesan as $detail)
                        <tr>
                            <td class="p-4 border-b border-blue-gray-50">
                                <div class="flex items-center gap-3">
                                    <p>{{ $loop->iteration }}</p>
                                </div>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50">
                                <div class="flex items-center gap-3">
                                    <div class="flex flex-col">
                                        <p
                                            class="block antialiased font-sans text-sm leading-normal text-blue-gray-900 font-normal">
                                            {{ $detail->nomor_transaksi }}</p>

                                    </div>
                                </div>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50">
                                <div class="flex items-center gap-3">
                                    <div class="flex flex-col">
                                        <p
                                            class="block antialiased font-sans text-sm leading-normal text-gray-900 font-normal">
                                            {{ $detail->pemesan->nama }}
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50">
                                <div class="flex flex-col">
                                    <p
                                        class="block antialiased font-sans text-sm leading-normal text-blue-gray-900 font-normal">
                                        {{ $detail->total_harga }}</p>

                                </div>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50">
                                <a href="#" class="text-blue-600 hover:text-blue-800">Edit</a> |
                                <a href="#" class="text-red-600 hover:text-red-800">Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
