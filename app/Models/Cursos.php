<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cursos extends Model
{
    use HasFactory;
    protected $curso =[
        'nombre',
        'descripcion',
        'img',
        'uid',
        'fch_i',
        'fch_f',
        'n_ficha',
        'est'
    ];
}
