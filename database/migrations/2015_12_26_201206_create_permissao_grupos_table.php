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
			$table->increments('PK_permissao_grupo');
			$table->integer('FK_grupo')->unsigned();
			$table->integer('FK_permissao')->unsigned();
			$table->integer('flPermissao')->nullable();
			$table->timestamps();

			$table->foreign('FK_grupo')->references('PK_grupo')->on('grupos');
			$table->foreign('FK_permissao')->references('PK_permissao')->on('permissoes');
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
