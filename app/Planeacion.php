<?php

namespace SilverDC;

use Illuminate\Database\Eloquent\Model;

class Planeacion extends Model
{
    public function labors() {
        return $this->hasMany(Labor::class);
    }

    public function boletas() {
        return $this->hasMany(Boleta::class);
    }
    //
    protected $fillable = ['nombre', 'fecha', 'avanceTotal', 'avancePorDia', 'diasTrabajo', 'gestion', 'mes', 'est', 'ejecutor'];

    public function getAvanceTotal() {
    	$labors = $this->labors();
    	$avanceTotal = 0;
    	foreach ($labors as $labor) {
    		$avanceTotal += $labor->avanceTotal;
    	}
    	return $avanceTotal;
    }

    public function getAvancePorDia() {
    	return $this->avanceTotal / $this->diasTrabajo;
    }
}
