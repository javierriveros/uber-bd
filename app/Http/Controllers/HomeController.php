<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        return view('home.conductor');
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
