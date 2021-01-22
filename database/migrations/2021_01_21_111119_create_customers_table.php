<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            // Atribute nama
            $table->string('name');
            // Atribute email
            $table->string('email')->unique();
            // Atribute password
            $table->string('password');
            // Atribute status
            $table->string('status'); // isi dari status == active , non-active
            // Atribute sector id dari tabel sector 
            $table->unsignedBigInteger('sector_id')->nullable();
            // Atribute detail alamat
            $table->text('address')->nullable(); // detail alamat
            // Atribute nomor telepon
            $table->string('phone');
            // Atribute saldo
            $table->integer('balance'); // saldo, isi dengan == 0
            // Atribute point
            $table->integer('point'); // point, isi dengan == 0  
            $table->rememberToken();
            $table->timestamp('email_verified_at')->nullable();
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
        Schema::dropIfExists('customers');
    }
}
