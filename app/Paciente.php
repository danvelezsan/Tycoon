<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Persona;

class Paciente extends Persona
{

    public function citas()
    {
        return $this->hasMany(App\Cita, 'cedulaPaciente', 'cedula');
    }

    public function ordenes()
    {
        return $this->hasMany(App\Orden, 'cedulaPaciente', 'cedula');
    }

}
