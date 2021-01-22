<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
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
        Schema::dropIfExists('users');
    }
}
