<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInspeccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspecciones', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('idArtefacto')->unsigned();
            $table->string('gestion')->nullable();
            $table->string('jefeinspector')->nullable();
            $table->string('motivo')->nullable();
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
        Schema::drop('inspecciones');
    }
}
