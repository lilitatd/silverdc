<?php

namespace SilverDC\Http\Controllers;

use Illuminate\Http\Request;
use SilverDC\Articulo;
use SilverDC\Boleta;
use SilverDC\DetalleBoleta;
use SilverDC\Labor;
use SilverDC\Planeacion;
use Auth;
use Carbon;

class BoletaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /*$planeacionIds = Planeacion::select('id')->where('estado', '=', 'Aprobado')->get();
        $labors = Labor::whereIn('planeacion_id', $planeacionIds)->where('nroBoletas', '>', '0')->get();        
        $boletas = Boleta::where('estado','=', 'nuevo')->get();*/
        $codigo = $request->get('codigo');
        $recibidoPor = $request->get('asignado');
        $boletas = Boleta::where('estado', '=', 'Pendiente')
            ->codigo($codigo)
            ->recibidoPor($recibidoPor)
            ->paginate(10);
        return view('boletas.index', compact('boletas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createAll($planeacion_id)
    {
        
        return $planeacion_id;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $labor = Labor::find($request->input('labor'));
        $boleta = new Boleta();
        $boleta->planeacion_id = $labor->planeacion_id;
        $boleta->codigo = $request->input('codigo');
        $boleta->fecha = Carbon::now();
        $boleta->destino = $request->input('destino');
        $boleta->ficha = $request->input('ficha');
        $boleta->uso = $request->input('uso');
        $boleta->equipo = $request->input('equipo');
        $boleta->numeroSHP = $request->input('numeroSHP');
        $boleta->autorizadoPor = '-';
        $boleta->recibidoPor = $labor->ejecutor;
        $boleta->despachadoPor = '-';
        $boleta->procesadoPor = Auth::user()->name;
        $boleta->estado = 'Pendiente';
        $boleta->save();            
        $labor->decrement('nroBoletas');
        $labor->save();

        $this->storeItems($labor,
            $boleta,
            $request->input('cuenta'),
            $request->input('centro'),
            $request->input('subCentro'));

        $labors = Labor::where('planeacion_id', '=', $labor->planeacion_id)->where('nroBoletas', '>', '0')->get();

        if (count($labors) == 0) {
            Planeacion::where('id', $labor->planeacion_id)->update(array('estado' => 'Completado'));
        }

        return redirect()->route('planeacions.index')->with('status', 'Boleta creada correctamente');
    }

    public function storeItems($labor, $boleta, $cuenta, $centro, $subCentro) {
        // Articulo 1 Anfo
        $this->newDetalleBoleta(
            $boleta->id,
            $cuenta,
            $centro,
            $subCentro,
            1010,
            $labor->cantidadAnfo
        );
        // Articulo 2, Dinamita
        $this->newDetalleBoleta(
            $boleta->id,
            $cuenta,
            $centro,
            $subCentro,
            1020,
            $labor->nroTaladros
        );
        // Articulo 3, MS (tub+caps detonante)
        $this->newDetalleBoleta(
            $boleta->id,
            $cuenta,
            $centro,
            $subCentro,
            1030,
            4
        );
        // Articulo 4, LP (tub+caps detonante)
        $this->newDetalleBoleta(
            $boleta->id,
            $cuenta,
            $centro,
            $subCentro,
            1040,
            $labor->nroTaladros - 4
        );
        // Articulo 5, cordon detonante
        $this->newDetalleBoleta(
            $boleta->id,
            $cuenta,
            $centro,
            $subCentro,
            1050,
            6
        );
        // Articulo 6, Guia
        $this->newDetalleBoleta(
            $boleta->id,
            $cuenta,
            $centro,
            $subCentro,
            1060,
            4
        );
        // Articulo 5, cordon detonante
        $this->newDetalleBoleta(
            $boleta->id,
            $cuenta,
            $centro,
            $subCentro,
            1070,
            2
        );
    }

    public function newDetalleBoleta($boleta_id, $cuenta, $centro, $subCentro, $codigoArticulo, $cantidadSolicitada) {
        $articulo = Articulo::where('nroArticulo', '=', $codigoArticulo)->first();

        $detalleBoleta = new DetalleBoleta();
        $detalleBoleta->boleta_id = $boleta_id;
        $detalleBoleta->cuenta = $cuenta;
        $detalleBoleta->centro = $centro;
        $detalleBoleta->subCentro = $subCentro;
        $detalleBoleta->codigoArticulo = $articulo->nroArticulo;
        $detalleBoleta->descripcionArticulo = $articulo->descripcion;
        $detalleBoleta->cantidadSolicitada = $cantidadSolicitada;
        $detalleBoleta->cantidadEntregada = $cantidadSolicitada;
        $detalleBoleta->precioEstimado = $articulo->precioVenta*$cantidadSolicitada;
        $detalleBoleta->precio = $articulo->precioVenta*$cantidadSolicitada;
        $detalleBoleta->diferenciaCantidad = 0;
        $detalleBoleta->diferenciaPrecio = 0;
        $detalleBoleta->estado = '-';
        $detalleBoleta->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $boleta = Boleta::find($id);
        $detalleBoleta = DetalleBoleta::where('boleta_id', '=', $id)->get();
        //return $detalleBoleta;
        return view('boletas.show', compact('boleta', 'detalleBoleta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $boleta_id = $request->get('boleta_id');
        $boleta = Boleta::find($boleta_id);
        $boleta->estado = 'Entregado';
        $boleta->save();
        $this->updateArticulo($boleta_id, 1010, $request->get('1010'));
        $this->updateArticulo($boleta_id, 1020, $request->get('1020'));
        $this->updateArticulo($boleta_id, 1030, $request->get('1030'));
        $this->updateArticulo($boleta_id, 1040, $request->get('1040'));
        $this->updateArticulo($boleta_id, 1050, $request->get('1050'));
        $this->updateArticulo($boleta_id, 1060, $request->get('1060'));
        $this->updateArticulo($boleta_id, 1070, $request->get('1070'));

        return redirect()->route('bolsearch')->with('status', 'Boleta entregada correctamente');
    }

    public function updateArticulo($boleta_id, $articulo_id, $cantidadEntregada) {
        $articulo = Articulo::find($articulo_id);
        $detalleBoleta = DetalleBoleta::where('boleta_id', '=', $boleta_id)->where('codigoArticulo', '=', $articulo_id);
        return $detalleBoleta;
        if ($detalleBoleta->cantidadEntregada != $cantidadEntregada) {
            $detalleBoleta->cantidadEntregada = $cantidadEntregada;
            $detalleBoleta->precio = $detalleBoleta->cantidadEntregada*$articulo->precioVenta;
            $detalleBoleta->diferenciaPrecio = $detalleBoleta->precio - $detalleBoleta->precioEstimado;
            $detalleBoleta->diferenciaCantidad = $detalleBoleta->cantidadEntregada - $detalleBoleta->cantidadSolicitada;
            $detalleBoleta->save();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
