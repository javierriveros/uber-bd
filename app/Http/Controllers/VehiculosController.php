<?php

namespace App\Http\Controllers;

use App\Ubicacion;
use App\Vehiculo;
use Illuminate\Http\Request;

class VehiculosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehiculos = Vehiculo::with('conductor')->get();

        return view('vehiculos.index', compact('vehiculos'));
    }

    /**
     * Muestra el formulario para crear un nuevo recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vehiculo = new Vehiculo;
        return view('vehiculos.create', compact('vehiculo'));
    }

    /**
     * Guarda un recurso en la BD.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vehiculo = new Vehiculo($request->all());
        // $resultado = Vehiculo::insertar(['placa' => $request->get('placa'), 'modelo' => $request->get('modelo'), 'color' => $request->get('color'), 'conductor_id' => $request->get('conductor_id')]);
        // if ($resultado)
        if ($vehiculo->save()) {
            flash('Se ha guardado el vehículo')->success();
            return redirect()->route('vehiculos.index');
        } else {
            return view('vehiculos.create', compact('vehiculo'));
        }
    }

    /**
     * Muestra el recurso.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vehiculo = Vehiculo::buscar($id);
        if ($vehiculo == null) {
            flash('El recurso solicitado no existe')->success();
            return redirect()->route('vehiculos.index', 302);
        }
        if (!($vehiculo->conductor_id == \Auth::user()->id || \Auth::user()->esAdministrador())) {
            flash('No tienes permisos para realizar esa acción')->error();
            return redirect()->route('home');
        }
        return view('vehiculos.show', compact('vehiculo'));
    }

    /**
     * Muestra el formulario para editar un recurso.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehiculo = Vehiculo::buscar($id);
        if ($vehiculo == null) {
            flash('El recurso solicitado no existe')->success();
            return redirect()->route('vehiculos.index', 302);
        }
        if (!($vehiculo->conductor_id == \Auth::user()->id || \Auth::user()->esAdministrador())) {
            flash('No tienes permisos para realizar esa acción')->error();
            return redirect()->route('home');
        }
        return view('vehiculos.edit', compact('vehiculo'));
    }

    /**
     * Actualiza el recurso en la BD.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $vehiculo = Vehiculo::buscar($id);

        if ($vehiculo == null) {
            flash('El recurso solicitado no existe')->success();
            return redirect()->route('ubicaciones.index', 302);
        }

        $resultado = Vehiculo::actualizar(['placa' => $request->get('placa'), 'modelo' => $request->get('modelo'), 'color' => $request->get('color'), 'id' => $id]);

        if ($resultado) {
            flash('Se ha actualizado el recurso')->success();
            return redirect()->route('vehiculos.index');
        } else {
            return view('vehiculos.edit', compact('vehiculo'));
        }
    }

    /**
     * Elimina el recurso de la BD.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Vehiculo::eliminar($id);
        flash('Se ha eliminado el recurso')->success();
        return redirect()->route('vehiculos.index');
    }
}
