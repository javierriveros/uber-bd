<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tarifa extends Model
{
    protected $table = 'tarifas';
    protected $fillable = ['valor', 'origen_id', 'destino_id'];

    public static function todas()
    {
        return DB::select("SELECT * FROM tarifas ORDER BY id DESC");
    }

    public static function buscar($id)
    {
        return DB::selectOne("SELECT * FROM tarifas WHERE id=?", [$id]);
    }

    public static function insertar($metodo_pago)
    {
        return DB::insert("INSERT INTO tarifas(valor, origen_id, destino_id) values (?, ?)", [$metodo_pago['valor'], $metodo_pago['origen_id'], $metodo_pago['destino_id']]);
    }

    public static function actualizar($metodo_pago)
    {
        return DB::update("UPDATE tarifas SET valor=?, origen_id=?, destino_id=? WHERE id=?", [$metodo_pago['valor'], $metodo_pago['origen_id'], $metodo_pago['destino_id'], $metodo_pago['id']]);
    }

    public static function eliminar($id)
    {
        return DB::delete("DELETE FROM tarifas WHERE id=?", [$id]);
    }

    /**
     * Obtener el origen
     */
    public function origen()
    {
//        return $this->origen = DB::selectOne('SELECT * FROM ubicaciones WHERE id=?', [$this->origen_id]);
        return $this->belongsTo('App\Ubicacion', 'origen_id');
    }

    /**
     * Obtener el destino
     */
    public function destino()
    {
//        return $this->destino = DB::selectOne('SELECT * FROM ubicaciones WHERE id=?', [$this->destino_id]);
        return $this->belongsTo('App\Ubicacion', 'destino_id');
    }
}
