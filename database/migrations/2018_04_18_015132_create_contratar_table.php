<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContratarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratar', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('id_usuario');
            $table->integer('id_fiesta');
            $table->integer('id_servicio');
            $table->string('estado');
            $table->timestamps();
            $table->foreign('id_usuario')->references('id')->on('users');
            $table->foreign('id_fiesta')->references('id')->on('fiesta');
            $table->foreign('id_servicio')->references('id')->on('servicio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contratar');
    }
}
