<?php

namespace App\Http\Controllers;

use App\Models\Motoqueiro_ruas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\moto;

class MotoqueiroNoCampoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if (Auth::User('rule','admin')) {
    $request = request('search');
    //dd($request );
        if($request){
        $usuarios= User::where('name','like','%'.$request.'%')->get();  
        }else{
           $usuarios= User::where('role','motoqueiro')->get();
        }
       // dd($usuarios);
        return view('Admin.motoqueiro_rua.index',compact('usuarios'));
        }else{
         $request = request('search');
    //dd($request );
        if($request){
        $usuarios= User::where('name','like','%'.$request.'%')->get();  
        }else{
           $usuarios= User::where('role','motoqueiro')->get();
        }
       // dd($usuarios);
        return view('Agente.motoqueiro_rua.index',compact('usuarios'));
   }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(string $id)
    {
        $get = moto::where('motoqueiro_id',$id)->first();
        $motoId= $get->id;
        $date=today();
        try {
           Motoqueiro_ruas::create([
            'motoqueiro_id'=>$id,
            'moto_id'=>$motoId,
            'date'=>$date,
           ]); 
            return redirect()->back()->with('sucesso',' motoqueiro pronto para entrar no campo');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error','erro ao adicionar motoqueiro na rua' .$th);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(MotoqueiroNoCampo $motoqueiroNoCampo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MotoqueiroNoCampo $motoqueiroNoCampo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MotoqueiroNoCampo $motoqueiroNoCampo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MotoqueiroNoCampo $motoqueiroNoCampo)
    {
        //
    }
}
