<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEditoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('editorias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 300);
            $table->string('slug_name', 500);
            $table->integer('jornal_id')->unsigned();
            $table->timestamps();

            $table->foreign('jornal_id')->references('id')->on('jornais');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('editorias');
    }
}
