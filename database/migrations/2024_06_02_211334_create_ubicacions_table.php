<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUbicacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ubicacions', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('idUsuario')->unsigned();
            $table->integer('idCuenca')->unsigned();
            $table->integer('idBaseOperativa')->unsigned();
            $table->foreign('idUsuario')->references('id')->on('usuarios');
            $table->foreign('idCuenca')->references('id')->on('cuencas');
            $table->foreign('idBaseOperativa')->references('id')->on('bases_operativas');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ubicacions');
    }
}
