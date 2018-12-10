<?php

namespace SilverDC;

use Illuminate\Database\Eloquent\Model;

class Labor extends Model
{
    public function planeacion() {
    	return $this->belongsTo('SilverDC\Planeacion');
    }
}
