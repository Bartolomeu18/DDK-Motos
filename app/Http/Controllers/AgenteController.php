<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\moto;

class AgenteController extends Controller
{
      /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::User()->role =='admin') {
            $motorizadas = moto::count();
        $motoqueiros = User::where('role','motoqueiro')->count();
        $usuarios = User::where('role','Agente')->get();
       return view('Admin.Agente.Dashboard', compact('usuarios','motorizadas','motoqueiros'));
        }else {
          $motorizadas = moto::count();
        $motoqueiros = User::where('role','motoqueiro')->count();
        $usuario = Auth::User();
        $usuarios = User::where('role','Agente')->get();
       return view('Agente.Dashboard', compact('usuario','motorizadas','motoqueiros'));   
        }
       
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.Cadastrar_Cliente');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
       User::create([
    'nome' => $request->nome,
    'email' => $request->email,
    'telefone'=> $request->telefone,
    'bi_passaporte' =>$request->bilhete,
    'endereco' =>$request->endereco,
    'password'=>$request->hash::make($request->password), 
    'role'=>$request->role,
       ]);
     return redirect()->route('store-user')->with('sucesso','Usuario cadastrado com sucesso');

    }catch(throwable $th){
        return redirect()->back()->with('error','erro au ccadastrar usuário');
    }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       try {
        $info = User::findOrFail($id);
        return view('index',compact('info'));
       } catch (\Throwable $th) {
        return back()->with('error','usuario não encontrado');
       }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $user = User::FindOrFail($id);
            return view('Editar-user',compact('user'));
        } catch (\Throwable $th) {
            return back()->with('error','usuario não encontrado');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
        User::where('id',$id)->Update([
    'nome' => $request->nome,
    'email' => $request->email,
    'telefone'=> $request->telefone,
    'bi_passaporte' =>$request->bilhete,
    'endereco' =>$request->endereco,
    'password'=>$request->hash::make($request->password), 
    'role'=>$request->role,
             ]);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
        $user= user::Find($id);
            $user::delete();
            return redirect()->route('login')->with('usuario Deletado!');
        }catch(throwable $th){
            return back()->with('error','usuario não encontrado');

        }
       
    }
    
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function motoqueiros(){
       $request = request('search');
    //dd($request );
        if($request){
        $usuarios= User::where('name','like','%'.$request.'%')->get();  
        }else{
           $usuarios= User::where('role','motoqueiro')->get();
        }
       // dd($usuarios);
        return view('Agente.motoqueiros.index',compact('usuarios'));
   
    }
}
