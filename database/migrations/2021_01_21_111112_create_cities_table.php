<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // YANG NANTI AKAN DI MIGRATE (INI DI SEEDER)
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->bigIncrements('id');
            // Atribute nama
            $table->string('name');
            // Atribute tipe
            $table->string('type');
            // Atribute kode pos
            $table->string('postal_code');
            // Atribute yang menghubungkan dengan tabel provinsi
            $table->unsignedBigInteger('province_id');
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
        Schema::dropIfExists('cities');
    }
}
