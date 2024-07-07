<div>
    <h2 class="uppercase text-3xl font-bold mb-5">form transaksi</h2>


    <div class="w-full  border-b-2 border-slate-700 pb-8">
        <div class="mt-3">
            <label for="no_transaksi" class="font-bold text-slate-600 mb-2">Nomor Transaksi</label>
            <input type="text" name="nomor_transaksi" class="block font-bold hover:cursor-not-allowed" id="no_transaksi"
                value="{{ $transactionNumber }}" readonly>
        </div>
        <div class="mt-3">
            <label for="tgl_transaksi" class="font-bold text-slate-600 mb-3 block">Tanggal Transaksi</label>
            <input type="date" name="tanggal_awal" id="tanggal_awal" wire:model="tanggal_transaksi"
                class= " w-[220px] py-2 px-5 border border-gray-300 rounded-lg" placeholder="datePicker">
        </div>
    </div>

    <div class="mt-6 w-full  border-b-2 border-slate-700 pb-8">
        <div class="mb-3">
            <label for="customer" class="block font-medium text-gray-700">Pilih Customer</label>
            <select wire:model.live="selectedCustomerId"
                class="mt-1 block w-[220px] py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option>Option Customer</option>
                @foreach ($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->nama }}</option>
                @endforeach
            </select>

            {{-- <div>
                Selected Customer ID: @json($selectedCustomerId)
            </div> --}}
        </div>
        <div>
            <p class="font-semibold capitalize text-slate-700">data customer</p>
            <div class="flex items-center ">
                <div>
                    <input type="text" name="nama" id="nama" readonly 
                        class="w-[220px] py-2 px-5 border border-gray-300 rounded-lg hover:cursor-not-allowed" placeholder="Nama"
                        value="{{ $selectedCustomer->nama ?? '' }}"> <span class="font-bold me-2 ml-2" >
                </div>
                <div>
                    <input type="text" name="alamat" id="alamat" readonly
                        class="w-[220px] py-2 px-5 border border-gray-300 rounded-lg hover:cursor-not-allowed" placeholder="Alamat"
                        value="{{ $selectedCustomer->alamat ?? '' }}"> <span class="font-bold me-2 ml-2">
                </div>
                <div>
                    <input type="text" name="phone" id="phone" readonly
                        class="w-[220px] py-2 px-5 border border-gray-300 rounded-lg hover:cursor-not-allowed" placeholder="Phone"
                        value="{{ $selectedCustomer->phone ?? '' }}"> <span class="font-bold me-2 ml-2">
                </div>
            </div>
        </div>
    </div>

    <div class="mt-6 w-full pb-6">
        <label for="customer" class="block font-medium text-gray-700">Pilih Barang</label>
        <div class="flex items-center gap-3">
            <div class="mb-3">
                <select id="customer" name="customer" wire:model.live="selectedBarangId"
                    class="mt-1 block w-[220px] py-[10px] px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="">Option Barang</option>
                    @foreach ($barangs as $barang)
                        <option value="{{ $barang->id }}">{{ $barang->nm_barang }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <input type="number" name="qty" id="qty" wire:model="qty"
                    class="w-[120px] py-2 px-5 border border-gray-300 rounded-lg" placeholder="Qty">
            </div>
            <div class="mb-3">
                <input type="number" name="subtotal" id="subtotal" wire:model="subtotal"
                    class="w-[220px] py-2 px-5 border border-gray-300 rounded-lg" placeholder="Subtotal">
            </div>
            <div class="mb-3">
                <button class="bg-blue-600 text-white px-3 py-2 rounded-lg flex items-center " wire:click="addBarang">
                    Tambah Barang</button>
            </div>
        </div>

        <div>
            <h2 class="capitalize font-semibold text-slate-700 mb-3">Data barang</h2>
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
                            <th class="px-6 py-3 border-b border-gray-300 text-left text-sm font-medium text-gray-700">
                                Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($barangsCart as $barang)
                            <tr>
                                <td class="px-6 py-4 border-b border-gray-300 text-sm text-gray-700">
                                    {{ $loop->iteration }}</td>
                                <td class="px-6 py-4 border-b border-gray-300 text-sm text-gray-700">{{ $barang->barangs->nm_barang }}</td>
                                <td class="px-6 py-4 border-b border-gray-300 text-sm text-gray-700">{{ $barang->qty }}</td>
                                <td class="px-6 py-4 border-b border-gray-300 text-sm text-gray-700">{{ $barang->subtotal }}</td>
                                <td class="px-6 py-4 border-b border-gray-300 text-sm text-gray-700">
                                    <a href="#" class="text-blue-600 hover:text-blue-800">Edit</a> |
                                    <a href="#" class="text-red-600 hover:text-red-800">Hapus</a>
                                </td>
                            </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 border-b border-gray-300 text-sm text-gray-700 text-center">
                                Tidak ada data
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-5">
                <h2 class="font-semibold text-xl mb-2">Total Transaksi : {{ $subtotal }}</h2>
                <button class="bg-blue-600 text-white px-5 py-2 rounded-lg" wire:click="simpanTransaksi"> <span><i
                            class="bi bi-floppy-fill text-white me-2"></i></span> Simpan Transaksi</button>
            </div>
        </div>
    </div>
</div>
