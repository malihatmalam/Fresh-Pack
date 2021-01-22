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
    // YANG NANTI AKAN DI MIGRATE
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            // Atribute nomor pemesanan
            $table->string('invoice');
            // Atribute menghubungkan dengan pengguna 
            $table->unsignedBigInteger('customer_id');
            // Atribute penyimpanan nama pengguna (jika nanti profil pengguna berubah 
            // maka tidak merubah data di order )
            $table->string('customer_name');
            // Atribute penyimpanan nomor telepon pengguna (jika nanti profil pengguna berubah 
            // maka tidak merubah data di order )
            $table->string('customer_phone');
            // Atribute apakah menggunakan plastik atau tidak 
            $table->boolean('useplastic');
            // Atribute ongkos kirim
            $table->integer('delivery_price');
            // Atribute tanggal kirim
            $table->date('delivery_date');
            // Atribute waktu kirim, dapat diisi dengan Shubuh, Pagi, Siang, Sore, Malam 
            $table->string('delivery_time');
            // Atribute catatan pemesanan
            $table->text('note');
            // Atribute penyimpanan alamat pesanan (Dapat diambil dari address customer atau menulis sendiri)
            $table->string('address');
            // Atribute untuk mengetahui pesanan yang berjenis Sekali Beli atau Langganan 
            $table->boolean('scheduled');
            // Atribute status pesanan, isinya Wait, Process, Success, Delivery
            $table->string('status');
            // Atribute sector id dari tabel sector 
            $table->unsignedBigInteger('sector_id');
            // Atribute total biaya dari barang yang di beli (total harga barang)
            $table->integer('subtotal');
            // Atribute total yang harus di bayarkan (total harga barang + ongkos kirim) 
            $table->integer('total');
            // Atribute metode pembayaran, isinya CASH atau DEBT (Debit maksudnya)
            $table->string('paymethod', 4);
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
