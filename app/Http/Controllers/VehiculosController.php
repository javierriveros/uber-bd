<?php

namespace App\Http\Controllers;

use App\Vehiculo;
use Illuminate\Http\Request;
use App\Http\Requests\GuardarVehiculo;
use App\Http\Requests\ActualizarVehiculo;

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
        $vehiculo = Vehiculo::where('conductor_id', \Auth::user()->id)->get();
        if ($vehiculo->isEmpty()) {
            $vehiculo = new Vehiculo;
        } else {
            flash('Ya tiene agregado un vehículo')->error();
            return redirect()->route('conductor');
        }

        return view('vehiculos.create', compact('vehiculo'));
    }

    /**
     * Guarda un recurso en la BD.
     *
     * @param  GuardarVehiculo|Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuardarVehiculo $request)
    {
        $vehiculo = new Vehiculo($request->all());
        $vehiculo->conductor()->associate(\Auth::user());
        // $resultado = Vehiculo::insertar(['placa' => $request->get('placa'), 'modelo' => $request->get('modelo'), 'color' => $request->get('color'), 'conductor_id' => $request->get('conductor_id')]);
        // if ($resultado)
        if ($vehiculo->save()) {
            flash('Se ha guardado el vehículo')->success();
            return redirect()->route('conductor');
        } else {
            return view('vehiculos.create', compact('vehiculo'));
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
     * @param  ActualizarVehiculo|Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ActualizarVehiculo $request, $id)
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
        $vehiculo = Vehiculo::buscar($id);
        if (!($vehiculo->conductor_id == \Auth::user()->id || \Auth::user()->esAdministrador())) {
            flash('No tienes permisos para realizar esa acción')->error();
            return redirect()->route('home');
        }
        Vehiculo::eliminar($id);
        flash('Se ha eliminado el recurso')->success();
        return redirect()->route('vehiculos.index');
    }
}
