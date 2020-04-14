
<!--chamando a pagina home do adminlte-->
@extends('adminlte::page')

<!--trocando o titulo da home-->
@section('title','contatos')

<!--inserindo informações no cabeçalho do corpo da pagina-->
@section('content_header')
    <!--o modelo de rota abaixo só pode ser usado, devido a nomeação da rota-->
    <a href="{{route('agenda.add')}}" class="btn btn-sm btn-success"><strong>Adicionar Novo Contato</strong></a>
@endsection

<!--inserindo conteudo no corpo da pagina-->
@section('content')
<div class="card">
        <table class="table table-hover">
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>E-MAIL</th>
                <th>TELEFONE</th>
            </tr>
            @foreach($list as $item)
                <tr>
                    <td>{{$item->id_contatos}}</td>
                    <td>{{$item->nome}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->telefone}}</td>
                    <td>
                    <a href="{{route('agenda.edit',['id_contatos'=>$item->id_contatos])}}" class="btn btn-sm btn-info">Editar</a>
                    <a href="{{route('agenda.del',['id_contatos'=>$item->id_contatos])}}" class="btn btn-sm btn-danger" onclick="return confirm('CONFIRMAR ExCLUSÃO ?')">Excluir</a>
                    </td>
                </tr>
            @endforeach
        </table>
         <!--comando para exibir a paginação iniciada com pagina no AgendaController-->
        {{$list->links()}}   
</div>
@endsection

