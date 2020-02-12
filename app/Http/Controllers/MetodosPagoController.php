<?php

namespace App\Http\Controllers;

use App\MetodoPago;
use App\Ubicacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MetodosPagoController extends Controller
{
    /**
     * Muestra la lista de recursos
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $metodos_pago = MetodoPago::todos();

        return view('metodos_pago.index', ['metodos_pago' => $metodos_pago]);
    }

    /**
     * Muestra el formulario para crear un nuevo recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $metodo_pago = new Ubicacion;
        return view('metodos_pago.create', compact('metodo_pago'));
    }

    /**
     * Guarda un recurso en la BD.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $metodo_pago = new MetodoPago($request->all());
        // $resultado = MetodoPago::insertar(['nombre_met' => $request->get('nombre_met'), 'descuento' => $request->get('descuento')]);
        if ($metodo_pago->save()) {
            flash('Se ha guardado el método de pago')->success();
            return redirect()->route('metodos_pago.index', $metodo_pago->id);
        } else {
            return view('metodos_pago.create', compact('metodo_pago'));
        }
    }

    /**
     * Muestra el formulario para editar un recurso.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $metodo_pago = MetodoPago::buscar($id);
        if ($metodo_pago == null) {
            flash('El recurso solicitado no existe')->success();
            return redirect()->route('metodos_pago.index', 302);
        }
        return view('metodos_pago.edit', compact('metodo_pago'));
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
        $metodo_pago = MetodoPago::buscar($id);

        if ($metodo_pago == null) {
            flash('El recurso solicitado no existe')->success();
            return redirect()->route('metodos_pago.index', 302);
        }

        $resultado = MetodoPago::actualizar(['nombre_met' => $request->get('nombre_met'), 'descuento' => $request->get('descuento'), 'id' => $id]);

        if ($resultado) {
            flash('Se ha actualizado el recurso')->success();
            return redirect()->route('metodos_pago.index');
        } else {
            return view('metodos_pago.edit', compact('metodo_pago'));
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
        MetodoPago::eliminar($id);
        flash('Se ha eliminado el recurso')->success();
        return redirect()->route('metodos_pago.index');
    }
}
