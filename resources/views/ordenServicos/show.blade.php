@extends('layouts.admin')

@section('content')
    <div class="card mt-4 mb-4 border-light shadow">
        <div class="card-header d-flex justify-content-between">
            <span>Visualizar ordenServico</span>
            <span>
                <a href="{{ route('ordenServicos.index') }}" class="btn btn-info btn-sm ">Listar</a>
                <a href="{{ route('ordenServicos.edit', ['ordenServico' => $ordenServico->id]) }}" class="btn btn-warning btn-sm">Editar</a>
            </span>
        </div>

        {{-- Verificar se existe a sessão success e imprimir o valor --}}
        {{--<x-alert />--}}
        {{ session('success') }}
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                Swal.fire('Pronto!', "{{ session('success') }}", 'success');
            })
        </script>

        <div class="card-body">

            <dl class="row">

                <dt class="col-sm-3">ID</dt>
                <dd class="col-sm-9">{{ $ordenServico->id }}</dd>

                <dt class="col-sm-3">Valor Total</dt>
                <dd class="col-sm-9">{{ 'Akz ' . number_format($ordenServico->valor_total, 2, ',', '.') }}</dd>

                <dt class="col-sm-3">Estado</dt>
                <dd class="col-sm-9">{{ $ordenServico->estado }}</dd>
                
                <dt class="col-sm-3">Observacao</dt>
                <dd class="col-sm-9">{{ $ordenServico->observacao}}</dd>

                <dt class="col-sm-3">Orcamento</dt>
                <dd class="col-sm-9">{{ $ordenServico->orcamento->id}}</dd>

                <dt class="col-sm-3">Funcionario</dt>
                <dd class="col-sm-9">{{ $ordenServico->funcionario->nome}}</dd>

                <dt class="col-sm-3">Cadastrado</dt>
                <dd class="col-sm-9">{{ \Carbon\Carbon::parse($ordenServico->created_at)->format('d/m/Y H:i:s') }}</dd>

                <dt class="col-sm-3">Editado</dt>
                <dd class="col-sm-9">{{ \Carbon\Carbon::parse($ordenServico->updated_at)->format('d/m/Y H:i:s') }}</dd>

            </dl>
            
        </div>
    </div>
@endsection
