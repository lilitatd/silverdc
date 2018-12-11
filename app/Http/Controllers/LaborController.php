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

    /**
     * Show the step 1 Form for creating a new labor.
     *
     * @return \Illuminate\Http\Response
     */
    public function createStep1(Request $request)
    {
        //return $request;
        $labor = $request->session()->get('labor');
        //$labor = null;
        return view('labors.create-step1', compact('labor', $labor));
    }

    /**
     * Post Request to store step1 info in session
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postCreateStep1(Request $request)
    {
        $validatedData = $request->validate([
            'codigo' => 'required|unique:labors',
            'ancho' => 'required|numeric',
            'alto' => 'required',
            'dureza' => 'required',
        ]);
        if(empty($request->session()->get('labor'))){
            $labor = new Labor();
            $labor->fill($validatedData);            
        }else{
            $labor = $request->session()->get('labor');
            $labor->fill($validatedData);
        }
        $area = $labor->ancho*$labor->alto;
        $p = 4*sqrt($area);
        $distanciaTaladros = 0;
        $coeficienteRoca = 0;
        switch ($labor->dureza) {
            case 1:
                $distanciaTaladros = 0.5;
                $coeficienteRoca = 2;
                break;
            case 2:
                $distanciaTaladros = 0.6;
                $coeficienteRoca = 2.1;
                break;
            case 3:
                $distanciaTaladros = 0.7;
                $coeficienteRoca = 2.2;
                break;
            case 4:
                $distanciaTaladros = 0.8;
                $coeficienteRoca = 2.3;
                break;
            default:
                $distanciaTaladros = 0.9;
                $coeficienteRoca = 2.4;
                break;
        }
        $labor->numeroTaladros = round($p/$distanciaTaladros)+($coeficienteRoca*$area);
        $avance = sqrt($area);
        $serie = $avance; // crear funcion para obtener la serie
        $longitud = $serie*$avance; // Crear funcion para obtener longitud
        $longitudANFO = (2/3) * $longitud;
        $labor->avanceTotal = $avance;
        $request->session()->put('labor', $labor);
        return redirect('/labors/create-step2');
    }

    /**
     * Show the step 2 Form for creating a new labor.
     *
     * @return \Illuminate\Http\Response
     */
    public function createStep2(Request $request)
    {
        //return $request;
        $labor = $request->session()->get('labor');
        //$labor = null;
        return view('labors.create-step2', compact('labor', $labor));
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
