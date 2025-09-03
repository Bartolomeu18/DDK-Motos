<?php

namespace App\Http\Controllers;

use App\Models\Garagem;
use App\Models\User;
use App\Models\Motoqueiro_ruas;
use App\Models\moto;
use Illuminate\Http\Request;

class GaragemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $MCampos=  Motoqueiro_ruas::where('date', today())->get();
        $data= today();
    foreach ($MCampos as $MCampo) {
     $nomeDoMotoqueiro =User::where('id',$MCampo->motoqueiro_id)->first();
     //$nome = $nomeDoMotoqueiro->name;
     $modeloDaMotoNoCampo = moto::where('id',$MCampo->moto_id)->first();
    // $modelo = $modeloDaMotoNoCampo->modelo;
    $horaDeChegada = garagem::where('id_motoqueiro',$MCampo->motoqueiro_id)->first();
    $dados[]=[
        'nomeMotoqueiro'=>$nomeDoMotoqueiro->name,
        'modeloMoto'=> $modeloDaMotoNoCampo->modelo,
        'id'=>$MCampo->moto_id,
        'horaDeChegada'=>$horaDeChegada?->hora_de_chegada,
    ];
    }

     
       return view('Agente.Garagem.index', compact('dados','data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id,$nome,$modelo)
    {
        //dd($dado);
       return view('Agente.Garagem.formulário',compact('id','nome','modelo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,string $id,string $nome,string $modelo)
    {

//dd($id);

        $request->validate([
    'hora_de_chegada' => 'required|date_format:H:i',
]);
        try {
        //dd($request->all());
        Garagem::create([ 
    'name'=>$request->name,
    'moto' =>$request->moto,
    'cota'=>$request->cota,
    'divida'=>$request->divida,
    'multa' =>$request->multa,
    'hora_de_chegada' =>$request->hora_de_chegada,
    'id_motoqueiro'=>$id,

        ]);
          return redirect()->back()->with('sucesso', 'moto recebida');
        } catch (\Throwable $th) {
          return "error ao cadastara os dados de chegada" .$th;
        }
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Garagem $garagem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Garagem $garagem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Garagem $garagem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Garagem $garagem)
    {
        //
    }
}
