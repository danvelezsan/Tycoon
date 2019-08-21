<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
    protected $fillable = [
        'nombre',
    ];

    public function especialistas()
    {
        return $this->hasMany(App\MedicoEspecialista, 'especialidad', 'nombre');
    }

}
