<?php

namespace App\Http\Controllers;

use App\Tarifa;
use App\Ubicacion;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TarifasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tarifas = Tarifa::all();
        return view('tarifas.index', ['tarifas' => $tarifas]);
    }

    /**
     * Show the form for creating a new resource.
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tarifa = new Tarifa($request->all());
        // $result = DB::insert("INSERT INTO tarifas(valor, origen_id, destino_id) values (?, ?, ?)", [$tarifa->valor, $tarifa->origen_id, $tarifa->destino_id]);
        if ($tarifa->save()) {
            flash('Se ha guardado la tarifa')->success();
            return redirect()->route('tarifas.index');
        } else {
            return view('tarifas.create', compact('tarifa'));
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
        $tarifa = DB::selectOne("SELECT * FROM tarifas WHERE id=?", [$id]);

        if ($tarifa == null) {
            flash('El recurso solicitado no existe')->success();
            return redirect()->route('tarifas.index', 302);
        }

        $ubicaciones = $this->cargarUbicaciones();
        return view('tarifas.edit', compact('tarifa', 'ubicaciones'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tarifa = DB::selectOne("SELECT * FROM tarifas WHERE id=?", [$id]);

        if ($tarifa == null) {
            flash('El recurso solicitado no existe')->success();
            return redirect()->route('tarifas.index', 302);
        }

        $result = DB::update("UPDATE tarifas SET valor=?, origen_id=?, destino_id=? WHERE id=?", [$request->get('valor'), $request->get('origen_id'), $request->get('destino_id'), $id]);

        if ($result) {
            flash('Se ha actualizado el recurso')->success();
            return redirect()->route('tarifas.index');
        } else {
            return view('tarifas.edit', compact('tarifa'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete("DELETE FROM tarifas WHERE id=?", [$id]);
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
