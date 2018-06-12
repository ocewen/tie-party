<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFiestaTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fiesta', function (Blueprint $table) {
			$table->integer('id')->autoIncrement();
			$table->string('nombre');
			$table->string('direccion');
			$table->date('fecha');
			$table->time('hora');
			$table->integer('id_usuario');
			$table->string('tipo');
			$table->timestamps();
			$table->foreign('id_usuario')->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('fiesta');
	}
}
