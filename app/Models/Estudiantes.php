<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiantes extends Model
{
    use HasFactory;
    protected $estudiantes=[
        'nombres',
        'apellidos',
        'uid',
        'tp_doc',
        'n_doc',
        'telefono',
        'correo',
        'id_curso',
        'est'
    ];
}
