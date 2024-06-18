@extends('layouts.admin')

@section('content')
    <div class="card mt-3 mb-4 border-light shadow">
        <div class="card-header d-flex justify-content-between">
            <span>Pesquisar</span>
        </div>

        <div class="card-body">
            <form action="{{ route('clientes.index') }}">
                <div class="row">

                    <div class="col-md-3 col-sm-12">
                        <label class="form-label" for="nome">nome</label>
                        <input type="text" name="nome" id="nome" class="form-control" value="{{ $nome }}"
                            placeholder="nome do cliente" />
                    </div>

                    <div class="col-md-3 col-sm-12 mt-3 pt-4">
                        <button type="submit" class="btn btn-info btn-sm">Pesquisar</button>
                        <a href="{{ route('clientes.index') }}" class="btn btn-warning btn-sm">Limpar</a>
                    </div>

                </div>

            </form>
        </div>
    </div>

    <div class="card mt-4 mb-4 border-light shadow">
        <div class="card-header d-flex justify-content-between">
            <span>Listar clientes</span>
            <span>
                <a href="{{ route('clientes.create') }}" class="btn btn-success btn-sm">Cadastrar</a>

                <a href="{{ url('gerar-pdf-cliente?' . request()->getQueryString()) }}" class="btn btn-warning btn-sm">Gerar
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
                        <th scope="col">endereco</th>
                        <th scope="col">telefone</th>
                        <th scope="col">ID de Usuario</th>
                        <th scope="col" class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($clientes as $cliente)
                        <tr>
                            <td>{{ $cliente->id }}</td>
                            <td>{{ $cliente->nome }}</td>
                            <td>{{ $cliente->endereco }}</td>
                            <td>{{ $cliente->telefone }}</td>
                            <td>{{ $cliente->user->email }}</td>
                                                        
                            <td class="d-md-flex justify-content-center">
                                <a href="{{ route('clientes.show', ['cliente' => $cliente->id]) }}"
                                    class="btn btn-primary btn-sm me-1">Visualizar</a>

                                <a href="{{ route('clientes.edit', ['cliente' => $cliente->id]) }}"
                                    class="btn btn-warning btn-sm me-1">Editar</a>

                                <form id="formExcluir{{ $cliente->id }}"
                                    action="{{ route('clientes.destroy', ['cliente' => $cliente->id]) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm me-1"
                                        onclick="confirmarExclusao(event, {{ $cliente->id }})">Apagar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <span style="color: #f00;">Nenhum cliente encontrado!</span>
                    @endforelse
                </tbody>
            </table>

            {{ $clientes->onEachSide(0)->links() }}
        </div>
    </div>
@endsection
