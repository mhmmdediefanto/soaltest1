<?php

namespace App\Livewire;

use App\Models\Barang;
use App\Models\DetailPemesan;
use App\Models\Ms_customer;
use App\Models\Transaksi_d;
use App\Models\Transaksi_h;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Transaksi extends Component
{

    public $customers; // Array of customers
    public $selectedCustomerId = null; // Selected customer ID
    public $selectedCustomer;
    public $barangs;
    public $transactionNumber;
    public $no_transaksi;
    public $qty;
    public $subtotal;
    public $tanggal_transaksi;
    public $selectedBarangId;
    public $barangsCart;


    public function mount()
    {
        // $this->selectedCustomerId;
        $this->customers = Ms_customer::all(); // Load customers from the database
        $this->barangs = Barang::all();
        $this->generateTransactionNumber();
        $this->barangCart();
    }


    public function addBarang()
    {

        $validatedData = $this->validate([
            'selectedCustomerId' => 'required',
            'qty' => 'required',
            'selectedBarangId' => 'required',
            'subtotal' => 'required',
        ]);


        $validatedData['ms_customer_id'] = $this->selectedCustomerId;
        // $validatedData['no_transaksi'] = $this->transactionNumber;
        $validatedData['subtotal'] = $this->subtotal;
        // $validatedData['tanggal_transaksi'] = $this->tanggal_transaksi;
        $validatedData['barang_id'] = $this->selectedBarangId;
        $validatedData['qty'] = $this->qty;

        Transaksi_d::create($validatedData);

        // Memanggil kembali fungsi untuk memuat ulang data
        $this->barangCart();
    }


    public function simpanTransaksi()
    {

        $validatedData = $this->validate([
            // 'nomor_transaksi' => '',
            'tanggal_transaksi' => 'required',
            'selectedCustomerId' => 'required',

        ]);

        $validatedData['ms_customer_id'] = $this->selectedCustomerId;
        $validatedData['nomor_transaksi'] = $this->transactionNumber;
        $validatedData['tanggal_transaksi'] = $this->tanggal_transaksi;
        $validatedData['total_harga'] = $this->subtotal;

        // dd($validatedData);

        // dd($validatedData);
        Transaksi_h::create($validatedData);
        $barangsCart = Transaksi_d::with('barangs')->get();

        // dd($barangsCart);

        foreach ($barangsCart as $item) {
            DetailPemesan::create([
                'nm_barang' => $item->barangs->nm_barang,
                'subtotal' => $item->subtotal,
                'qty' => $item->qty,
            ]);
        }


        // Hapus semua data di Transaksi_d
        Transaksi_d::truncate();
        return redirect('/');
        // dd($validatedData);
    }
    public function generateTransactionNumber()
    {
        $year = date('Y');
        $month = date('m');

        $counterRecord = DB::table('counters')
            ->where('years', $year)
            ->where('months', $month)
            ->first();

        if ($counterRecord) {
            $counter = $counterRecord->counters + 1;
            DB::table('counters')
                ->where('id', $counterRecord->id)
                ->update(['counters' => $counter]);
        } else {
            $counter = 1;
            DB::table('counters')->insert([
                'years' => $year,
                'months' => $month,
                'counters' => $counter,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // dd($counterRecord, $counter);

        $this->transactionNumber = sprintf('SO/%s-%s/%04d', $year, $month, $counter);
    }

    public function updatedSelectedCustomerId()
    {

        $this->selectedCustomer = Ms_customer::find($this->selectedCustomerId);
    }


    public function barangCart()
    {

        $this->barangsCart = Transaksi_d::with('barangs')->get();
        $this->subtotal = Transaksi_d::sum('subtotal');
    }

    public function render()
    {

        return view('livewire.transaksi', [
            'selectedCustomerId' => $this->selectedCustomerId
        ]);
    }
}
