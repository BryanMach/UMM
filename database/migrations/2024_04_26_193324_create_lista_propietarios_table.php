<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateListaPropietariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lista_propietarios', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('idPropietario')->unsigned();
            $table->integer('idArtefacto')->unsigned();
            $table->foreign('idPropietario')->references('id')->on('propietarios');
            $table->foreign('idArtefacto')->references('id')->on('artefactos');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('lista_propietarios');
    }
}
