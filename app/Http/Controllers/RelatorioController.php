<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Garagem;
use App\Models\User;
use App\Models\Motoqueiro_ruas;
use Carbon\Carbon;
use App\Models\moto;
class RelatorioController extends Controller
{
   public function  diario(){
    $logoPath = public_path('img/ddk-logo-rbg.png');
   $dataActual = today()->toDateString();
   $dados= Garagem::whereDate('created_at',Carbon::now()->toDateString())->get();
    $Motoqueiros = Motoqueiro_ruas::whereDate('date', $dataActual)->get();
    $antesDeOntem = Garagem::whereDate('created_at',Carbon::now()->subDay(2)->toDateString())->sum('cota');
    $ontem = Garagem::whereDate('created_at',Carbon::now()->subDay(1)->toDateString())->sum('cota');
    $hoje =  Garagem::whereDate('created_at',Carbon::now()->toDateString())->sum('cota');
    
    $cotas=[
      $antesDeOntem?:0,
      $ontem?:0,
      $hoje?:0,
    ]; 
   $pdf = Pdf::loadView('Agente.relatório.relatórioDiario', compact('dados','Motoqueiros','cotas','logoPath'))->setPaper('a4', 'landscape');
    return $pdf->download('relatórioDiario.pdf');  
     //return view('Agente.relatório.relatórioDiario', compact('dados','Motoqueiros','cotas'));
   }
}