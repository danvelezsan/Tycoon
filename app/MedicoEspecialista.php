<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicoEspecialista extends Model
{
    public $timestamp = false;

    protected $fillable = [
        'cedula', 'nombre', 'apellidos','fecha_nacimiento','genero', 'tarjeta_profesional', 'dirConsultorio', 'especialidad', 'titulo'
    ];

    protected $casts = [
        'fecha_nacimiento' => 'date',
    ];

}
