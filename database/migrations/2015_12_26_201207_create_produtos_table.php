<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProdutosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('produtos', function(Blueprint $table)
		{
			$table->increments('PK_produto');
			$table->integer('FK_fornecedor')->unsigned();
			$table->string('nome', 100)->nullable();
			$table->string('codigo', 100)->nullable();
			$table->text('descricao')->nullable();
			$table->double('valor_custo')->nullable();
			$table->double('valor_final')->nullable();
			$table->integer('quantidade')->nullable();
			$table->timestamps();

			
			$table->foreign('FK_fornecedor')->references('PK_fornecedor')->on('fornecedores');

		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('produtos');
	}

}
