<?php

namespace SilverDC\Http\Controllers;

use SilverDC\Labor;
use SilverDC\Planeacion;
use Illuminate\Http\Request;
use SilverDC\Http\Requests\StorePlaneacionRequest;
use Auth;
use Carbon;
use Illuminate\Support\Facades\Session;

class PlaneacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //return ($request);
        $request->user()->authorizeRoles(['SuperAdmin', 'Admin', 'Seccional', 'Supervisor']);
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
    public function store(StorePlaneacionRequest $request)
    {        
        $planeacion = new Planeacion();
        $planeacion->nombre = $request->input('nombre');
        $planeacion->diasTrabajo = $request->input('diasTrabajo');
        $planeacion->gestion = $request->input('gestion');
        $planeacion->mes = $request->input('mes');
        // Contenido comentado porque valores no llegan del request
        // $planeacion->fecha = $request->input('fecha');
        // $planeacion->avanceTotal = $request->input('avanceTotal');
        // $planeacion->avancePorDia = $request->input('avancePorDia');
        // $planeacion->est = $request->input('est');

        // Inicialización de valores
        $planeacion->fecha = Carbon::now();
        $planeacion->avanceTotal = 0;
        $planeacion->avancePorDia = 0;
        $planeacion->est = '--';
        $planeacion->estado = 'Pendiente';
        $planeacion->save();
        return redirect()->route('planeacions.index')->with('status', 'Planeacion creada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Planeacion $planeacion)
    {
        if (!Auth::check()) {
            return redirect('/');
        }
        Session::put('planeacion_id', $planeacion->id);
        $labors = Labor::where('planeacion_id', '=', $planeacion->id)->paginate(15);
        return view('planeacions.show', compact('planeacion', 'labors'));
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
        return redirect()->route('planeacions.show', $planeacion)->with('status', 'Planeacion actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Planeacion $planeacion)
    {
        $planeacion->delete();

        return redirect()->route('planeacions.index')->with('status', 'Planeacion eliminada correctamente');
    }

    public function revision($id) {
        $planeacion = Planeacion::find($id);
        return view('planeacions.revision', compact('planeacion'));
    }

    public function revision2($id) {
        //return $id;
        $planeacion = Planeacion::find($id);
        $planeacion->estado = 'Revision';
        $planeacion->save();
        return redirect()->route('planeacions.index')->with('status', 'Planeacion enviada a revision correctamente');
    }

    public function boleta($id) {        
        $planeacion = Planeacion::find($id);
        $labors = Labor::where('planeacion_id', '=', $id)->get();
        //return $labors;
        return view('boletas.create', compact('planeacion', 'labors'));
    }
}
