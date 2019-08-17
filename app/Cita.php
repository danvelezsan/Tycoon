<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $fillable = [
        'id', 'cedulaPaciente', 'cedulaMedico','fecha','hora',
    ];

    protected $casts = [
        'fecha' => 'date', 'hora' => 'time',
    ];

}
