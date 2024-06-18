@extends('layouts.admin')

@section('content')
    <div class="card mt-3 mb-4 border-light shadow">
        <div class="card-header d-flex justify-content-between">
            <span>Pesquisar</span>
        </div>

        <div class="card-body">
            <form action="{{ route('servicos.index') }}">
                <div class="row">

                    <div class="col-md-3 col-sm-12">
                        <label class="form-label" for="nome">Nome</label>
                        <input type="text" nome="nome" id="nome" class="form-control" value="{{ $nome }}"
                            placeholder="nome do servico" />
                    </div>

                    <div class="col-md-3 col-sm-12 mt-3 pt-4">
                        <button type="submit" class="btn btn-info btn-sm">Pesquisar</button>
                        <a href="{{ route('servicos.index') }}" class="btn btn-warning btn-sm">Limpar</a>
                    </div>

                </div>

            </form>
        </div>
    </div>

    <div class="card mt-4 mb-4 border-light shadow">
        <div class="card-header d-flex justify-content-between">
            <span>Listar servicos</span>
            <span>
                <a href="{{ route('servicos.create') }}" class="btn btn-success btn-sm">Cadastrar</a>
                {{-- <a href="{{ route('servico.gerar-pdf') }}" class="btn btn-warning btn-sm">Gerar PDF</a> --}}
                {{-- {{ dd(request()->getQueryString()) }} --}}

                <a href="{{ url('gerar-pdf-servico?' . request()->getQueryString()) }}" class="btn btn-warning btn-sm">Gerar
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
                        <th scope="col">valor</th>
                        <th scope="col">Criado</th>
                        <th scope="col">Editado</th>
                        <th scope="col" class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($servicos as $servico)
                        <tr>
                            <td>{{ $servico->id }}</td>
                            <td>{{ $servico->nome }}</td>
                            <td>{{ 'Akz ' . number_format($servico->valor, 2, ',', '.') }}</td>
                            <td>{{ \Carbon\Carbon::parse($servico->created_at)->format('d/m/Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($servico->updated_at)->format('d/m/Y') }}</td>
                                                        
                            <td class="d-md-flex justify-content-center">
                                <a href="{{ route('servicos.show', ['servico' => $servico->id]) }}"
                                    class="btn btn-primary btn-sm me-1">Visualizar</a>

                                <a href="{{ route('servicos.edit', ['servico' => $servico->id]) }}"
                                    class="btn btn-warning btn-sm me-1">Editar</a>

                                <form id="formExcluir{{ $servico->id }}"
                                    action="{{ route('servicos.destroy', ['servico' => $servico->id]) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm me-1"
                                        onclick="confirmarExclusao(event, {{ $servico->id }})">Apagar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <span style="color: #f00;">Nenhum servico encontrado!</span>
                    @endforelse
                </tbody>
            </table>

            {{ $servicos->onEachSide(0)->links() }}
        </div>
    </div>
@endsection
