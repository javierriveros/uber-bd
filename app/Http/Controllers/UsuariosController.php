<?php

namespace App\Http\Controllers;

use App\Http\Requests\GuardarUsuario;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuariosController extends Controller
{
    /**
     * Muestra la lista de recursos
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::all();

        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Muestra el formulario para editar un usuario.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = User::findOrFail($id);

        return view('usuarios.edit', compact('usuario'));
    }

    /**
     * Actualiza el usuario en la BD.
     *
     * @param  GuardarUsuario|Request  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GuardarUsuario $request, $id)
    {
        $user = new \stdClass;

        $user->name = $request->get('name');
        $user->apellido = $request->get('apellido');
        $user->celular = $request->get('celular');

        if (auth()->user()->esAdministrador() && $request->has('tipo')) {
            $user->tipo = $request->get('tipo');
        }

        $resultado = User::actualizar(['name' => $user->name, 'apellido' => $user->apellido, 'celular' => $user->celular, 'tipo' => $user->tipo ?? 1, 'id' => $id]);

        if ($resultado) {
            flash('Usuario actualizado')->success();
        } else {
            flash('No se pudo actualizar el usuario')->error();
        }
        return redirect()->route('usuarios.index');
    }

    /**
     * Elimina el usuario de la BD.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        User::eliminar($id);
        flash('Se ha eliminado el usuario')->success();
        return redirect()->route('usuarios.index');
    }
}
