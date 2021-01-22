<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
    */
    
    // YANG NANTI AKAN DI MIGRATE
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            // Atribute yang menghubungkan dengan tabel order (detail dari produk)
            $table->unsignedBigInteger('order_id');
            // Atribute yang menghubungkan dengan tabel produk (produt yang di order)
            $table->unsignedBigInteger('product_id');
            // Atribute harga (saat beli dengan menyalin dari harga saat order)
            $table->integer('price');
            // Atribute jumlah barang (saat beli dengan menyalin dari jumlah barang saat order)
            $table->integer('qty');
            // Atribute total harga (price * qyt)
            $table->integer('total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
}
