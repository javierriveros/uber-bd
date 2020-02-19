<?php

namespace App\Http\Controllers;

use App\Http\Requests\GuardarUbicacion;
use App\Ubicacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UbicacionesController extends Controller
{
    /**
     * Muestra la lista de recursos
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ubicaciones = Ubicacion::todas();

        return view('ubicaciones.index', ['ubicaciones' => $ubicaciones]);
    }

    /**
     * Muestra el formulario para crear un nuevo recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ubicacion = new Ubicacion;
        return view('ubicaciones.create', compact('ubicacion'));
    }

    /**
     * Guarda un recurso en la BD.
     *
     * @param  GuardarUbicacion|Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuardarUbicacion $request)
    {
        $ubicacion = new Ubicacion($request->all());
        // $resultado = Ubicacion::insertar(['nombre_barr' => $request->get('nombre_barr'), 'direccion' => $request->get('direccion')]);
        // if ($resultado)
        if ($ubicacion->save()) {
            flash('Se ha guardado la ubicacion')->success();
            return redirect()->route('ubicaciones.index');
        } else {
            return view('ubicaciones.create', compact('ubicacion'));
        }
    }

    /**
     * Muestra el formulario para editar un recurso.
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
     * Actualiza el recurso en la BD.
     *
     * @param  GuardarUbicacion|Request  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GuardarUbicacion $request, $id)
    {
        $ubicacion = Ubicacion::buscar($id);

        if ($ubicacion == null) {
            flash('El recurso solicitado no existe')->success();
            return redirect()->route('ubicaciones.index', 302);
        }

        $resultado = Ubicacion::actualizar(['nombre_barr' => $request->get('nombre_barr'), 'direccion' => $request->get('direccion'), 'id' => $id]);

        if ($resultado) {
            flash('Se ha actualizado el recurso')->success();
            return redirect()->route('ubicaciones.index');
        } else {
            return view('ubicaciones.edit', compact('ubicacion'));
        }
    }

    /**
     * Elimina el recurso de la BD.
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
