<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi_h extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'transaksi_hs';

    public function pemesan () {
        return $this->belongsTo(Ms_customer::class, 'ms_customer_id');
    }
}
