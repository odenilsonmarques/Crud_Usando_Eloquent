<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//esta rota chama o controller RegisterController e este chama o view registre(formulario de cadastro de usuarios) 
Route::get('/register','Auth\RegisterController@index')->name('register');
//rota que envia(recebe) os dados do formulario após preenchimento e envio dos dados
Route::post('/register','Auth\RegisterController@register');

//esta rota chama o controller LoginController e este chama o view login(formulario de login). Lembrar que não esta passando o nome agenda.login poque esta fora do grupo de rotas 
Route::get('/login','Auth\LoginController@index')->name('login');
//rota que envia(recebe) os  dados do formálario após preenchimento e envio dos dados
Route::post('/login','Auth\LoginController@authenticate');

//esta rota chama o controller LoginController, e chama a view logout
Route::get('/logout','Auth\LoginController@logout')->name('logout');


//esta rota chama a pagina home do sistema, foi implementado um controleer que chama uma unica view, nesses caso essa é uma boa pratica
Route::get('/', 'AdminAgendaController\HomeAgendaController');

//foi adicionado o middleware para controlar o acesso a pagina inicial do sistema, ou seja o usuario só vai para pagina inicial do sistema caso ele tenha autorização, ou seja logado
Route::get('/', 'AdminAgendaController\HomeAgendaController@home')->name('home');

Route::prefix('agenda')->group(function(){

    //rote para lista os contatos
    Route::get('/','AdminAgendaController\AgendaController@list')->name('agenda.list');

    //rota para chamar a pagina com formulario de cadastro dos contatos
    Route::get('add','AdminAgendaController\AgendaController@add')->name('agenda.add');

    // rota para receber os dados enviados pelo form da rota add
    Route::post('add','AdminAgendaController\AgendaController@addAction');

    //rota para chamar a pagina com formulário preenchido para edicão
    Route::get('edit/{id_contatos}','AdminAgendaController\AgendaController@edit')->name('agenda.edit');

    //rota para receber os dados que foram alterados
    Route::post('edit/{id_contatos}','AdminAgendaController\AgendaController@editAction');

    //rota  para passar o id a ser excluido
    Route::get('delete/{id_contatos}','AdminAgendaController\AgendaController@del')->name('agenda.del');

});
//esta rota retorna a pagina not found criada pelo proprio desenvolvedor;
Route::fallback(function(){
    return view('AdminAgendaViews\404');
});
