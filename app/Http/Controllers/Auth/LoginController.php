<?php

namespace App\Http\Controllers\Auth;

//importando o request
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

//importando o recurso que ajuda no processo de login
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    
    //protected $redirectTo = RouteServiceProvider::HOME;

     //rota (home) chamada quando o usuario logar no sistema. por padrao o laravel criar a rota acima, mas tava dando erro, logo resolvi usar a rota abaixo
     protected $redirectTo = '\home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    //esta função chama o view login(formulario de login de usuario)
    public function index(){
        return view('AdminAgendaViews.login');
        
    }
    //esta função processa a validação dos dados
    public function authenticate(Request $request){
        
        //analisando apenas os dados abaixo(email e senha)
        $credencias = $request->only(['email','password']);
        if(Auth::attempt($credencias)){
            return redirect() ->route('home');
            
        }else{
            return redirect() ->route('login')->with('warning','E-mail / Senha Incorretos');
        }
    }

    public function logout(){
        //1º fazendo um logout
        Auth::logout();
        return redirect()->route('login');
    }
}
