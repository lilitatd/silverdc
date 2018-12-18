<?php

namespace SilverDC\Http\Controllers;

use Illuminate\Http\Request;
use SilverDC\Labor;
use SilverDC\Planeacion;
use SilverDC\User;
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
    public function createStep1($planeacion_id)
    {        
        //$labor = $request->session()->get('labor');
        //$labor = null;
        $planeacion = Planeacion::find($planeacion_id);
        $users = User::where('role', '=', 'Operador')->orderBy('name', 'asc')->get();
        $users_array = [];
        foreach ($users as $user) {
            $users_array[$user->id] = $user->name;
        }
        //return $users_array;
        return view('labors.create-step1', compact('planeacion', 'users_array'));
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
            'codigo' => 'required',
            'planeacion_id' => 'required|numeric',
            'tipo' => 'required',
            'dureza' => 'required',
            'ejecutor' => 'required',
        ]);
        if (empty($request->session()->get('labor'))){
            $labor = new Labor();
            $labor->fill($validatedData);            
        } else {
            $labor = $request->session()->get('labor');
            $labor->fill($validatedData);
        }

        // obteniendo valores del request
        $planeacion_id = $request->input('planeacion_id');
        $codigo = $request->input('codigo');
        $nivel = $request->input('nivel');
        $veta = $request->input('veta');
        $tipo= $request->input('tipo');
        $dureza = $request->input('dureza');
        $nroBoletas = $request->input('diasTrabajo');
        $user = User::find($request->input('ejecutor'));
        $ejecutor = $user->name;
        
        $planeacion = Planeacion::find($planeacion_id);
        //return $request;
        //return $dureza;
        $auxValues = $this->getAuxValues($tipo, $dureza, $planeacion);
        //return $auxValues;
        // rellenando los valores auxiliares a la labor
        $labor->tipo = $tipo;
        $labor->nivel = $nivel;
        $labor->veta = $veta;
        $labor->dureza = $dureza;
        $labor->ejecutor = $ejecutor;
        $labor->nroBoletas = $nroBoletas;
        $labor->ancho = $auxValues['ancho'];
        $labor->alto = $auxValues['alto'];
        $labor->nroTaladros = $auxValues['nroTaladros'];
        $labor->avance = round($auxValues['avance'], 2);
        $labor->avanceTotal = round($auxValues['avanceTotal'], 2);
        $labor->cantidadAnfo = round($auxValues['cantidadAnfo'], 2);
        
        $request->session()->put('labor', $labor);
        return view('/labors.create-step2', compact('labor', 'auxValues', 'planeacion'));
    }

    /**
     * Funcion principal del cálculo de número de taladros
     *
     * @return variable de tipo objeto que contiene todos los valores auxiliares
     */
    private function getAuxValues($tipo, $dureza, $planeacion) {
        $ancho = 0;
        $alto = 0;
        switch ($tipo) {
            case 'D':
                $ancho = 3;
                $alto = 3;
                break;
            case 'C':
                $ancho = 1.5;
                $alto = 1.5;
                break;
            case 'B':
                $ancho = 1.5;
                $alto = 1.8;
                break;            
            default:
                $ancho = 2.2;
                $alto = 2.4;
                break;
        }

        $area = $ancho * $alto;
        $perimetro = 4 * sqrt($area);

        $coeficienteRoca = 0;
        if (($dureza == 0.5) || ($dureza == 0.55)) {
            $coeficienteRoca = 2.0;
        } elseif (($dureza == 0.6) || ($dureza == 0.65)) {
            $coeficienteRoca = 1.5;
        } else {                
            $coeficienteRoca = 1.0;
        }
        $distanciaTaladros = (float)$dureza;

        $numeroTaladros = round(($perimetro / $distanciaTaladros) + ($coeficienteRoca * $area));
        
        $avance = sqrt($area);

        $ql = 7.854E-4*0.8*38.5;

        $pesoAnfo = $ql * $area * (2 / 3);
        $cantidadAnfo = $pesoAnfo * $numeroTaladros;

        $auxValues = array(
            'ancho' => $ancho,
            'alto' => $alto,
            'nroTaladros' => $numeroTaladros,
            'avance' => $avance,
            'cantidadAnfo' => $cantidadAnfo,
            'avanceTotal' => $avance * $planeacion->diasTrabajo
        );

        return $auxValues;
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

    /**
     * Show the step 2 Form for creating a new labor.
     *
     * @return \Illuminate\Http\Response
     */
    public function postCreateStep2(Request $request)
    {
        $planeacion_id = $request->input('planeacion_id');
        $labor = new Labor();
        $labor->planeacion_id = $planeacion_id;
        $labor->codigo = $request->input('codigo');
        $labor->tipo = $request->input('tipo');
        $labor->nivel = $request->input('nivel');
        $labor->veta = $request->input('veta');
        $labor->ancho = $request->input('ancho');
        $labor->alto = $request->input('alto');
        $labor->dureza = $request->input('dureza');
        $labor->nroTaladros = $request->input('nroTaladros');
        $labor->avance = $request->input('avance');
        $labor->avanceTotal = $request->input('avanceTotal');
        $labor->cantidadAnfo = $request->input('cantidadAnfo');
        $labor->ejecutor = $request->input('ejecutor');
        $labor->nroBoletas = $request->input('diasTrabajo');
        $labor->save();

        $planeacion = Planeacion::find($planeacion_id);
        $planeacion->avanceTotal += $labor->avanceTotal;
        $planeacion->avancePorDia = $planeacion->avanceTotal / $planeacion->diasTrabajo;
        $planeacion->save(); 
        return Redirect::action('PlaneacionController@show', [$planeacion_id])->with('status', 'Labor agregada correctamente');
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
        $labor->dureza = $request->input('dureza');
        $labor->nroTaladros = $request->input('nroTaladros');
        $labor->avance = $request->input('avance');
        $labor->avanceTotal = $request->input('avanceTotal');
        $labor->cantidadAnfo = $request->input('cantidadAnfo');
        $labor->nroBoletas = $request->input('diasTrabajo');
        $labor->save();

        $planeacion = Planeacion::find($planeacion_id);
        $planeacion->avanceTotal += $labor->avanceTotal;
        $planeacion->avancePorDia = $planeacion->avanceTotal / $planeacion->diasTrabajo;
        $planeacion->save(); 
        return Redirect::action('PlaneacionController@show', [$planeacion_id])->with('status', 'Labor agregada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $labor = Labor::find($request->input('labor_id'));
        $planeacion_id = $labor->planeacion_id;
        $labor->delete();
        //return $planeacion_id;
        $planeacion = Planeacion::find($planeacion_id);
        $planeacion->avanceTotal = $planeacion->getAvanceTotal();
        $planeacion->avancePorDia = $planeacion->getAvancePorDia();
        $planeacion->save();

        return Redirect::action('PlaneacionController@show', [$planeacion_id])->with('status', 'Labor eliminada correctamente');
    }
}
