<?php

namespace App\Http\Controllers;

use App\Models\moto;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        if (Auth::User('rule','admin')) {
              $request = request('search');
        if($request){
        $motos = moto::where('modelo','like','%'.$request.'%')->get();
        return view('Admin.moto.index',compact('motos'));  
        }else {
        $motos = moto::get();
        return view('Admin.moto.index',compact('motos'));  
        }      
        }else {
        $request = request('search');
        if($request){
        $motos = moto::where('name','like','%'.$request.'%')->get();
        return view('Agente.moto.index',compact('motos'));  
        }else {
        $motos = moto::get();
        return view('Agente.moto.index',compact('motos'));  
        }  
        }
      
       
    }

    /**
     * Show the form for creating a new resource.
     */
  public function create()
{
    $motoqueiros = User::where('role', 'motoqueiro')->get();
    return view('Agente.moto.create', compact('motoqueiros'));
}
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'modelo' => 'required|string|max:100',
        'marca' => 'required|string|max:100',
        'matricula' => 'required|string|max:50|unique:motos,matricula',
        'ano' => 'required|integer|min:2000|max:' . date('Y'),
        'cor' => 'required|string|max:50',
        'estado' => 'required|in:ativa,manutencao,parada',
        'motoqueiro_id' => 'required|exists:users,id',
        'data_entrada' => 'required|date',
        'observacoes' => 'nullable|string',
    ]);
    if (moto::where('motoqueiro_id', $request->motoqueiro_id)->exists()) {
    return back()->with('error', 'Este motoqueiro já está vinculado a uma moto.');
}else{
    try {
          moto::create([
        'modelo' => $request->modelo,
        'marca' => $request->marca,
        'matricula' => $request->matricula,
        'ano' => $request->ano,
        'cor' => $request->cor,
        'estado' => $request->estado,
        'motoqueiro_id' => $request->motoqueiro_id,
        'data_entrada' => now(),
        'observacoes' => $request->observacoes,
    ]);
        return redirect()->route('motos.create')->with('success', 'Moto cadastrada com sucesso!');

    } catch (\Throwable $th) {
        return redirect()->back()->with('error', 'erro ao tentar armazenar arquivos! '.$th );
    }
}

}


    /**
     * Display the specified resource.
     */
    public function show(moto $moto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $moto = moto::findOrFail($id)->first();


$motoqueiroNome = $moto->motoqueiro->name ?? 'Sem responsável';

return view('Agente.moto.editar', [
    'moto' => $moto,
    'motoqueiroNome' => $motoqueiroNome
]);

    //   return view('Agente.moto.editar',['moto'=>$moto,'motoqueiro'=>$motoqueiro]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,string $id)
    {
        try {
             moto::where('id',$id)->Update([
        'modelo' => $request->modelo,
        'marca' => $request->marca,
        'matricula' => $request->matricula,
        'ano' => $request->ano,
        'cor' => $request->cor,
        'estado' => $request->estado,
        'motoqueiro_id' => $request->motoqueiro_id,
        'data_entrada' => $request->data_entrada,
        'observacoes' => $request->observacoes,
       ]); 
        return redirect()->back()->with('sucesso', 'moto actualizada com sucesso' ); 
        } catch (\Throwable $th) {
                   return redirect()->back()->with('error', 'erro ao tentar armazenar arquivos! '.$th );
        }
     
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
        $moto = moto::findOrFail($id);
        $moto::destroy();
        return redirect()->back()->with('sucesso','moto eliminada dos registros');     
        } catch (\Throwable $th) {
        return redirect()->back()->with('sucesso', 'erro excluir moto' .$th);     
        }

    }
}
