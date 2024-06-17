@extends('adminlte::page')

@section('title', 'Novo Usuário')

@section('content_header')
<h1 class="m-0 text-dark">Novo Usuário</h1>
@stop

@section('content')

<div class="row">

    <div class="col-md-12">

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Formulario</h3>
            </div>


            <form action="{{route('users.store')}}" method="post" >
                @csrf 
                <div class="card-body">

                <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="text" class="form-control" name='name' id="name" placeholder="Digite um nome">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Digite um email">
                    </div>

                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <input type="password" class="form-control" name="password" id="senha" placeholder="Digite a senha">
                    </div>
                   
                    
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>


    </div>

</div>

@stop