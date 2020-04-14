<?php
//foi implemenado nesta rota a pasta AdminAgendaController, pois o controller HomeAgendaController está dentro da pasta AdminAgendaController que está dentro da pasta controller
namespace App\Http\Controllers\AdminAgendaController;
//importando a classe controller
use App\Http\Controllers\Controller;

//importanto o model a ser usado nesse controller
use App\Contato;

use Illuminate\Http\Request;

class HomeAgendaController extends Controller
{
    //esse contrutor, tem como proposito redirecionar o usuario para pagina de login, se este não estiver logado e tentar acessar alguma aera do sistema
    public function __construct(){
        $this->middleware('auth');
    }

    public function __invoke(){
        return view('AdminAgendaViews.home');
    }

    public function home(){
        $home = Contato::all();
        return view('AdminAgendaViews.home',['home'=>$home]);
    }
}
