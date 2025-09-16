<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Uma extends Model
{
     protected $fillable = [
        'nombre',
        'velocidad',
        'stamina',
        'fuerza',
        'gutz',
        'inteligencia',
        'imagen',
    ];
}
