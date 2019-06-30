<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
	public $timestamp = false;

    protected $fillable = [
        'cedula', 'nombre', 'apellidos','fecha_nacimiento','genero'
    ];

    protected $casts = [
        'fecha_nacimiento' => 'date',
    ];

}
