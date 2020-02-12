<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Vehiculo extends Model
{
    protected $table = 'vehiculos';
    protected $fillable = ['placa', 'modelo', 'color', 'conductor_id'];

    public static function todos()
    {
        return DB::select("SELECT * FROM vehiculos ORDER BY id DESC");
    }

    public static function buscar($id)
    {
        return DB::selectOne("SELECT * FROM vehiculos WHERE id=?", [$id]);
    }

    public static function insertar($vehiculo)
    {
        return DB::insert("INSERT INTO vehiculos(placa, modelo, color, conductor_id) values (?, ?)", [$vehiculo['placa'], $vehiculo['modelo'], $vehiculo['color'], $vehiculo['conductor_id']]);
    }

    public static function actualizar($vehiculo)
    {
        return DB::update("UPDATE vehiculos SET placa=?, modelo=?, color=? WHERE id=?", [$vehiculo['placa'], $vehiculo['modelo'], $vehiculo['color'], $vehiculo['id']]);
    }

    public static function eliminar($id)
    {
        return DB::delete("DELETE FROM vehiculos WHERE id=?", [$id]);
    }

    /**
     * Obtener el conductor
     */
    public function conductor()
    {
//        return User::buscar($this->conductor_id);
        return $this->belongsTo('App\User', 'conductor_id');
    }
}
