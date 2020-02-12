<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $table = 'facturas';
    protected $fillable = [
        'total', 'iva', 'user_id', 'vehiculo_id', 'metodo_pago_id', 'tarifa_id'
    ];

    /**
     * Obtener el pasajero
     */
    public function user()
    {
        return $this->belongsTo('App\User');
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

    public static function todas()
    {
        return DB::select("SELECT * FROM facturas ORDER BY id DESC");
    }

    public static function buscar($id)
    {
        return DB::selectOne("SELECT * FROM facturas WHERE id=?", [$id]);
    }

    public static function insertar($factura)
    {
        return DB::insert("INSERT INTO facturas(total, iva, user_id, vehiculo_id, metodo_pago_id, tarifa_id) values (?, ?)", [$factura['total'], $factura['iva'], $factura['user_id'],$factura['vehiculo_id'], $factura['metodo_pago_id'], $factura['tarifa_id']]);
    }

    public static function actualizar($factura)
    {
        return DB::update("UPDATE facturas SET total=?, iva=?,vehiculo_id=?, metodo_pago_id=?, tarifa_id=? WHERE id=?", [$factura['total'], $factura['vehiculo_id'], $factura['metodo_pago_id'], $factura['tarifa_id'], $factura['id']]);
    }

    public static function eliminar($id)
    {
        return DB::delete("DELETE FROM facturas WHERE id=?", [$id]);
    }
}
