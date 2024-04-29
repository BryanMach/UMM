<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCertificacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('idCuenca')->unsigned();
            $table->integer('numero')->nullable();
            $table->foreign('idCuenca')->references('id')->on('cuencas');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('certificaciones');
    }
}
