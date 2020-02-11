<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tarifa extends Model
{
    protected $table = 'tarifas';
    protected $fillable = ['valor', 'origen_id', 'destino_id'];

    public static function todas() {
        return DB::select('SELECT * FROM tarifas ORDER BY id DESC');
    }

    /**
     * Obtener el origen
     */
    public function origen()
    {
        return $this->origen = DB::selectOne('SELECT * FROM ubicaciones WHERE id=?', [$this->origen_id]);
//        return $this->belongsTo('App\Ubicacion', 'origen_id');
    }

    /**
     * Obtener el destino
     */
    public function destino()
    {
        return $this->destino = DB::selectOne('SELECT * FROM ubicaciones WHERE id=?', [$this->destino_id]);
//        return $this->belongsTo('App\Ubicacion', 'destino_id');
    }
}
