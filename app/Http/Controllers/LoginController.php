<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }
    public function attempt(Request $request){
 $credentials = $request->only('email','password');
    if(auth::attempt($credentials)){
      $request->session()->regenerate();
      if (auth::User()->role === 'Agente') {

       return redirect()->route('dashboard');

            }elseif(Auth::User()->where('role','admin')){

               return redirect()->route('Admin.index');                        //'ainda não existe admin burro';
            }
        }else{
            return redirect()->back()->with('error','usuário desconhecido');
        }
      
        }

            public function cadastrar(){
        return view('auth.Cadastrar');
    }
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
            return redirect()->route('tela-cadastro')->with('sucesso','usuário cadastrado');
            }catch(Throwable $th){
                            
return"erroso";            }
    }


    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
