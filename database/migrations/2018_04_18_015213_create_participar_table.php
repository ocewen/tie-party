<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticiparTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participar', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('id_usuario');
            $table->integer('id_fiesta');
            $table->timestamps();
            $table->foreign('id_usuario')->references('id')->on('users');
            $table->foreign('id_fiesta')->references('id')->on('fiesta');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('participar');
    }
}
