<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePersonalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personals', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('ci')->nullable();
            $table->integer('idCargo')->unsigned();
            $table->string('grado')->nullable();
            $table->string('nombres')->nullable();
            $table->string('apellidos')->nullable();
            $table->string('contacto')->nullable();
            $table->string('foto')->nullable();
            $table->string('descripcion')->nullable();
            $table->boolean('vigencia')->nullable();
            $table->string('email')->nullable();
            $table->string('telefono')->nullable();
            $table->foreign('idCargo')->references('id')->on('cargos');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('personals');
    }
}
