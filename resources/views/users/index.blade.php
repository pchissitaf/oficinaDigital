@extends('layouts.admin')

@section('content')
    <div class="card mt-3 mb-4 border-light shadow">
        <div class="card-header d-flex justify-content-between">
            <span>Pesquisar</span>
        </div>

        <div class="card-body">
            <form action="{{ route('users.index') }}">
                <div class="row">

                    <div class="col-md-3 col-sm-12">
                        <label class="form-label" for="name">Nome</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $name }}"
                            placeholder="name do user" />
                    </div>

                    <div class="col-md-3 col-sm-12 mt-3 pt-4">
                        <button type="submit" class="btn btn-info btn-sm">Pesquisar</button>
                        <a href="{{ route('users.index') }}" class="btn btn-warning btn-sm">Limpar</a>
                    </div>

                </div>

            </form>
        </div>
    </div>

    <div class="card mt-4 mb-4 border-light shadow">
        <div class="card-header d-flex justify-content-between">
            <span>Listar users</span>
            <span>
                <a href="{{ route('users.create') }}" class="btn btn-success btn-sm">Cadastrar</a>
                {{-- <a href="{{ route('user.gerar-pdf') }}" class="btn btn-warning btn-sm">Gerar PDF</a> --}}
                {{-- {{ dd(request()->getQueryString()) }} --}}

                <a href="{{ url('gerar-pdf-user?' . request()->getQueryString()) }}" class="btn btn-warning btn-sm">Gerar
                    PDF</a>

            </span>
        </div>

        {{-- Verificar se existe a sessão success e imprimir o valor --}}
        <x-alert />
        {{ session('success') }}

        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Criado</th>
                        <th scope="col">Editado</th>
                        <th scope="col" class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($user->updated_at)->format('d/m/Y') }}</td>
                                                        
                            <td class="d-md-flex justify-content-center">
                                <a href="{{ route('users.show', ['user' => $user->id]) }}"
                                    class="btn btn-primary btn-sm me-1">Visualizar</a>
                                    @can('acesso', $user)
                                <a href="{{ route('users.edit', ['user' => $user->id]) }}"
                                    class="btn btn-warning btn-sm me-1">Editar</a>
                                    @endcan
                                <form id="formExcluir{{ $user->id }}"
                                    action="{{ route('users.destroy', ['user' => $user->id]) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm me-1"
                                        onclick="return confirm('Tem certesa de que deseja apagar o usuario {{ $user->name }}')">Apagar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <span style="color: #f00;">Nenhum user encontrado!</span>
                    @endforelse
                </tbody>
            </table>

            {{ $users->onEachSide(0)->links() }}
        </div>
    </div>
@endsection
