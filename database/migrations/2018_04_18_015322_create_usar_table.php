<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usar', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('id_fiesta');
            $table->integer('id_herramienta');
            $table->timestamps();
            $table->foreign('id_fiesta')->references('id')->on('fiesta');
            $table->foreign('id_herramienta')->references('id')->on('herramientas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usar');
    }
}
