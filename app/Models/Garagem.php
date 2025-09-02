<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Garagem extends Model
{
   protected $fillable=[
    'name',
    'moto',
    'cota',
    'divida',
    'multa',
    'hora_de_chegada',
   ];
}
