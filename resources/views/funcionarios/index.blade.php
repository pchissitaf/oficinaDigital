@extends('layouts.admin')

@section('content')
    <div class="card mt-3 mb-4 border-light shadow">
        <div class="card-header d-flex justify-content-between">
            <span>Pesquisar</span>
        </div>

        <div class="card-body">
            <form action="{{ route('funcionarios.index') }}">
                <div class="row">

                    <div class="col-md-3 col-sm-12">
                        <label class="form-label" for="nome">nome</label>
                        <input type="text" name="nome" id="nome" class="form-control" value="{{ $nome }}"
                            placeholder="nome do funcionario" />
                    </div>

                    <div class="col-md-3 col-sm-12 mt-3 pt-4">
                        <button type="submit" class="btn btn-info btn-sm">Pesquisar</button>
                        <a href="{{ route('funcionarios.index') }}" class="btn btn-warning btn-sm">Limpar</a>
                    </div>

                </div>

            </form>
        </div>
    </div>

    <div class="card mt-4 mb-4 border-light shadow">
        <div class="card-header d-flex justify-content-between">
            <span>Listar funcionarios</span>
            <span>
                <a href="{{ route('funcionarios.create') }}" class="btn btn-success btn-sm">Cadastrar</a>
                <a href="{{ url('gerar-pdf-funcionario?' . request()->getQueryString()) }}" class="btn btn-warning btn-sm">Gerar
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
                        <th scope="col">Endereco</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Bilhete</th>
                        <th scope="col">Doc. de Identifacação</th>
                        <th scope="col">Cargo</th>
                        <th scope="col">Salario</th>
                        <th scope="col">ID de Usuario</th>
                        <th scope="col" class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($funcionarios as $funcionario)
                        <tr>
                            <td>{{ $funcionario->id }}</td>
                            <td>{{ $funcionario->nome }}</td>
                            <td>{{ $funcionario->endereco }}</td>
                            <td>{{ $funcionario->telefone }}</td>
                            <td>{{ $funcionario->bilhete }}</td>
                            <td>{{ $funcionario->doc_file }}</td>
                            <td>{{ $funcionario->nivel->nome }}</td>
                            <td>{{ 'Akz ' . number_format($funcionario->salario, 2, ',', '.') }}</td>
                            <td>{{ $funcionario->user->email }}</td>
                                                        
                            <td class="d-md-flex justify-content-center">
                                
                                <a href="{{ route('funcionarios.show', ['funcionario' => $funcionario->id]) }}"
                                    class="btn btn-primary btn-sm me-1">Visualizar</a>
                                @can('alterar_funcionario', $user)
                                <a href="{{ route('funcionarios.edit', ['funcionario' => $funcionario->id]) }}"
                                    class="btn btn-warning btn-sm me-1">Editar</a>

                                <form id="formExcluir{{ $funcionario->id }}"
                                    action="{{ route('funcionarios.destroy', ['funcionario' => $funcionario->id]) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm me-1"
                                        onclick="return confirm('Tem certesa de que deseja apagar o funcionario {{ $funcionario->nome }}')">Apagar</button>
                                </form>
                                @endcan
                            </td>
                        </tr>
                    @empty
                        <span style="color: #f00;">Nenhum funcionario encontrado!</span>
                    @endforelse
                </tbody>
            </table>

            {{ $funcionarios->onEachSide(0)->links() }}
        </div>
    </div>
@endsection
