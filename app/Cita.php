<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $fillable = [
        'cedulaPaciente', 'nombrePaciente', 'cedulaMedico', 'nombreMedico', 'idOrden', 'fecha','hora',
    ];

    protected $casts = [
        'fecha' => 'date', 'hora' => 'time',
    ];

}
