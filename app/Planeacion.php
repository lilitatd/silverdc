<?php

namespace SilverDC;

use Illuminate\Database\Eloquent\Model;

class Planeacion extends Model
{
    //
    protected $fillable = ['nombre', 'fecha', 'avanceTotal', 'avancePorDia', 'diasTrabajo', 'gestion', 'mes', 'est'];
}
