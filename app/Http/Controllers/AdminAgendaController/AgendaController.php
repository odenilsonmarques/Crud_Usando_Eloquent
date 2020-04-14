<?php
//foi implemenado nesta rota a pasta AdminAgendaController, pois o controller AgendaController está dentro da pasta AdminAgendaController que está dentro da pasta controller
namespace App\Http\Controllers\AdminAgendaController;
//importando a classe controller
use App\Http\Controllers\Controller;
//importanto o model a ser usado nesse controller
use App\Contato;
use Illuminate\Http\Request;

class AgendaController extends Controller
{

    //esse contrutor, tem como proposito redirecionar o usuario para pagina de login, se este não estiver logado e tentar acessar alguma aera do sistema
    public function __construct(){
        $this->middleware('auth');
    }

    public function list(){
        //$list = Contato::all();
        $list = Contato::paginate(5);//usando o paginate, por causa da paginação, mas a linha acima serve para exibir todos os registros
        return view('AdminAgendaViews.list',['list'=>$list]);
    }
    public function add(){
        return view('AdminAgendaViews.add');
    }
    public function addAction(Request $request){
        $request->validate([
            'nome'=>['required','string','min:4'],
            'email'=>['required','string'],
            'telefone'=>['required','string']
        ]);
        $nome = $request->input('nome');
        $email = $request->input('email');
        $telefone = $request->input('telefone');

        $cont = new Contato();
        $cont->nome = $nome;
        $cont->email = $email;
        $cont->telefone = $telefone;
        $cont->save();
        return redirect()->route('agenda.list');
    }
    public function edit($id_contatos){
        //fazendo uma consulta a um intem especifico
        $data = Contato::find($id_contatos);
        //verificando se o item foi encontrado
        if($data){
            return view('AdminAgendaViews.edit',['data'=>$data]);
        }else{
           return redirect()->route('agenda.list'); 
        }
    }
    public function editAction(Request $request, $id_contatos){
        $request->validate([
            'nome'=>['required','string'],
            'email'=>['required','string'],
            'telefone'=>['required','string']
        ]);
        $nome = $request->input('nome');
        $email = $request->input('email');
        $telefone = $request->input('telefone');
        //para usar o comando abaixo é necessario permitir no arquivo model Contato, atraves do comando $fillable, pois é como eestivesse se passando um grande massa de dados. Porem pode ser feito de outra forma
        Contato::find($id_contatos)
        ->update(['nome' => $nome,'email' => $email,'telefone' => $telefone
        ]);
        return redirect()->route('agenda.list'); 
    }
    public function del($id_contatos){
        Contato::find($id_contatos)->delete();
        return redirect()->route('agenda.list'); 

    }

}
