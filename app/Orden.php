<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
        protected $fillable = [
        'verificacionUsada', 'fecha', 'cedulaPaciente', 'especialidad', 'cedulaMedico', 
    ];

    protected $casts = [
        'fecha' => 'date', 'verificacionUsada' => 'boolean',
    ];

    public function paciente()
    {
        return $this->belongsTo(App\Paciente, 'cedulaPaciente', 'cedula');
    }

}
