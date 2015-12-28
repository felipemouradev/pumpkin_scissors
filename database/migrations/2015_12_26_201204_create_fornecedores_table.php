<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFornecedoresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fornecedores', function(Blueprint $table)
		{
			$table->increments('PK_fornecedor');
			$table->string('nome',300)->nullable();
			$table->string('cnpj', 300)->nullable();
			$table->string('telefone', 50)->nullable();
			$table->string('email', 100)->nullable();
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
		Schema::drop('fornecedores');
	}

}
