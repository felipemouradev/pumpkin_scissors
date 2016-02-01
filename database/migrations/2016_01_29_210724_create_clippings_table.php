<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClippingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clippings', function (Blueprint $table) {
            $table->increments('id');
            $table->date('data_clipping');
            $table->double('centimetragem');
            $table->string('type')->default('n');
            $table->string('file_image',2083);
            $table->string('file_archive',2083);
            $table->integer('jornal_id')->unsigned();
            $table->integer('editoria_id')->unsigned();
            $table->integer('fonte_id')->unsigned();
            $table->integer('status_id')->unsigned();
            $table->integer('usuario_id')->unsigned();
            $table->integer('cliente_id')->unsigned();
            $table->integer('assunto_id')->unsigned();
            $table->timestamps();

            $table->foreign('jornal_id')->references('id')->on('jornais');
            $table->foreign('editoria_id')->references('id')->on('editorias');
            $table->foreign('fonte_id')->references('id')->on('fontes');
            $table->foreign('status_id')->references('id')->on('status');
            $table->foreign('usuario_id')->references('id')->on('usuarios');
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->foreign('assunto_id')->references('id')->on('assuntos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('clippings');
    }
}
