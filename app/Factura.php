<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Factura extends Model
{
    protected $table = 'facturas';
    protected $fillable = [
        'total', 'pasajero_id', 'vehiculo_id', 'metodo_pago_id', 'tarifa_id'
    ];

    public static function todas()
    {
        return DB::select("SELECT * FROM facturas ORDER BY id DESC");
    }

    public static function buscar($id)
    {
        return DB::selectOne("SELECT * FROM facturas WHERE id=?", [$id]);
    }

    public static function obtenerTotal()
    {
        return DB::select("select * from total_facturas;");
    }

    public static function insertar($factura)
    {
        return DB::insert("INSERT INTO facturas(total, pasajero_id, vehiculo_id, metodo_pago_id, tarifa_id) values (?, ?)", [$factura['total'], $factura['pasajero_id'],$factura['vehiculo_id'], $factura['metodo_pago_id'], $factura['tarifa_id']]);
    }

    public static function actualizar($factura)
    {
        return DB::update("UPDATE facturas SET total=?, vehiculo_id=?, metodo_pago_id=?, tarifa_id=? WHERE id=?", [$factura['total'], $factura['vehiculo_id'], $factura['metodo_pago_id'], $factura['tarifa_id'], $factura['id']]);
    }

    public static function eliminar($id)
    {
        return DB::delete("DELETE FROM facturas WHERE id=?", [$id]);
    }

    public function scopeUltimas($query)
    {
        return $query->orderBy('id', 'desc');
    }

    /**
     * Obtener el pasajero
     */
    public function pasajero()
    {
        return $this->belongsTo('App\User', 'pasajero_id');
    }

    /**
     * Obtener el vehículo
     */
    public function vehiculo()
    {
        return $this->belongsTo('App\Vehiculo');
    }

    /**
     * Obtener el método de pago
     */
    public function metodo_pago()
    {
        return $this->belongsTo('App\MetodoPago');
    }

    /**
     * Obtener la tarifa
     */
    public function tarifa()
    {
        return $this->belongsTo('App\Tarifa');
    }
}
