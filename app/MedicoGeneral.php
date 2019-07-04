<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicoGeneral extends Model
{
    protected $fillable = [
        'cedula', 'nombre', 'apellidos','fecha_nacimiento','genero', 'tarjeta_profesional', 'universidad'
    ];

    protected $casts = [
        'fecha_nacimiento' => 'date',
    ];

}
