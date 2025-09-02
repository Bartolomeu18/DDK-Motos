<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;  
use App\Models\Moto; 
class Motoqueiro_ruas extends Model
 {
  protected $fillable = [
    'motoqueiro_id',
    'moto_id',
    'date',
];


      
     // Relacionamento com o Usuário (motoqueiro).
     
    public function motoqueiro()
    {
        return $this->belongsTo(User::class, 'motoqueiro_id');
    }

    
     // Relacionamento com a Moto.
     
    public function moto()
    {
        return $this->belongsTo(moto::class, 'moto_id');
    }


}
