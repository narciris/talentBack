<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Blocks;


class Bonos extends Model
{

    protected $table = "bonos";
    protected $fillable = [
        "name",
        "description",
        "costo_puntos",
        "habilitada",
        "tipo",
        "bloqueo_vigente"
    ];

    public function bloqueos (){
        return $this->hasMany(BLocks::class,'bono_id');
    }
}
