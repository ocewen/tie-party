<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 * este método crea las tablas
	 */
	public function up()
	{
		Schema::create('users', function (Blueprint $table) {
			$table->integer('id')->autoIncrement();
			$table->string('email')->unique();
			$table->string('password');
			$table->string('nombre');
			$table->string('apellidos');
			$table->string('tipo');
			$table->string('roles');
			$table->rememberToken();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 * este método elimina las tablas
	 */
	public function down()
	{
		Schema::dropIfExists('users');
	}
}
