<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArtefactosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artefactos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('idUsuarios')->unsigned();
            $table->integer('idBaseOperativa')->unsigned();
            $table->string('matricula')->nullable();
            $table->string('nombre')->nullable();
            $table->integer('idTipo')->unsigned();
            $table->integer('idMaterial')->unsigned();
            $table->double('eslora')->nullable();
            $table->double('manga')->nullable();
            $table->double('puntal')->nullable();
            $table->double('francobordo')->nullable();
            $table->string('propulsion')->nullable();
            $table->string('construccion')->nullable();
            $table->double('trn')->nullable();
            $table->double('trb')->nullable();
            $table->string('servicio')->nullable();
            $table->string('asociacion')->nullable();
            $table->string('observaciones')->nullable();
            $table->foreign('idUsuarios')->references('id')->on('usuarios');
            $table->foreign('idBaseOperativa')->references('id')->on('bases_operativas');
            $table->foreign('idTipo')->references('id')->on('tipos');
            $table->foreign('idMaterial')->references('id')->on('materials');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('artefactos');
    }
}
