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
            $table->integer('idArtefacto')->unsigned();
            $table->integer('tipoC')->nullable();
            $table->integer('nreg')->nullable();
            $table->integer('correlativo')->nullable();
            $table->date('fechaEmision')->nullable();
            $table->date('fechaAlerta')->nullable();
            $table->date('fechaVencimiento')->nullable();
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
        Schema::drop('certificados');
    }
}
