<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliveries', function (Blueprint $table) {
            $table->bigIncrements('id');
            // Atribute yang menghubungkan dengan tabel order (detail dari produk)
            $table->unsignedBigInteger('order_id');
            // Atribute yang menghubungkan dengan tabel kurir (kurir yang nganter)
            $table->unsignedBigInteger('courir_id');
            // Atribute status
            $table->string('status'); // isi dari status == Delivery, Success
            // Atribute catatan pemesanan
            $table->text('note');
            // Atribute tanggal kirim
            $table->date('delivery_date');
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
        Schema::dropIfExists('deliveries');
    }
}
