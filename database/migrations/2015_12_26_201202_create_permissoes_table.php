<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePermissoesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('permissoes', function(Blueprint $table)
		{
			$table->increments('PK_permissao');
			$table->string('rota', 200)->nullable();
			$table->string('nome', 100)->nullable();
			$table->string('descricao', 200)->nullable();
			$table->integer('display')->default(0);
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
		Schema::drop('permissoes');
	}

}
