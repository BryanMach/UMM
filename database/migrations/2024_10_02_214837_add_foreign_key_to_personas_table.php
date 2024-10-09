<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToPersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('personas', function (Blueprint $table) {
            // Asegúrate de que idUsuario exista en la tabla personas
            // Si no existe, puedes crearla con una línea como esta:
            // $table->unsignedBigInteger('idUsuario');

            // Agregar la clave foránea
            $table->foreign('idUsuario')->references('id')->on('usuarios')
                ->onDelete('cascade');  // Puedes cambiar el comportamiento si lo deseas
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('personas', function (Blueprint $table) {
            // Elimina la clave foránea en caso de rollback
            $table->dropForeign(['idUsuario']);
        });
    }
}
