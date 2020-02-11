<?php

namespace App\Http\Controllers;

use App\MetodoPago;
use App\Ubicacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MetodosPagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $metodos_pago = DB::select("SELECT * FROM metodos_pago ORDER BY id DESC");

        return view('metodos_pago.index', ['metodos_pago' => $metodos_pago]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $metodo_pago = new Ubicacion;
        return view('metodos_pago.create', compact('metodo_pago'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $metodo_pago = new MetodoPago($request->all());
        // $result = DB::insert("INSERT INTO metodos_pago(nombre_met, descuento) values (?, ?)", [$metodo_pago->nombre_met, $metodo_pago->descuento]);
        if ($metodo_pago->save()) {
            flash('Se ha guardado el método de pago')->success();
            return redirect()->route('metodos_pago.index', $metodo_pago->id);
        } else {
            return view('metodos_pago.create', compact('metodo_pago'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $metodo_pago = DB::selectOne("SELECT * FROM metodos_pago WHERE id=?", [$id]);
        if ($metodo_pago == null) {
            flash('El recurso solicitado no existe')->success();
            return redirect()->route('metodos_pago.index', 302);
        }
        return view('metodos_pago.edit', compact('metodo_pago'));
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
        $metodo_pago = DB::selectOne("SELECT * FROM metodos_pago WHERE id=?", [$id]);

        if ($metodo_pago == null) {
            flash('El recurso solicitado no existe')->success();
            return redirect()->route('metodos_pago.index', 302);
        }

        $result = DB::update("UPDATE metodos_pago SET nombre_met=?, descuento=? WHERE id=?", [$request->get('nombre_met'), $request->get('descuento'), $id]);

        if ($result) {
            flash('Se ha actualizado el recurso')->success();
            return redirect()->route('metodos_pago.index');
        } else {
            return view('metodos_pago.edit', compact('metodo_pago'));
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
        DB::delete("DELETE FROM metodos_pago WHERE id=?", [$id]);
        flash('Se ha eliminado el recurso')->success();
        return redirect()->route('metodos_pago.index');
    }
}
