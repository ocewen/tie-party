<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAmigosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amigos', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('email_usuario1');
            $table->integer('email_usuario2');
            $table->string('estado');
            $table->timestamps();
            $table->foreign('email_usuario1')->references('id')->on('users');
            $table->foreign('email_usuario2')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('amigos');
    }
}
