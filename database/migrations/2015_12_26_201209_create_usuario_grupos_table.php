<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsuarioGruposTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('usuario_grupos', function(Blueprint $table)
		{
			$table->increments('PK_usuario_grupo');
			$table->integer('FK_usuario')->unsigned();
			$table->integer('FK_grupo')->unsigned();
			$table->timestamps();

			$table->foreign('FK_usuario')->references('PK_usuario')->on('usuarios');
			$table->foreign('FK_grupo')->references('PK_grupo')->on('grupos');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('usuario_grupos');
	}

}
