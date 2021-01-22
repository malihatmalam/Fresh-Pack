<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLivestocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livestocks', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->string('kode')->unique();

            $table->string('kode_kandang')->nullable();
            
            $table->string('jenis'); // Sapi, kambing, domba
            
            $table->string('type')->nullable();
            
            $table->string('jenis_kelamin');

            $table->string('warna');
            
            $table->date('tgl_lahir');
            
            $table->longText('description')->nullable();
            
            $table->bigInteger('berat')->nullable();

            $table->string('foto')->nullable();

            $table->string('status'); // Sudah dibeli, Belum dibeli, Mati

            $table->unsignedBigInteger('order_id')->nullable();
            $table->foreign('order_id')->references('id')->on('orders');

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
        Schema::dropIfExists('livestocks');
    }
}
