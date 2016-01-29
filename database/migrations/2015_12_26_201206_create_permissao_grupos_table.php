<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePermissaoGruposTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('permissao_grupos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('grupo_id')->unsigned();
			$table->integer('permissao_id')->unsigned();
			$table->integer('flPermissao')->nullable();
			$table->timestamps();

			$table->foreign('grupo_id')->references('id')->on('grupos');
			$table->foreign('permissao_id')->references('id')->on('permissoes');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('permissao_grupos');
	}

}
