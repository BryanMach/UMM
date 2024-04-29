<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMotoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motores', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('idArtefacto')->unsigned();
            $table->string('tipo')->nullable();
            $table->string('marca')->nullable();
            $table->string('numero')->nullable();
            $table->string('potencia')->nullable();
            $table->string('nominalelectrica')->nullable();
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
        Schema::drop('motores');
    }
}
