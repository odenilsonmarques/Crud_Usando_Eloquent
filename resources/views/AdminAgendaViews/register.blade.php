
<!--chamando a pagina home do adminlte-->
@extends('adminlte::page')

<!--trocando o titulo da home-->
@section('title','register')

<!--inserindo informações no cabeçalho do corpo da pagina-->
@section('content_header')
   
@endsection

<!--inserindo conteudo no corpo da pagina-->
@section('content')
    <div class="card card-secondary">
        <div class="card-header">
            <div class="card-title"><strong>Formulário de Registro de Usuário</strong></div>
        </div><br>

        @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                <li>
                    {{$error}}<br/><br/>
                </li>
                @endforeach    
            </ul>
        @endif


    <!--
        Para permitir que os campo permaneçam preenchido mesmo após um erro, informar em cada campo o recurso value="{{old('nome do campo')}}"
    -->
    <form role="form" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="titulo">NOME</label><br>
            <input type="text" name="name" value="{{old('name')}}" class="form-control" id="nome" placeholder="Informe o nome">
            </div>

            <div class="form-group">
                <label for="titulo">E-MAIL</label><br>
                <input type="text" name="email" value="{{old('email')}}" class="form-control" id="email" placeholder="Informe o e-mail">
            </div>

            <div class="form-group">
                <label for="titulo">SENHA</label><br>
                <input type="password" name="password" class="form-control" id="password" placeholder="Informe a senha"><br>
            </div>

            <div class="form-group">
                <label for="titulo">CONFIRMAR SENHA</label><br>
                <input type="password" name="password_confirmation" class="form-control" id="password" placeholder="Confirme a senha"><br>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
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