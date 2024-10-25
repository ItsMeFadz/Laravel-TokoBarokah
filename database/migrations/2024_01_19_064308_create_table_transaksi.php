<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTransaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('transaksi', function (Blueprint $table) {
            $table->id('id_transaksi');
            $table->foreignId('id_user')->nullable();
            $table->json('details'); // Kolom untuk menyimpan rincian produk dalam format JSON
            $table->integer('jumlah_item'); // Kolom untuk menyimpan total jumlah item dalam transaksi
            $table->decimal('total_harga', 10, 2);
            $table->decimal('diskon', 10, 2)->default(0);
            $table->decimal('bayar', 10, 2);
            $table->decimal('diterima', 10, 2);
            $table->decimal('kembali', 10, 2)->default(0);
            $table->timestamps();

            // $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}