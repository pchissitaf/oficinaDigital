@extends('layouts.admin')

@section('content')
    <div class="card mt-3 mb-4 border-light shadow">
        <div class="card-header d-flex justify-content-between">
            <span>Pesquisar</span>
        </div>

        <div class="card-body">
            <form action="{{ route('ordenServicos.index') }}">
                <div class="row">

                    <div class="col-md-3 col-sm-12">
                        <label class="form-label" for="estado">Estado</label>
                        <input type="text" name="estado" id="estado" class="form-control" value="{{ $estado }}"
                            placeholder="estado da orden de Servico" />
                    </div>

                    <div class="col-md-3 col-sm-12 mt-3 pt-4">
                        <button type="submit" class="btn btn-info btn-sm">Pesquisar</button>
                        <a href="{{ route('ordenServicos.index') }}" class="btn btn-warning btn-sm">Limpar</a>
                    </div>

                </div>

            </form>
        </div>
    </div>

    <div class="card mt-4 mb-4 border-light shadow">
        <div class="card-header d-flex justify-content-between">
            <span>Listar Ordens de Servicos</span>
            <span>
                <a href="{{ route('ordenServicos.create') }}" class="btn btn-success btn-sm">Cadastrar</a>
                <a href="{{ url('gerar-pdf-ordenServico?' . request()->getQueryString()) }}" class="btn btn-warning btn-sm">Gerar
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
                        <th scope="col">Valor Total</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Observacao</th>
                        <th scope="col">Id Orcamento</th>
                        <th scope="col">Funcionario</th>
                        <th scope="col" class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($ordenServicos as $ordenServico)
                        <tr>
                            <td>{{ $ordenServico->id }}</td>
                            <td>{{ 'Akz ' . number_format($ordenServico->valor_total, 2, ',', '.') }}</td>
                            <td>{{ $ordenServico->estado }}</td>
                            <td>{{ $ordenServico->observacao }}</td>
                            <td>{{ $ordenServico->orcamento->id }}</td>
                            <td>{{ $ordenServico->funcionario->nome }}</td>
                                                        
                            <td class="d-md-flex justify-content-center">
                                
                                <a href="{{ route('ordenServicos.show', ['ordenServico' => $ordenServico->id]) }}"
                                    class="btn btn-primary btn-sm me-1">Visualizar</a>
                                @can('alterar_ordenServico', $user)
                                <a href="{{ route('ordenServicos.edit', ['ordenServico' => $ordenServico->id]) }}"
                                    class="btn btn-warning btn-sm me-1">Editar</a>

                                <form id="formExcluir{{ $ordenServico->id }}"
                                    action="{{ route('ordenServicos.destroy', ['ordenServico' => $ordenServico->id]) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm me-1"
                                        onclick="return confirm('Tem certesa de que deseja apagar o ordenServico {{ $ordenServico->nome }}')">Apagar</button>
                                </form>
                                @endcan
                            </td>
                        </tr>
                    @empty
                        <span style="color: #f00;">Nenhum ordenServico encontrado!</span>
                    @endforelse
                </tbody>
            </table>

            {{ $ordenServicos->onEachSide(0)->links() }}
        </div>
    </div>
@endsection
