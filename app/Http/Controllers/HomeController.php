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
//        dd(Auth::user()->vehiculo);

        $facturas = DB::select("select * from facturas_conductor(?);", [$vehiculo->id ?? null]);
        return view('home.conductor', compact('vehiculo', 'facturas'));
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
