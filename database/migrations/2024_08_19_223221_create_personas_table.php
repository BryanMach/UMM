<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id('id');
            $table->timestamps();
            $table->string('nombres');
            $table->string('apellido');
            $table->string('CI')->nullable();
            $table->string('otro')->nullable();
            $table->integer('idArtefacto')->unsigned();
            $table->foreign('idArtefacto')->references('id')->on('artefactos'); // Foreign key



        });
    }

    public function down()
    {
        Schema::dropIfExists('personas');
    }
}
