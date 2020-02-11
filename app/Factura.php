<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $table = 'facturas';
    protected $fillable = [
        'total', 'iva', 'user_id', 'vehiculo_id', 'metodo_pago_id', 'tarifa_id'
    ];
}
