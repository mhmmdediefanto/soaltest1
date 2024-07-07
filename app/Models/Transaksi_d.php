<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi_d extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'transaksi_ds';

    public function barangs()
    {
        return $this->belongsTo(Barang::class,  'barang_id');
    }
}
