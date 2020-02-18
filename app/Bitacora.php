<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Bitacora extends Model
{
    protected $table = 'ubicaciones';

    public static function facturas()
    {
        return DB::select("SELECT * FROM bitacora_facturas ORDER BY fecha DESC");
    }

    public static function usuarios()
    {
        return DB::select("SELECT * FROM bitacora_usuarios ORDER BY fecha DESC");
    }
}
