<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPemesan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function barangs(){
        return $this->hasMany(Barang::class, 'barang_id');
    }

}
