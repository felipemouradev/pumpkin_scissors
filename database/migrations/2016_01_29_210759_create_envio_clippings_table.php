<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnvioClippingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('envio_clippings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('clipping_id')->unsigned();
            $table->timestamps();

            $table->foreign('clipping_id')->references('id')->on('clippings');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('envio_clippings');
    }
}
