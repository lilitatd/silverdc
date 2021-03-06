<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLaborsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('labors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('planeacion_id')->unsigned();
            $table->string('codigo', 15);
            $table->string('tipo', 15);
            $table->float('dureza');
            $table->integer('nivel');
            $table->string('veta', 25);
            $table->float('ancho');
            $table->float('alto');
            $table->integer('nroTaladros');
            $table->float('avance');
            $table->float('avanceTotal');
            $table->float('cantidadAnfo');
            $table->string('ejecutor');
            $table->integer('nroBoletas');
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
        Schema::dropIfExists('labors');
    }
}
