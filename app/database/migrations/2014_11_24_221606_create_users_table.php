<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Creando una nueva tabla
		Schema::table('users', function($table){
			$table->create();

			// Crea un campo de clave primaria autoincrementable
			$table->increments('id');

			// Los campos a crear en la base de datos por defecto
			// varchar los string con valor de 200, como segundo 
			// parámetro se quede pasar el tamaño
			$table->string('email');
			$table->string('real_name');
			$table->string('password');

			// Se encarga de crear el campo de creación y de 
			// actualización automáticamente en la tabla
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
		// Eliminando la tabla
		Schema::drop('users');
	}
}
