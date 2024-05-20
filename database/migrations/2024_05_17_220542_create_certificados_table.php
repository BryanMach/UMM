<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCertificadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificados', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('tipo')->nullable();
            $table->integer('nreg')->nullable();
            $table->date('fechaEmision')->nullable();
            $table->date('fechaVecimiento')->nullable();
            $table->integer('idArtefactos')->nullable();
            $table->foreign('idArtefactos')->references('id')->on('artefactos');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('certificados');
    }
}
