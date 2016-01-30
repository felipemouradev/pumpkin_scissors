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
			$table->increments('id');
			$table->string('rota')->nullable();
			$table->string('nome')->nullable();
			$table->string('descricao')->nullable();
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
