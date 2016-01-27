<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiculosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vehiculos', function(Blueprint $table)
		{
			// Claves principal y foránea
			$table->increments('serie');
			$table->integer('fabricante_id')->unsigned();

			// Campos de la tabla
			$table->string('color');
			$table->float('cilindrada');
			$table->integer('potencia');
			$table->float('peso');
			
			// Timestamps de Laravel
			$table->timestamps();

			// Relación con la tabla Fabricantes
			$table->foreign('fabricante_id')->references('id')->on('fabricantes');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('vehiculos');
	}

}
