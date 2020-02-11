<?php

namespace App\Http\Middleware;

use Closure;

class ComprobarPasajero
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!auth()->user()->esPasajero()) {
            flash('No tiene permisos para acceder')->error();
            return redirect()->route('home');
        }

        return $next($request);
    }
}
