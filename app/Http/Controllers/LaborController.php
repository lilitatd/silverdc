<?php

namespace SilverDC\Http\Controllers;

use Illuminate\Http\Request;
use SilverDC\Labor;

class LaborController extends Controller
{
    public function index(Request $request) {
    	if ($request->ajax()) {
            $labors = Labor::all();
    		return response()->json($labors, 200);
    	}
    	return view('labors.index');
    }

    public function store(Request $request) {
        //console.log("test");
        //console.log($request);
        if ($request->ajax()) {
            $labor = new Labor();
            $labor->codigo = $request->input('codigo');
            $labor->tipo = $request->input('tipo');
            $labor->nivel = $request->input('nivel');
            $labor->veta = $request->input('veta');
            $labor->ancho = $request->input('ancho');
            $labor->alto = $request->input('alto');
            $labor->nroTaladros=0;
            $labor->avanceTotal=0;
            //$labor->nroTaladros = $request->input('nroTaladros');
            //$labor->avanceTotal = $request->input('avanceTotal');
            $labor->save();

            return response()->json([
                "message" => "Labor creada correctamente.",
                "labor" => $labor
            ], 200);
        }
    }
}
