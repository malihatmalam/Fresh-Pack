<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
    */
    
     // YANG AKAN DI MIGRATE 

    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            // Atribute nama 
            $table->string('name');
            // Atribute deskripsi karegori
            $table->text('description')->nullable(); 
            // Atribute slug 
            $table->string('slug');
            $table->timestamps();
            // // Atribute parent untuk menghubungkan ibu (pewarisan) dari ketegori lain.
            // $table->unsignedBigInteger('parent_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

     // JIKA ROLLBACK   
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
