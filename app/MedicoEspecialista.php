<?php

namespace App;
use App\Persona;

use Illuminate\Database\Eloquent\Model;

class MedicoEspecialista extends Persona
{
    protected $fillable = [
        'cedula', 'nombre', 'apellidos','fecha_nacimiento','genero','tarjeta_profesional', 'dirConsultorio', 'especialidad', 'universidad'
    ];

    protected $casts = [
        'fecha_nacimiento' => 'date',
    ];

    public function universidad()
    {
        return $this->belongsTo(App\Universidad, 'universidad', 'nombre');
    }

    public function especialidad()
    {
        return $this->belongsTo(App\Especialidad, 'especialidad', 'nombre');
    }
}
