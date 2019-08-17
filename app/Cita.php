<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $fillable = [
        'id', 'cedulaPaciente', 'cedulaMedico', 'idOrden', 'fecha','hora',
    ];

    protected $casts = [
        'fecha' => 'date', 'hora' => 'time',
    ];

}
