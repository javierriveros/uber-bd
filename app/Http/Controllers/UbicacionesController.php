<?php

namespace App\Http\Controllers;

use App\Ubicacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UbicacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ubicaciones = Ubicacion::todas();

        return view('ubicaciones.index', ['ubicaciones' => $ubicaciones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ubicacion = new Ubicacion;
        return view('ubicaciones.create', compact('ubicacion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ubicacion = new Ubicacion($request->all());
        // $result = Ubicacion::insertar(['nombre_barr' => $request->get('nombre_barr'), 'direccion' => $request->get('direccion')]);
        // if ($result)
        if ($ubicacion->save()) {
            flash('Se ha guardado la ubicacion')->success();
            return redirect()->route('ubicaciones.index');
        } else {
            return view('ubicaciones.create', compact('ubicacion'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ubicacion = Ubicacion::buscar($id);
        if ($ubicacion == null) {
            flash('El recurso solicitado no existe')->success();
            return redirect()->route('ubicaciones.index', 302);
        }
        return view('ubicaciones.edit', compact('ubicacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ubicacion = Ubicacion::buscar($id);

        if ($ubicacion == null) {
            flash('El recurso solicitado no existe')->success();
            return redirect()->route('ubicaciones.index', 302);
        }

        $result = Ubicacion::actualizar(['nombre_barr' => $request->get('nombre_barr'), 'direccion' => $request->get('direccion'), 'id' => $id]);

        if ($result) {
            flash('Se ha actualizado el recurso')->success();
            return redirect()->route('ubicaciones.index');
        } else {
            return view('ubicaciones.edit', compact('ubicacion'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ubicacion::eliminar($id);
        flash('Se ha eliminado el recurso')->success();
        return redirect()->route('ubicaciones.index');
    }
}
