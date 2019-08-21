<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Universidad extends Model
{
    protected $fillable = [
        'nombre',
    ];

    public function medicos()
    {
        return $this->hasMany(App\MedicoGeneral, 'universidad', 'nombre');
    }

    public function especialistas()
    {
        return $this->hasMany(App\MedicoEspecialista, 'universidad', 'nombre');
    }
}
