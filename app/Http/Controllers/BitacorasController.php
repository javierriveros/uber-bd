<?php

namespace App\Http\Controllers;

use App\Bitacora;
use Illuminate\Http\Request;

class BitacorasController extends Controller
{
    public function facturas()
    {
        $bitacoras = Bitacora::facturas();
        return view('bitacoras.facturas', compact('bitacoras'));
    }

    public function usuarios()
    {
        $usuarios = Bitacora::usuarios();
        return view('bitacoras.usuarios', compact('usuarios'));
    }
}
