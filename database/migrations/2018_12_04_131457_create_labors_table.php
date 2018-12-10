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
            $table->integer('nivel');
            $table->string('veta', 25);
            $table->float('ancho');
            $table->float('alto');
            $table->integer('nroTaladros');
            $table->float('avanceTotal');
            $table->timestamps();
            $table->foreign('planeacion_id')->references('id')->on('planeacions');
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
