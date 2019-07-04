<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicoEspecialista extends Model
{
    protected $fillable = [
        'cedula', 'nombre', 'apellidos','fecha_nacimiento','genero', 'tarjeta_profesional', 'dirConsultorio', 'especialidad', 'universidad'
    ];

    protected $casts = [
        'fecha_nacimiento' => 'date',
    ];

}
