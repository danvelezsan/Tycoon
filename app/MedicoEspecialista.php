<?php

namespace App;
use App\Persona;

use Illuminate\Database\Eloquent\Model;

class MedicoEspecialista extends Persona
{
    protected $fillable = [
        'tarjeta_profesional', 'dirConsultorio', 'especialidad', 'universidad'
    ];

}
