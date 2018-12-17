<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleBoletasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_boletas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('boleta_id')->unsigned();
            $table->string('cuenta');
            $table->string('centro');
            $table->string('subCentro');
            $table->string('codigoArticulo');
            $table->string('descripcionArticulo');
            $table->integer('cantidadSolicitada');
            $table->integer('cantidadEntregada');
            $table->float('precioEstimado');
            $table->float('precio');
            $table->integer('diferenciaCantidad');
            $table->float('diferenciaPrecio');            
            $table->timestamps();
            $table->foreign('boleta_id')->references('id')->on('boletas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_boletas');
    }
}
