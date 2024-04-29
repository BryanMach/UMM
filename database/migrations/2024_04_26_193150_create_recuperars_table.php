<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRecuperarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recuperars', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('idUsuario')->unsigned();
            $table->integer('tabla')->nullable();
            $table->integer('posicion')->nullable();
            $table->integer('operacion')->nullable();
            $table->date('fecha')->nullable();
            $table->integer('campo')->nullable();
            $table->integer('dato')->nullable();
            $table->foreign('idUsuario')->references('id')->on('usuarios');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('recuperars');
    }
}
