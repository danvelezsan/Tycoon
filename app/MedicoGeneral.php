<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Persona;

class MedicoGeneral extends Persona
{
    protected $fillable = [
        'tarjeta_profesional', 'universidad'
    ];

}
