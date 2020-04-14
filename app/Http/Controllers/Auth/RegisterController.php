<?php

namespace App\Http\Controllers\Auth;

//importando o request
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

//importando o Auth
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;

    //rota (home) chamada quando o usuario logar no sistema. por padrao o laravel criar a rota acima, mas tava dando erro, logo resolvi usar a rota abaixo
    protected $redirectTo = '\login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    //esta função chama o view register(formulario de cadastro de usuario)
    public function index(){
        return view('AdminAgendaViews.register');
    }
    //esta função processa a validação dos dados 
    public function register(Request $request){
        //pegando os dados
        $data = $request->only(['name','email','password','password_confirmation']);
        //validando os dados. O validator (classe) abaixo possue as regras a serem utilizadas nos campos, que devem está como foram declarados do tabela users
        $validator = $this->validator($data);
        //verificando se os dados falharam
        if($validator->fails()){
            return redirect()->route('register')
            ->withErrors($validator)//mostra os erros
            ->withInput();//serve para manter os dados corretos no form, quando houver algum campo errado  
        }else{
            //cria o usuario
            $user = $this->create($data);
            //para redirecionar o usuario logo apos ele se cadastrar usar o comando abaixo
            //Auth::login($user);
            return redirect() ->route('login');
        }
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        //validade confirmado de acordo com os dados na tabela users criada no banco db_agenda
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:200', 'unique:users'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
