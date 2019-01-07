<?php

namespace SilverDC\Http\Controllers;

use SilverDC\Articulo;
use Illuminate\Http\Request;
use Carbon;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articulos = Articulo::all();
        return view('articulos.index', compact('articulos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articulos.create');
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
            'nroArticulo' => 'required|unique:articulos',
            'descripcion' => 'required|min:5',
            'unidadMedida' => 'required|max:6',
            'precioCompra' => 'required|numeric',
            'precioVenta' => 'required|numeric',
        ]);
        $articulo = new Articulo();
        $articulo->nroArticulo = $request->input('nroArticulo');
        $articulo->descripcion = $request->input('descripcion');
        $articulo->unidadMedida = $request->input('unidadMedida');
        $articulo->precioCompra = $request->input('precioCompra');
        $articulo->precioVenta = $request->input('precioVenta');
        $articulo->fechaVencimiento = Carbon::now();
        $articulo->cantidad = 0;
        $articulo->save();
        return redirect()->route('articulos.index')->with('status', 'Material creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \SilverDC\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function show(Articulo $articulo)
    {
        return view('articulos.show', compact('articulo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \SilverDC\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function edit(Articulo $articulo)
    {
        return view('articulos.edit', compact('articulo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \SilverDC\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Articulo $articulo)
    {
        $articulo->fill($request->all());
        $articulo->fechaVencimiento = Carbon::now();
        $articulo->cantidad = 0;
        $articulo->save();
        return redirect()->route('articulos.index', $articulo)->with('status', 'Material actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \SilverDC\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Articulo $articulo)
    {
        if (in_array($articulo->nroArticulo, [1010, 1020, 1030, 1040, 1050, 1060, 1070])) {
            return redirect()->route('articulos.index', $articulo)->withErrors(['El material seleccionado no puede ser eliminado']);
        }
        $articulo->delete();
        return redirect()->route('articulos.index', $articulo)->with('status', 'Material eliminado correctamente');
    }
}
