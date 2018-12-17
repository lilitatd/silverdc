<?php

namespace SilverDC;

use Illuminate\Database\Eloquent\Model;

class Boleta extends Model
{
    public function planeacion() {
    	return $this->belongsToMany('SilverDC\Planeacion');
    }
    
    protected $fillable = [
    	'codigo', 'fecha', 'destino', 'ficha', 'uso', 'equipo', 'numeroSHP', 'autorizadoPor', 'recibidoPor', 'despachadoPor', 'procesadoPor', 'estado'
    ];
}
