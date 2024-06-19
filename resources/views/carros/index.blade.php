@extends('layouts.admin')

@section('content')
    <div class="card mt-3 mb-4 border-light shadow">
        <div class="card-header d-flex justify-content-between">
            <span>Pesquisar</span>
        </div>

        <div class="card-body">
            <form action="{{ route('carro.index') }}">
                <div class="row">

                    <div class="col-md-3 col-sm-12">
                        <label class="form-label" for="modelo">Modelo</label>
                        <input type="text" name="modelo" id="modelo" class="form-control" value="{{ $modelo }}"
                            placeholder="modelo do carro" />
                    </div>

                    <div class="col-md-3 col-sm-12">
                        <label class="form-label" for="data_inicio">Data Início</label>
                        <input type="date" name="data_inicio" id="data_inicio" class="form-control"
                            value="{{ $data_inicio }}" />
                    </div>

                    <div class="col-md-3 col-sm-12">
                        <label class="form-label" for="data_fim">Data Fim</label>
                        <input type="date" name="data_fim" id="data_fim" class="form-control"
                            value="{{ $data_fim }}" />
                    </div>

                    <div class="col-md-3 col-sm-12 mt-3 pt-4">
                        <button type="submit" class="btn btn-info btn-sm">Pesquisar</button>
                        <a href="{{ route('carro.index') }}" class="btn btn-warning btn-sm">Limpar</a>
                    </div>

                </div>

            </form>
        </div>
    </div>

    <div class="card mt-4 mb-4 border-light shadow">
        <div class="card-header d-flex justify-content-between">
            <span>Listar Carros</span>
            <span>
                <a href="{{ route('carro.create') }}" class="btn btn-success btn-sm">Cadastrar</a>
                {{-- <a href="{{ route('carro.gerar-pdf') }}" class="btn btn-warning btn-sm">Gerar PDF</a> --}}
                {{-- {{ dd(request()->getQueryString()) }} --}}

                <a href="{{ url('gerar-pdf-carro?' . request()->getQueryString()) }}" class="btn btn-warning btn-sm">Gerar
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
                        <th scope="col">Modelo</th>
                        <th scope="col">Cor</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Estado</th>
                        <th scope="col">T de Avaria</th>
                        <th scope="col">Proprietario</th>
                        <th scope="col">Validacao</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Ano</th>
                        <th scope="col" class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($carros as $carro)
                        <tr>
                            <td>{{ $carro->id }}</td>
                            <td>{{ $carro->modelo }}</td>
                            <td>{{ $carro->cor }}</td>
                            <td>{{ $carro->marca }}</td>
                            <td>{{ $carro->tipo }}</td>
                            <td>
                                <a href="{{ route('carro.change-estado', [ 'carro' => $carro->id])}}">
                                    {!! '<span class="badge text-bg-' . $carro->estadoCarro->cor . '">' . $carro->estadoCarro->nome . '</span>' !!}
                                </a>
                            </td>
                            <td>{{ $carro->tipo_de_avaria }}</td>
                            <td>{{ $carro->cliente->nome }}</td>
                            <td>{{ $carro->codigo_validacao }}</td>
                            <td>{{ 'Akz ' . number_format($carro->valor, 2, ',', '.') }}</td>
                            <td>{{ \Carbon\Carbon::parse($carro->ano)->format('d/m/Y') }}
                            </td>

                            

                            <td class="d-md-flex justify-content-center">
                                <a href="{{ route('carro.show', ['carro' => $carro->id]) }}"
                                    class="btn btn-primary btn-sm me-1">Visualizar</a>

                                <a href="{{ route('carro.edit', ['carro' => $carro->id]) }}"
                                    class="btn btn-warning btn-sm me-1">Editar</a>

                                <form id="formExcluir{{ $carro->id }}"
                                    action="{{ route('carro.destroy', ['carro' => $carro->id]) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm me-1"
                                        onclick="return confirm('Tem certesa de que deseja apagar o carro {{ $carro->modelo }}')">Apagar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <span style="color: #f00;">Nenhum carro encontrado!</span>
                    @endforelse
                </tbody>
            </table>

            {{ $carros->onEachSide(0)->links() }}
        </div>
    </div>
@endsection
