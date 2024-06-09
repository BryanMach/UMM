<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDatosAdicionalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_adicionales', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('idArtefacto')->unsigned();
            $table->string('lugar')->nullable();
            $table->string('mercPelig')->nullable();
            $table->integer('maxPasajeros')->nullable();
            $table->integer('cargaComb')->nullable();
            $table->double('peso')->nullable();
            $table->double('altura')->nullable();
            $table->double('obraviva')->nullable();
            $table->double('obramuerta')->nullable();
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
        Schema::drop('datos_adicionales');
    }
}
