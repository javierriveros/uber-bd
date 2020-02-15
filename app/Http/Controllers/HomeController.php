<?php

namespace App\Http\Controllers;

use App\Factura;
use App\Vehiculo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }

    /**
     * Muestra la página principal.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (\Auth::check()) {
            if (Auth::user()->esConductor()) {
                return redirect()->route('conductor');
            } else if (Auth::user()->esAdministrador()) {
                return redirect()->route('administrador');
            }
            return view('home');
        }
        return view('unauthenticated');
    }

    /**
     * Muestra la vista de conductor.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function conductor()
    {
        $vehiculo = Vehiculo::where('conductor_id', \Auth::user()->id)->first();
//        $facturas = DB::table('facturas')->select("facturas.total, v.placa, d.name as pasajero_name, d.celular as pasajero_celular, ub1.direccion as origen_dir, ub1.nombre_barr as origen_barr, ub2.direccion as destino_dir, ub2.nombre_barr as destino_barr from facturas f left join vehiculos v on v.id=f.vehiculo_id left join users u on u.id=v.conductor_id left join users d on d.id=f.user_id left join tarifas t on t.id=f.tarifa_id left join ubicaciones ub1 on ub1.id=t.origen_id left join ubicaciones ub2 on ub2.id=t.destino_id WHERE u.id=?", [\Auth::user()->id]);
//        dd($facturas);
        return view('home.conductor', compact('vehiculo'));
    }

    /**
     * Muestra la vista de administrador.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function administrador()
    {
        return view('home.admin');
    }
}
