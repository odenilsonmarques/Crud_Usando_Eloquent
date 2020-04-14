@extends('adminlte::page')

<!--trocando o titulo da home-->
@section('title','agenda')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4">
            <div class="small-box bg-info">
                <div class="inner text-center"> 
                    <h4>Listar Contatos</h4> 
                </div>
                <a href="{{route('agenda.list')}}" class="small-box-footer">
                    <h5>Total {{$home->count()}}</h5>
                    <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        
        <div class="col-lg-4">
            <div class="small-box bg-success">
                <div class="inner text-center"> 
                    <h4>Cadastrar Contatos</h4>    
                </div>
                <a href="{{route('agenda.add')}}" class="small-box-footer">
                    <h5>Formulário</h5>
                    <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection