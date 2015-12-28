<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVendaParcelamentosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('venda_parcelamentos', function(Blueprint $table)
		{
			$table->increments('PK_venda_parcelamentos');
			$table->integer('FK_venda')->unsigned();
			$table->integer('num_parcela')->nullable();
			$table->double('valor_parcela')->nullable();
			$table->integer('flPaga')->nullable()->default(0);
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
		Schema::drop('venda_parcelamentos');
	}

}
