<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class moto extends Model
{
       protected $fillable = [
        'modelo',
        'marca',
        'matricula',
        'ano',
        'cor',
        'estado',
        'motoqueiro_id',
        'data_entrada',
        'data_saida',
        'observacoes',
    ];
// app/Models/Moto.php
public function motoqueiro()
{
    return $this->belongsTo(User::class, 'motoqueiro_id');
}
}
