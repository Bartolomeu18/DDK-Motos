<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Garagem;
use App\Models\User;
use App\Models\Motoqueiro_ruas;
use App\Models\moto;
class RelatorioController extends Controller
{
   public function diario(){
        
        //pegando motoqueiros que estiveram no campo.
    $motoqueirosNoCampo = Motoqueiro_ruas::where('date', today())->get();
        $data= today();
        $dados=[];
   foreach ($motoqueirosNoCampo as $motoqueiroNoCampo) {
     $nomeDoMotoqueiro =User::where('id',$motoqueiroNoCampo->motoqueiro_id)->first();
     //$nome = $motoqueiroNoCampo->name;
    $horaDeChegada = garagem::where('id_motoqueiro',$motoqueiroNoCampo->motoqueiro_id)->whereDate('created_at',$data)->first();
    
    $dados[]=[
        'nomeMotoqueiro'=>$nomeDoMotoqueiro->name,
        'id'=>$motoqueiroNoCampo->moto_id,
        'horaDeChegada'=>$horaDeChegada?->hora_de_chegada,
    ];
   } 
    $pdf = Pdf::loadView('Agente.relatório.relatórioDiario', compact('dados','data'))->setPaper('a4', 'landscape');
    return $pdf->download('relatórioDiario.pdf');  
  // return view('Agente.relatório.relatórioDiario',compact('dados','data'));

}
}
