<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Motoqueiro_rua extends Model
{
  protected $fillable = [
    'motoqueiro_id',
    'moto_id',
];


      
     // Relacionamento com o Usuário (motoqueiro).
     
    public function motoqueiro()
    {
        return $this->belongsTo(User::class, 'motoqueiro_id');
    }

    
     // Relacionamento com a Moto.
     
    public function moto()
    {
        return $this->belongsTo(Moto::class, 'moto_id');
    }
}
