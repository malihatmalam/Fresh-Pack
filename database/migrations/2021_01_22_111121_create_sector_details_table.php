<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectorDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
    */
    
    // YANG NANTI AKAN DI MIGRATE
    public function up()
    {
        Schema::create('sector_details', function (Blueprint $table) {
            $table->bigIncrements('id');

            // Atribute nama
            // name : Kota/Kabupaten  name_city
            // ex : Kota Tegal
            $table->string('name');  
            
            // Atribute yang menghubungkan dengan tabel kota
            $table->unsignedBigInteger('city_id');
            
            // Atribute yang menghubungkan dengan tabel sector
            $table->unsignedBigInteger('sector_id');
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
        Schema::dropIfExists('sector_details');
    }
}
