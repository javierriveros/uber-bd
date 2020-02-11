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
}
