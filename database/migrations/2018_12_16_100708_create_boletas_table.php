<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoletasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boletas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('planeacion_id')->unsigned();
            $table->string('codigo');
            $table->date('fecha');
            $table->string('destino');
            $table->string('ficha');
            $table->string('uso');
            $table->string('equipo');
            $table->string('numeroSHP');
            $table->string('autorizadoPor');
            $table->string('recibidoPor');
            $table->string('despachadoPor');
            $table->string('procesadoPor');
            $table->string('estado');
            $table->timestamps();
            $table->foreign('planeacion_id')->references('id')->on('planeacions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boletas');
    }
}
