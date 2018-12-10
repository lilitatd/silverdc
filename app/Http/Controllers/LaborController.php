<?php

namespace SilverDC\Http\Controllers;

use Illuminate\Http\Request;
use SilverDC\Labor;
use SilverDC\Planeacion;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class LaborController extends Controller
{
    public function index(Request $request) {
    	if ($request->ajax()) {
            $labors = Labor::all();
    		return response()->json($labors, 200);
    	}
    	return view('labors.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $planeacion_id = Session::get('planeacion_id');
        if ($planeacion_id == null) {
            return redirect('planeacions');
        }
        return view('labors.create', compact('planeacion_id'));
    }

    public function store(Request $request) {
        $planeacion_id = $request->input('planeacion_id');
        $labor = new Labor();
        $labor->planeacion_id = $planeacion_id;
        $labor->codigo = $request->input('codigo');
        $labor->tipo = $request->input('tipo');
        $labor->nivel = $request->input('nivel');
        $labor->veta = $request->input('veta');
        $labor->ancho = $request->input('ancho');
        $labor->alto = $request->input('alto');
        $labor->nroTaladros=0;
        $labor->avanceTotal=0;
        $labor->save();
        return Redirect::action('PlaneacionController@show', [$planeacion_id])->with('status', 'Labor creada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Labor $labor)
    {
        $planeacion_id = $labor->planeacion_id;
        $labor->delete();

        return Redirect::action('PlaneacionController@show', [$planeacion_id])->with('status', 'Labor eliminada correctamente');
    }
}
