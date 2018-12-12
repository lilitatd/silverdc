<?php

namespace SilverDC;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    //
    protected $fillable = [
    	'nroArticulo', 'descripcion', 'unidadMedida', 'precioCompra', 'precioVenta', 'fechaVencimiento', 'cantidad',
    ];
}
