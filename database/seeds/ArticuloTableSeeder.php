<?php

use Illuminate\Database\Seeder;
use SilverDC\Articulo;
use Carbon\Carbon;

class ArticuloTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->newItem('1010', 'Anfo', 'Kg', 10, 12, Carbon::now(), 0);
        $this->newItem('1020', 'Dinamita 7/8\"x8\"', 'Pza', 10, 12, Carbon::now(), 0);
        $this->newItem('1030', 'MS(tub+caps) detonante', 'Pza', 10, 12, Carbon::now(), 0);
        $this->newItem('1040', 'LP(tub+caps) detonante', 'Pza', 10, 12, Carbon::now(), 0);
        $this->newItem('1050', 'Cordón detonante 3P', 'm', 10, 12, Carbon::now(), 0);
        $this->newItem('1060', 'Guía', 'm', 10, 12, Carbon::now(), 0);
        $this->newItem('1070', 'Caps. detonante Nro 6', 'Pza', 10, 12, Carbon::now(), 0);
    }

    private function newItem($nroArticulo, $descripcion, $unidadMedida, $precioCompra, $precioVenta, $fechaVencimiento, $cantidad) {
    	$articulo = new Articulo();
    	$articulo->nroArticulo = $nroArticulo;
    	$articulo->descripcion = $descripcion;
    	$articulo->unidadMedida = $unidadMedida;
    	$articulo->precioCompra = $precioCompra;
    	$articulo->precioVenta = $precioVenta;
    	$articulo->fechaVencimiento = $fechaVencimiento;
    	$articulo->cantidad = $cantidad;
    	$articulo->save();
    }
}
