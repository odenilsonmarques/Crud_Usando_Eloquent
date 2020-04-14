
<!--chamando a pagina home do adminlte-->
@extends('adminlte::page')

<!--trocando o titulo da home-->
@section('title','login')

<!--inserindo informações no cabeçalho do corpo da pagina-->
@section('content_header')
   
@endsection

<!--inserindo conteudo no corpo da pagina-->
@section('content')
    <div class="card card-secondary">
        <div class="card-header">
            <div class="card-title"><strong>Formulário de Login</strong></div>
        </div><br>

        <!--chamando o componente alert nessa view, o conteudo dentro desse component será armazenado na variavel $slot declarada no arquivo alert.blade.php-->
        @if(session('warning'))
            @component('components.alert')
                {{session('warning')}}
            @endcomponent
        @endif

        @if($errors->any())
            <ul>
                <h3>Ocorreu um Erro</h3>
                @foreach($errors->all() as $error)
                <li>
                    {{$error}}<br/>
                </li>
                @endforeach    
            </ul>
        @endif

    <form role="form" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="titulo">E-MAIL</label><br>
                <input type="email" name="email" id="email"  class="form-control" value="{{old('email')}}" placeholder="Informe o e-mail">
            </div>

            <div class="form-group">
                <label for="titulo">SENHA</label><br>
                <input type="password" name="password" id="password" class="form-control" placeholder="Informe a senha"><br>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Logar</button>
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