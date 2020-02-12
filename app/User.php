<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'apellido', 'celular', 'tipo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function esPasajero() {
        return $this->tipo == 1;
    }

    public function esConductor() {
        return $this->tipo == 2;
    }

    public function esAdministrador() {
        return $this->tipo == 3;
    }

    public function rol()
    {
        if ($this->esAdministrador()) {
            return 'Administrador';
        } else if($this->esConductor()) {
            return 'Conductor';
        } else if($this->esPasajero()) {
            return 'Pasajero';
        } else {
            return 'Desconocido';
        }
    }

    public static function todos()
    {
        return DB::select("SELECT * FROM users ORDER BY id DESC");
    }

    public static function buscar($id)
    {
        return DB::selectOne("SELECT * FROM users WHERE id=?", [$id]);
    }

    public static function actualizar($usuario)
    {
        return DB::update("UPDATE users SET name=?, tipo=?, apellido=?, celular=? WHERE id=?", [$usuario['name'], $usuario['tipo'], $usuario['apellido'], $usuario['celular'], $usuario['id']]);
    }

    public static function eliminar($id)
    {
        return DB::delete("DELETE FROM users WHERE id=?", [$id]);
    }
}
