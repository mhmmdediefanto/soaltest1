<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksi_hs', function (Blueprint $table) {
            $table->id();

            // relasi customer
            // $table->unsignedBigInteger('transaksi_ds_id');
            // $table->foreign('transaksi_ds_id')->references('id')->on('transaksi_ds')->onDelete('cascade');
            $table->unsignedBigInteger('ms_customer_id');
            $table->foreign('ms_customer_id')->references('id')->on('ms_customers');


            $table->string('nomor_transaksi');
            $table->string('total_harga');
            $table->date('tanggal_transaksi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_hs');
    }
};
