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

    // Scope
    public function scopeCodigo($query, $codigo) {
    	if ($codigo) {
    		return $query->where('codigo', 'LIKE', "%$codigo%");
    	}
    }

    public function scopeRecibidoPor($query, $recibidoPor) {
    	if ($recibidoPor) {
    		return $query->where('recibidoPor', 'LIKE', "%$recibidoPor%");
    	}
    }   
}
