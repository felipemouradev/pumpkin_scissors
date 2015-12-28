<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVendaComoditesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('venda_comodites', function(Blueprint $table)
		{
			$table->increments('PK_venda_comodite');
			$table->integer('FK_venda')->unsigned();
			$table->integer('FK_chave')->unsigned();
			$table->integer('quantidade')->nullable();
			$table->integer('flComodite')->nullable()->default(1);
			$table->timestamps();
			$table->foreign('FK_venda')->references('PK_venda')->on('vendas');

		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('venda_comodites');
	}

}
