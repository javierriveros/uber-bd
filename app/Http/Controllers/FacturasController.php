<?php

namespace App\Http\Controllers;

use App\Factura;
use App\Http\Requests\GuardarFactura;
use App\MetodoPago;
use App\Tarifa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FacturasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facturas = Factura::with(['pasajero', 'vehiculo', 'metodo_pago', 'tarifa'])->ultimas()->get();

        return view('facturas.index', compact('facturas'));
    }

    /**
     * Muestra el formulario para crear un nuevo recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $pasajero = $request->get('pasajero');
        $vehiculos = $this->cargarVehiculos();
        $metodos_pago = $this->cargarMetodosPago();
        $usuarios = $this->cargarUsuarios();
        $tarifas = $this->cargarTarifas();

        $factura = new Factura;
        return view('facturas.create', compact('factura', 'vehiculos', 'metodos_pago', 'usuarios', 'tarifas', 'pasajero'));
    }

    /**
     * Guarda un recurso en la BD.
     *
     * @param  GuardarFactura|Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuardarFactura $request)
    {
        $validData = $request->validate([
            'vehiculo_id' => 'required|numeric',
            'metodo_pago_id' => 'required|numeric',
            'tarifa_id' => 'required|numeric',
            'pasajero_id' => 'numeric'
        ]);

        $factura = new Factura($validData);

        // Si la factura la crea el pasajero
        if ($factura->pasajero_id == null) {
            $factura->pasajero_id = \Auth::user()->id;
        }
        $metodo_pago = MetodoPago::buscar($factura->metodo_pago_id);
        $tarifa = Tarifa::buscar($factura->tarifa_id);
        // Calcular el total de la factura
        $factura->total = $tarifa->valor - $metodo_pago->descuento;

        if ($factura->save()) {
            flash('Se ha guardado la factura')->success();
            return redirect()->route('facturas.show', $factura);
        } else {
            return view('facturas.create', compact('factura'));
        }
    }

    /**
     * Muestra la factura.
     *
     * @param  \App\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function show(Factura $factura)
    {
        if (\Auth::user()->esConductor() && \Auth::user()->id != $factura->vehiculo->conductor_id) {
            flash('No tienes permisos para realizar esa acción')->error();
            return redirect()->route('conductor');
        }
        $vehiculo = null;
        return view('facturas.show', compact('factura', 'vehiculo'));
    }

    /**
     * Elimina el recurso de la BD.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Factura::eliminar($id);
        flash('Se ha eliminado el recurso')->success();
        return redirect()->route('facturas.index');
    }

    private function cargarVehiculos()
    {
        $items = DB::select("SELECT t1.id, t1.placa, t2.name, t2.apellido FROM vehiculos t1 INNER JOIN users t2 ON t1.conductor_id=t2.id;");
        $vehiculos = array();

        foreach ($items as $vehiculo)
        {
            $vehiculos[$vehiculo->id] = $vehiculo->placa . " - " . $vehiculo->name . " " . $vehiculo->apellido;
        }
        return $vehiculos;
    }

    private function cargarMetodosPago()
    {
        $items = DB::select("SELECT id, nombre_met FROM metodos_pago");
        $metodos_pago = array();

        foreach ($items as $metodo_pago)
        {
            $metodos_pago[$metodo_pago->id] = $metodo_pago->nombre_met;
        }
        return $metodos_pago;
    }

    private function cargarUsuarios()
    {
        $items = DB::select("SELECT id, name, email, apellido FROM users WHERE tipo=1");
        $usuarios = array();

        foreach ($items as $usuario)
        {
            $usuarios[$usuario->id] = $usuario->name . " " . $usuario->apellido . " - " . $usuario->email;
        }
        return $usuarios;
    }

    private function cargarTarifas()
    {
        $items = Tarifa::with(['origen', 'destino'])->get();
        $tarifas = array();

        foreach ($items as $tarifa) {
            $tarifas[$tarifa->id] = "Valor: " .
                $tarifa->valor .
                " - Origen: " . $tarifa->origen->nombre_barr . " Dir: " . $tarifa->origen->direccion .
                " - Destino: " . $tarifa->destino->nombre_barr . " Dir: " . $tarifa->destino->direccion;
        }

        return $tarifas;
    }
}
