<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePagarContasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pagar_contas', function(Blueprint $table)
		{
			$table->increments('PK_pagar_conta');
			$table->string('codigo_nota', 2083)->nullable();
			$table->dateTime('vencimento')->nullable();
			$table->double('valor')->nullable();
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
		Schema::drop('pagar_contas');
	}

}
