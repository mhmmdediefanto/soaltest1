@extends('layouts.main')

@section('main')
    <div class="w-full p-20 bg-white rounded-xl shadow-sm">
        <h2 class="uppercase text-3xl font-bold mb-5">transaksi penjualan</h2>
        <p class="font-bold text-slate-700 mb-2">Filter tanggal transaksi</p>


        <div class="flex justify-between items-center">
            <div>
                <form id="filter-form">
                    @csrf
                    <input type="date" name="tanggal_awal" id="tanggal_awal" class="w-[220px] py-2 px-5 border border-gray-300 rounded-lg" placeholder="Tanggal Awal">
                    <span class="font-bold me-2 ml-2">sd</span>
                    <input type="date" name="tanggal_akhir" id="tanggal_akhir" class="py-2 px-5 border border-gray-300 rounded-lg w-[220px]" placeholder="Tanggal Akhir">
                    <button id="filter-btn" class="py-2 bg-blue-600 px-3 rounded-lg ml-3" type="button">
                        <i class="bi bi-hourglass-split text-xl text-white"></i> Filter
                    </button>
                </form>
            </div>
            <div>
                <a href="/transaksi" class="bg-blue-600 text-white px-3 py-2 rounded-lg flex items-center "><i
                        class="bi bi-plus-circle text-white  me-2"></i>
                    Tambah Transaksi</a>
            </div>
        </div>


        <div class="flex  itemes-center justify-end w-full mt-10">
            <div>
                <button class="bg-blue-600 text-white px-3 py-2 rounded-lg flex items-center"><i
                        class="bi bi-filetype-xlsx  me-2"></i>Export Excel</button>
            </div>

        </div>

        {{-- table --}}
        <div class="mt-10">
            <table class="mt-4 w-full min-w-max table-auto text-left" id="serverside">
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

                </tbody>
            </table>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            loadDataTable();
        })

        function loadDataTable() {
            $('#serverside').DataTable({
                processing: true,
                pagination: true,
                responsive: false,
                serverSide: true,
                searching: true,
                ajax: {
                    url: "{{ route('api-server-side') }}",
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                    },
                    {
                        data: 'nomor_transaksi',
                        name: 'nomor_transaksi'
                    },
                    {
                        data: 'customer',
                        name: 'customer'
                    },
                    {
                        data: 'total_harga',
                        name: 'total_harga'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    },
                ]
            })
        }
    </script>
@endsection
