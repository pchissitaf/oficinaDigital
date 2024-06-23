@extends('layouts.admin')

@section('content')
    <div class="card mt-3 mb-4 border-light shadow">
        <div class="card-header d-flex justify-content-between">
            <span>Pesquisar</span>
        </div>

        <div class="card-body">
            <form action="{{ route('orcamentos.index') }}">
                <div class="row">

                    <div class="col-md-3 col-sm-12">
                        <label class="form-label" for="estado">Estado</label>
                        <input type="text" name="estado" estado="estado" class="form-control" value="{{ $estado }}"
                            placeholder="estado do orcamento" />
                    </div>

                    <div class="col-md-3 col-sm-12 mt-3 pt-4">
                        <button type="submit" class="btn btn-info btn-sm">Pesquisar</button>
                        <a href="{{ route('orcamentos.index') }}" class="btn btn-warning btn-sm">Limpar</a>
                    </div>

                </div>

            </form>
        </div>
    </div>

    <div class="card mt-4 mb-4 border-light shadow">
        <div class="card-header d-flex justify-content-between">
            <span>Listar orcamentos</span>
            <span>
                <a href="{{ route('orcamentos.create') }}" class="btn btn-success btn-sm">Cadastrar</a>
                <a href="{{ url('gerar-pdf-orcamento?' . request()->getQueryString()) }}" class="btn btn-warning btn-sm">Gerar
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
                        <th scope="col">Valor</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Servico</th>
                        <th scope="col">Cliente</th>
                        <th scope="col" class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orcamentos as $orcamento)
                        <tr>
                            <td>{{ $orcamento->id }}</td>
                            <td>{{ 'Akz ' . number_format($orcamento->valor, 2, ',', '.') }}</td>
                            <td>{{ $orcamento->estado }}</td>
                            <td>{{ $orcamento->servico->nome }}</td>
                            <td>{{ $orcamento->cliente->nome }}</td>
                                                        
                            <td class="d-md-flex justify-content-center">
                                
                                <a href="{{ route('orcamentos.show', ['orcamento' => $orcamento->id]) }}"
                                    class="btn btn-primary btn-sm me-1">Visualizar</a>
                                @can('alterar_orcamento', $user)
                                <a href="{{ route('orcamentos.edit', ['orcamento' => $orcamento->id]) }}"
                                    class="btn btn-warning btn-sm me-1">Editar</a>

                                <form id="formExcluir{{ $orcamento->id }}"
                                    action="{{ route('orcamentos.destroy', ['orcamento' => $orcamento->id]) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm me-1"
                                        onclick="return confirm('Tem certesa de que deseja apagar o orcamento {{ $orcamento->nome }}')">Apagar</button>
                                </form>
                                @endcan
                            </td>
                        </tr>
                    @empty
                        <span style="color: #f00;">Nenhum orcamento encontrado!</span>
                    @endforelse
                </tbody>
            </table>

            {{ $orcamentos->onEachSide(0)->links() }}
        </div>
    </div>
@endsection
