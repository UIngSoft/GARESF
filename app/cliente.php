<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{
    protected $fillable =  [
    	'cedula', 'primer_nombre','segundo_nombre', 'primer_apellido', 'segundo_apellido', 'fechanacimiento', 'celular', 'telefono', 'correo'
    ];

    protected $primaryKey = 'cedula';

    
}
