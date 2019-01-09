<?php

namespace SilverDC;

use Illuminate\Database\Eloquent\Model;

class DetalleBoleta extends Model
{
    protected $fillable = [
    	'turno', 'codigoArticulo', 'descripcionArticulo', 'cantidadSolicitada', 'cantidadEntregada', 'precioEstimado', 'precio', 'diferenciaCantidad', 'diferenciaPrecio', 'estado'
    ];

    public function boleta() {
    	return $this->belongsToMany('SilverDC\Boleta');
    }
}
