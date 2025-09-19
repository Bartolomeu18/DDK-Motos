<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request\AdminRequest;
use App\Models\moto;
use App\Models\User;
class AdminController extends Controller
{
    public function index (){
        $motorizadas = moto::count();
        $motoqueiros = User::where('role','motoqueiro')->count();
        $Agente = User::where('role','agente')->count();
        $usuario = Auth::User();
        return view('Admin.Dashboard',compact('usuario','motorizadas','motoqueiros','Agente' ));

    }
    public function show()
        {
            $request = request('search');
            if($request){
              $usuarios = User::where('role','admin')
              ->where('name','like','%'.$request.'%')
              ->get();
                        }else {
                 $usuarios = User::where('role', 'Admin')
                ->orderBy('id', 'asc') // ou 'desc'
                ->get();         
            }
          return view('Admin.index', compact('usuarios'));
        }

    public function create(){
         return View('Admin.create');
    }

    public function store(Request $request){
        if ($request) { 
            try{
            User::create([
    'name' => $request->name,
    'email' => $request->email,
    'telefone'=> $request->telefone,
    'bi_passaporte' =>$request->bilhete,
    'endereco' =>$request->endereco,
    'password'=>hash::make($request->password), 
    'role'=>$request->role,
            ]);
            return redirect()->back()->with('sucesso','Admin cadastrado com sucesso');
            } catch (\Throwable $th) {
            return redirect()->back()->with('error','Erro ao cadastrar Adminstrador');
            }
        }

    }

    public function Edite(string $id){
         $userData = User::FindOrFail($id);
          
         return view('Admin.editar',compact('userData','id'));
    }

    public function update(request $request,string $id){
    
        try {
         $user = User::find($id);
        
        $user->update([
            'name'        => $request->name,
            'email'       => $request->email,
            'telefone'    => $request->telefone,
            'bi_passaporte' => $request->bilhete,
            'endereco'    => $request->endereco,
            'password'    => Hash::make($request->password),
            'role'        => $request->role,
        ]);
        return redirect()->back()->with('sucesso','Admin editado com sucesso');
            } catch (\Throwable $th) {
            return redirect()->back()->with('error','Erro ao editar Adminstrador'.$th);
            }

    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function Delete(string $id){
        $user =User::find($id);
        $user->delete();
        return redirect()->back()->with('sucesso','usuário deletado com sucesso');

    }
 }
