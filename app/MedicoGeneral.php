<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Persona;

class MedicoGeneral extends Persona
{
    protected $fillable = [
        'cedula', 'nombre', 'apellidos','fecha_nacimiento','genero','tarjeta_profesional', 'universidad'
    ];

    protected $casts = [
        'fecha_nacimiento' => 'date',
    ];

    public function universidad()
    {
        return $this->belongsTo(App\Universidad, 'universidad', 'nombre');
    }

}
