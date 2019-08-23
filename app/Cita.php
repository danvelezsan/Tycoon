<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $fillable = [
        'cedulaPaciente', 'nombrePaciente', 'cedulaMedico', 'nombreMedico', 'idOrden', 'fechaHora',
    ];

    protected $casts = [
        'fecha' => 'date', 'hora' => 'time',
    ];

    public function paciente()
    {
        return $this->belongsTo(App\Paciente, 'cedulaPaciente', 'cedula');
    }
    
}
