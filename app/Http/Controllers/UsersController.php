<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function index()
    {
        $usuarios = User::orderBy('id')->get();

        return view('usuarios.index', compact('usuarios'));
    }

    // Edita usuarios diferentes al logueado
    // Disponible sólo para el administrador
    public function edit($id)
    {
        $usuario = User::findOrFail($id);

        return view('usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, $id)
    {
        $user = new \stdClass;

        $user->name = $request->get('name');
        $user->apellido = $request->get('apellido');
        $user->celular = $request->get('celular');

        if (auth()->user()->esAdministrador() && $request->has('tipo')) {
            $user->tipo = $request->get('tipo');
        }

        DB::update("UPDATE users SET name=?, apellido=?, celular=?, tipo=? WHERE id=?", [$user->name, $user->apellido, $user->celular, $user->tipo ?? 1, $id]);

        flash('Usuario actualizado')->success();
        return redirect()->route('usuarios.index');
    }

    public function destroy( $id)
    {
        DB::delete("DELETE FROM users WHERE id=?", [$id]);
        flash('Se ha eliminado el usuario')->success();
        return redirect()->route('usuarios.index');
    }
}
