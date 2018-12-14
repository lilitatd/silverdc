<?php

namespace SilverDC\Http\Controllers;

use Illuminate\Http\Request;
use SilverDC\Planeacion;
use SilverDC\Labor;

class SeccionalController extends Controller
{
    public function index() {
    	$planeaciones = Planeacion::where('estado', '=', 'Revision')->get();
    	return view('/seccional.index', compact('planeaciones'));
    }

    public function show($id) {
    	$planeacion = Planeacion::find($id);
    	$labors = Labor::where('planeacion_id', '=', $id)->get();
    	return view('/seccional.show', compact('planeacion', 'labors'));
    }

    public function aprobar($id) {
    	$planeacion = Planeacion::find($id);
    	$planeacion->estado = 'Aprobado';
    	$planeacion->save();
    	$planeaciones = Planeacion::where('estado', '=', 'Revision')->get();
    	return redirect('/Seccional')->with('status', 'Planeacion aprobada correctamente');
    }
}
