<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\Hash;
use App\Models\User;
use App\Http\Requests\UserRequest;
class MotoqueiroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Agente/motoqueiros/Cadastrar');
    }

    /**
     * Store a newly created resource in storage.
     */
      public function store(UserRequest $request){
            try {
                User::create([
    'name' => $request->name,
    'email' => $request->email,
    'telefone' => $request->telefone,
    'bi_passaporte' => $request->bi_passaporte,
    'endereco' => $request->endereco,
    'role' => $request->role,
    'status' => $request->status === 'ativo' ? true : false,
    'password' => Hash::make($request->password),

                ]);
     return redirect()->route('motoqueiros.create')->with('sucesso','Usuario cadastrado com sucesso');

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
    public function edit(string $user)
    {
      try {
       $user = User::FindOrFail($user);
       return view('Agente.motoqueiros.Editar',['user'=>$user]);
      } catch (\Throwable $th) {
                  return "erro ao encontra o motoqueiro".$th->getMessage();
       
      }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $user)
    {
        try {
        User::where($user)->Update([
    'name' => $request->name,
    'email' => $request->email,
    'telefone' => $request->telefone,
    'bi_passaporte' => $request->bi_passaporte,
    'endereco' => $request->endereco,
    'role' => $request->role,
    'status' => $request->status === 'ativo' ? true : false,
    'password' => Hash::make($request->password),
             ]);
             return redirect()->back()->with('sucesso','usuário editado com sucesso');
        } catch (\Throwable $th) {
            //throw $th;
             return redirect()->back()->with('error','usuário não editado');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $user)
    {
       try {
        $user= User::FindOrFail($user);
      $user->delete();
       return redirect()->back()->with('sucesso','usuário excluido com sucesso');
        } catch (\Throwable $th) {
                  return redirect()->back()->with('Error','usuário excluido com sucesso');

        }
       
    }
}
