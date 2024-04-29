<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBasesOperativasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bases_operativas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('idCuenca')->unsigned();
            $table->string('baseOperativa')->nullable();
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
        Schema::drop('bases_operativas');
    }
}
