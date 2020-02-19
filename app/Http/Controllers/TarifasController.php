<?php

namespace App\Http\Controllers;

use App\Http\Requests\GuardarTarifa;
use App\Tarifa;
use App\Ubicacion;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TarifasController extends Controller
{
    /**
     * Muestra la lista de recursos
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tarifas = Tarifa::all();
        return view('tarifas.index', ['tarifas' => $tarifas]);
    }

    /**
     * Muestra el formulario para crear un nuevo recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tarifa = new Tarifa;

        $ubicaciones = $this->cargarUbicaciones();
        return view('tarifas.create', compact('tarifa', 'ubicaciones'));
    }

    /**
     * Guarda un recurso en la BD.
     *
     * @param  GuardarTarifa|Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuardarTarifa $request)
    {
        $tarifa = new Tarifa($request->all());
        // $resultado = Tarifa::insertar(['valor' => $request->get('valor'), 'origen_id' => $request->get('origen_id'), 'destino_id' => $request->get('destino_id')])
        if ($tarifa->save()) {
            flash('Se ha guardado la tarifa')->success();
            return redirect()->route('tarifas.index');
        } else {
            return view('tarifas.create', compact('tarifa'));
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
        $tarifa = Tarifa::buscar($id);

        if ($tarifa == null) {
            flash('El recurso solicitado no existe')->success();
            return redirect()->route('tarifas.index', 302);
        }

        $ubicaciones = $this->cargarUbicaciones();
        return view('tarifas.edit', compact('tarifa', 'ubicaciones'));
    }

    /**
     * Actualiza el recurso en la BD.
     *
     * @param  GuardarTarifa|Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(GuardarTarifa $request, $id)
    {
        $tarifa = Tarifa::buscar($id);

        if ($tarifa == null) {
            flash('El recurso solicitado no existe')->success();
            return redirect()->route('tarifas.index', 302);
        }

        $resultado = Tarifa::actualizar(['valor' => $request->get('valor'), 'origen_id' => $request->get('origen_id'), 'destino_id' => $request->get('destino_id'), 'id' => $id]);
        if ($resultado) {
            flash('Se ha actualizado el recurso')->success();
            return redirect()->route('tarifas.index');
        } else {
            return view('tarifas.edit', compact('tarifa'));
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
        Tarifa::eliminar($id);
        flash('Se ha eliminado el recurso')->success();
        return redirect()->route('tarifas.index');
    }

    private function cargarUbicaciones()
    {
        $items = DB::select("SELECT id, nombre_barr, direccion FROM ubicaciones");
        $ubicaciones = array();

        foreach ($items as $ubicacion)
        {
            $ubicaciones[$ubicacion->id] = $ubicacion->nombre_barr . " - " . $ubicacion->direccion;
        }
        return $ubicaciones;
    }
}
