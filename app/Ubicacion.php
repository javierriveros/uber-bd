<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Ubicacion extends Model
{
    protected $table = 'ubicaciones';
    protected $fillable = ['nombre_barr', 'direccion'];

    public static function todas()
    {
        return DB::select("SELECT * FROM ubicaciones ORDER BY id DESC");
    }

    public function direccion_completa() {
        return $this->nombre_barr . " " . $this->direccion;
    }

    public static function buscar($id)
    {
        return DB::selectOne("SELECT * FROM ubicaciones WHERE id=?", [$id]);
    }

    public static function guardar($ubicacion)
    {
        return DB::insert("INSERT INTO ubicaciones(nombre_barr, direccion) values (?, ?)", [$ubicacion['nombre_barr'], $ubicacion['direccion']]);
    }

    public static function actualizar($datos)
    {
        return DB::update("UPDATE ubicaciones SET nombre_barr=?, direccion=? WHERE id=?", [$datos['nombre_barr'], $datos['direccion'], $datos['id']]);
    }

    public static function eliminar($id)
    {
        return DB::delete("DELETE FROM ubicaciones WHERE id=?", [$id]);
    }
}
