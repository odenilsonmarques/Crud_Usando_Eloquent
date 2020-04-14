
<!--chamando a pagina home do adminlte-->
@extends('adminlte::page')

<!--trocando o titulo da home-->
@section('title','adiciona usuario')

<!--inserindo informações no cabeçalho do corpo da pagina-->
@section('content_header')
    <!--o modelo de rota abaixo só pode ser usado, devido a nomeação da rota-->
    <a href="{{route('agenda.list')}}" class="btn btn-sm btn-success"><strong>Cancelar Alteração</strong></a>
    @endsection

<!--inserindo conteudo no corpo da pagina-->
@section('content')
    <div class="card card-secondary">
        <div class="card-header">
            <div class="card-title"><strong>Formulário de Alteração de Dados</strong></div>
        </div><br>

        @if($errors->any())
            <ul>
                <h3>Ocorreu um Erro</h3>
                @foreach($errors->all() as $error)
                <li>
                    {{$error}}<br/><br/>
                </li>
                @endforeach    
            </ul>
        @endif

    <form role="form" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="titulo">NOME</label><br>
            <input type="text" name="nome" class="form-control" id="nome" value="{{$data->nome}}" placeholder="Informe o nome">
            </div>

            <div class="form-group">
                <label for="titulo">E-MAIL</label><br>
                <input type="text" name="email" class="form-control" id="email" value="{{$data->email}}" placeholder="Informe o e-mail">
            </div>

            <div class="form-group">
                <label for="titulo">TELEFONE</label><br>
                <input type="text" name="telefone" class="form-control" id="telefone" value="{{$data->telefone}}" placeholder="Informe o telefone"><br>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary"><strong>Salvar Alteração</strong></button>
        </div>
    </form>
</div>
<div class="card-footer clearfix">
    <div class="float-right">
        <!--essa informação foi declarada no arquivo AppServiceProvider-->
        <b>Versão: {{$versao}}</b>
    </div>
</div>
@endsection