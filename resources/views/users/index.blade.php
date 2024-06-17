@extends('adminlte::page')

@section('title', 'Lista de Usuários')

@section('content_header')
<h1 class="m-0 text-dark">Lista de Usuários</h1>
@stop

@section('content')


<div class="row">
    <div class="col-12">
        
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Lista</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NOME</th>
                            <th>EMAIL</th>
                            <th>FUNÇÕES</th>
                            <th>CRIADO</th>
                            <th>ATUALIZADO</th>
                            <th>
                                <a href="{{route('users.create')}}" class="btn btn-success">NOVO USUÁRIO</a>

                            </th>
                            <th>
                                <a href="{{route('users.show')}}" class="btn btn-success">NOVO USUÁRIO</a>

                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($users as $user)
                    <tr>
                            <td>{{ $user->id}}</td>
                            <td>{{ $user->name}}</td>
                            <td>{{ $user->email}}</td>
                            <td>
                                <ol>
                                @forelse($user->roles as $role)
                                <li>{{$role->name}}</li>
                                @empty

                                <li>Sem</br> Função</li>
                                @endforelse

                                </ol>

                        </td>
                            <td>{{ $user->created_at}}</td>
                            <td>{{ $user->updated_at}}</td>
                            <td>
                                <a href="{{route('users.edit',[$user->id])}}" class="btn btn-success">Editar</a>
                                <a href="http://" class="btn btn-warning">Excluir</a>
                            
                            </td>
                     </tr>

                    @empty
                    <tr>
                        <td colspan="5"> Ainda não há Usuários cadastrados.</td>
                    </tr>


                    @endforelse


                        
                       
                    </tbody>
                </table>


                {{$users->onEachSide(0)->links()}}
            </div>

        </div>
        
    </div>
</div>


@stop