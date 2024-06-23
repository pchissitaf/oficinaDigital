@extends('layouts.admin')

@section('content')
    <div class="card mt-4 mb-4 border-light shadow">
        <div class="card-header d-flex justify-content-between">
            <span>Editar ordenServico</span>
            <span>
                <a href="{{ route('ordenServicos.index') }}" class="btn btn-info btn-sm ">Listar</a>
                <a href="{{ route('ordenServicos.show', ['ordenServico' => $ordenServico->id]) }}" class="btn btn-primary btn-sm">Visualizar</a>
            </span>
        </div>

        {{-- Verificar se existe a sessão success e imprimir o valor --}}
        <x-alert />
        @if ($errors->any())
            <span style="color: #ff0000;">
                @foreach ($errors->all() as $error)
                    {{ $error }} <br>
                @endforeach
            </span>
        @endif

        <div class="card-body">

            <form action="{{ route('ordenServicos.update', ['ordenServico' => $ordenServico->id]) }}" method="POST" class="row g-3">
                @csrf
                @method('PUT')

                <div class="col-md-12 col-sm-12">
                    <label for="valor_total-" class="form-label">Valor Total</label>
                    <input type="text" name="valor_total" class="form-control" id="valor_total" placeholder="valor_total do ordenServico"
                        value="{{ old('valor_total', isset($ordenServico->valor_total) ? number_format($ordenServico->valor_total, '2', ',', '.') : '') }}">
                </div>

                <div class="col-md-12 col-sm-12">
                    <label for="estado" class="form-label">estado</label>
                    <input type="text" name="estado" class="form-control" id="estado" placeholder="estado do ordenServico"
                        value="{{ old('estado', $ordenServico->estado) }}">
                </div>

                <div class="col-md-12 col-sm-12">
                    <label for="observacao" class="form-label">observacao</label>
                    <input type="text" name="observacao" class="form-control" id="observacao" placeholder="observacao do ordenServico"
                        value="{{ old('observacao', $ordenServico->observacao) }}">
                </div>

                <div class="col-md-12 col-sm-12">
                    <label for="orcamento_id" class="form-label">Id do orcamento</label>
                    <select name="orcamento_id" id="orcamento_id" class="form-select">
                        <option value="">Selecione</option>
                        @forelse ($orcamentos as $orcamento)
                            <option value="{{ $orcamento->id }}"
                                {{ old('orcamento_id', $ordenServico->orcamento_id) == $orcamento->id ? 'selected' : '' }}>
                                {{ $orcamento->id }}</option>
                        @empty
                            <option value="">Nenhum orcamento encontrado</option>
                        @endforelse
                    </select>
                </div>

                <div class="col-md-12 col-sm-12">
                    <label for="funcionario_id" class="form-label">funcionario</label>
                    <select name="funcionario_id" id="funcionario_id" class="form-select">
                        <option value="">Selecione</option>
                        @forelse ($funcionarios as $funcionario)
                            <option value="{{ $funcionario->id }}"
                                {{ old('funcionario_id', $ordenServico->funcionario_id) == $funcionario->id ? 'selected' : '' }}>
                                {{ $funcionario->nome }}</option>
                        @empty
                            <option value="">Nenhum funcionario encontrado</option>
                        @endforelse
                    </select>
                </div>
                  
                <div class="col-12">
                    <button type="submit" class="btn btn-warning btn-sm">Salvar</button>
                </div>

            </form>

        </div>
    </div>
@endsection
