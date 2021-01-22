<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courirs', function (Blueprint $table) {
            $table->bigIncrements('id');
            // Atribute nama
            $table->string('name');
            // Atribute status
            $table->string('status'); // isi dari status == active , non-active
            // Atribute sector id dari tabel sector 
            $table->unsignedBigInteger('sector_id')->nullable();
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
        Schema::dropIfExists('courirs');
    }
}
