<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->string('kode')->unique()->nullable();

            $table->string('name');

            $table->string('email')->nullable();

            $table->string('telephone');

            $table->bigInteger('total_livestock'); 

            $table->longText('message')->nullable(); // deatil pesanan
                        
            $table->date('tgl_beli');

            $table->date('tgl_antar');

            $table->date('tgl_pesan')->nullable(); // tanggal pesan dari create_at

            $table->longText('address');

            $table->longText('manager_notes')->nullable(); // seperti harga per hewan
            
            $table->bigInteger('delivery_price')->nullable();

            $table->bigInteger('total_price_livestock')->nullable();

            $table->bigInteger('total_price')->nullable();

            $table->string('status'); // Sukses, Menunggu, Kirim, Tolak
        
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
        Schema::dropIfExists('orders');
    }
}
