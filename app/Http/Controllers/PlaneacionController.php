<?php

namespace SilverDC\Http\Controllers;

use SilverDC\Planeacion;
use Illuminate\Http\Request;

class PlaneacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $planeaciones = Planeacion::all();
        return view('planeacions.index', compact('planeaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //return ('test');
        return view('planeacions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required',
            'fecha' => 'required|date|after_or_equal:today',
            'avanceTotal' => 'required',
            'avancePorDia' => 'required',
            'gestion' => 'required'
        ]);          
        $planeacion = new Planeacion();
        $planeacion->nombre = $request->input('nombre');
        $planeacion->fecha = $request->input('fecha');
        $planeacion->avanceTotal = $request->input('avanceTotal');
        $planeacion->avancePorDia = $request->input('avancePorDia');
        $planeacion->diasTrabajo = $request->input('diasTrabajo');
        $planeacion->gestion = $request->input('gestion');
        $planeacion->mes = $request->input('mes');
        $planeacion->est = $request->input('est');
        $planeacion->estado = 'Pendiente';
        $planeacion->save();
        return 'planeacion guardada';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Planeacion $planeacion)
    {
        //
        //$planeacion = Planeacion::find($id);
        //return ($planeacion);
        return view('planeacions.show', compact('planeacion'));
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
        $planeacion = Planeacion::find($id);
        return view('planeacions.edit', compact('planeacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Planeacion $planeacion)
    {
        //dd($planeacion->id);
        //return $planeacion;
        //
        //$planeacion = Planeacion::find($id);
        $planeacion->fill($request->all());
        $planeacion->estado='Nuevo';
        $planeacion->save();
        return 'planeacion fue actualizada';
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
