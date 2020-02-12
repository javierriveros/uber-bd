<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MetodoPago extends Model
{
    protected $table = 'metodos_pago';
    protected $fillable = ['nombre_met', 'descuento'];

    public static function todos()
    {
        return DB::select("SELECT * FROM metodos_pago ORDER BY id DESC");
    }

    public static function buscar($id)
    {
        return DB::selectOne("SELECT * FROM metodos_pago WHERE id=?", [$id]);
    }

    public static function insertar($metodo_pago)
    {
        return DB::insert("INSERT INTO metodos_pago(nombre_met, descuento) values (?, ?)", [$metodo_pago['nombre_met'], $metodo_pago['descuento']]);
    }

    public static function actualizar($metodo_pago)
    {
        return DB::update("UPDATE metodos_pago SET nombre_met=?, descuento=? WHERE id=?", [$metodo_pago['nombre_met'], $metodo_pago['descuento'], $metodo_pago['id']]);
    }

    public static function eliminar($id)
    {
        return DB::delete("DELETE FROM metodos_pago WHERE id=?", [$id]);
    }
}
