<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

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
}
