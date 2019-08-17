<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
        protected $fillable = [
        'id', 'verificacionUsada', 'fecha', 'cedulaPaciente', 'cedulaMedico', 
    ];

    protected $casts = [
        'fecha' => 'date', 'verificacionUsada' => 'boolean',
    ];

}
