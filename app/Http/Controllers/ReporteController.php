<?php

namespace SilverDC\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use SilverDC\Boleta;
use SilverDC\DetalleBoleta;
use SilverDC\Labor;
use SilverDC\Planeacion;

class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $dateFrom = Carbon::today();
        $dateTo = Carbon::today();
        if (count($request->all()) > 0) {
            $validatedData = $request->validate([
            'dateFrom' => 'required',
            'dateTo' => 'required|before_or_equal:today',
            ]);
            $dateFrom = $request->input('dateFrom');
            $dateTo = $request->input('dateTo');
        }
        $boletasIds = Boleta::select('id')->where('estado', 'Entregado')->whereBetween('fecha', array($dateFrom, $dateTo))->pluck('id');
        $detalleBoletas = DetalleBoleta::whereIn('boleta_id', $boletasIds)->get();
        $auxDetalleBoletas = $this->generateAuxDetalleBoletas($detalleBoletas);
       // return $auxDetalleBoletas;
        return view('reports.index', compact('auxDetalleBoletas'));
    }

    public function generateAuxDetalleBoletas($detalleBoletas) {
        $auxDetalleBoletas = [];
        foreach ($detalleBoletas as $detalleBoleta) {
            $boletaId = $detalleBoleta->boleta_id;
            $boleta = Boleta::find($boletaId);
            $labor = Labor::find($boleta->labor_id);
            $planeacion = Planeacion::find($boleta->planeacion_id);
            $auxDetalleBoleta = array(
                'planeacion' => $planeacion->nombre,
                'tipo' => $labor->tipo,
                'labor' => $labor->codigo,
                'codigo' => $boleta->codigo,
                'descripcionArticulo' => $detalleBoleta->descripcionArticulo,
                'cantidadSolicitada' => $detalleBoleta->cantidadSolicitada,
                'cantidadEntregada' => $detalleBoleta->cantidadEntregada,
                'precioEstimado' => $detalleBoleta->precioEstimado,
                'precio' => $detalleBoleta->precio,
                'diferenciaPrecio' => $detalleBoleta->diferenciaPrecio,
            );
            array_push($auxDetalleBoletas, $auxDetalleBoleta);
        }
        return $auxDetalleBoletas;
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
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
