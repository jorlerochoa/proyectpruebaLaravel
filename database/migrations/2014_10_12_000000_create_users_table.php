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
           $table->string('nombre',25);
           $table->string('email')->unique();
           $table->unsignedBigInteger('id_ciudad');
           $table->string('password');
           $table->string('direccion',50);
           $table->string('ciudad')->nullable();
           $table->foreign('id_ciudad')->references('id')->on('ciudad')->onDelete('cascade');

           $table->date('fecha_nacimiento');
           $table->rememberToken();
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
