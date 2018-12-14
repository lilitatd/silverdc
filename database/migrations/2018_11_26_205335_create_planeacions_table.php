<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlaneacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planeacions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 20);
            $table->date('fecha');
            $table->float('avanceTotal')->default(0);
            $table->float('avancePorDia')->default(0);
            $table->integer('diasTrabajo');
            $table->integer('gestion');
            $table->string('mes', 11);
            $table->string('est', 15);
            $table->string('estado', 10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('planeacions');
    }
}
