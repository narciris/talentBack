<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blocks extends Model
{
    protected $fillable = [
        'user_id',
        'bono_id',
        'bloqueo_vigente'
    ];

    protected $table = "bloqueos";
    public $incrementing = false;
}
