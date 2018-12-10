<?php

namespace SilverDC;

use Illuminate\Database\Eloquent\Model;

class Planeacion extends Model
{
    public function labors() {
        return $this->hasMany(Labor::class);
    }
    //
    protected $fillable = ['nombre', 'fecha', 'avanceTotal', 'avancePorDia', 'diasTrabajo', 'gestion', 'mes', 'est'];
}
