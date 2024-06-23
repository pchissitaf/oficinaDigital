@extends('layouts.admin')

@section('content')
    <div class="card mt-4 mb-4 border-light shadow">
        <div class="card-header d-flex justify-content-between">
            <span>Visualizar orcamento</span>
            <span>
                <a href="{{ route('orcamentos.index') }}" class="btn btn-info btn-sm ">Listar</a>
                <a href="{{ route('orcamentos.edit', ['orcamento' => $orcamento->id]) }}" class="btn btn-warning btn-sm">Editar</a>
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
                <dd class="col-sm-9">{{ $orcamento->id }}</dd>

                <dt class="col-sm-3">Valor</dt>
                <dd class="col-sm-9">{{ 'Akz ' . number_format($orcamento->valor, 2, ',', '.') }}</dd>

                <dt class="col-sm-3">Estado</dt>
                <dd class="col-sm-9">{{ $orcamento->estado }}</dd>
                
                <dt class="col-sm-3">Servico</dt>
                <dd class="col-sm-9">{{ $orcamento->servico->nome}}</dd>

                <dt class="col-sm-3">Cliente</dt>
                <dd class="col-sm-9">{{ $orcamento->cliente->nome}}</dd>

                <dt class="col-sm-3">Cadastrado</dt>
                <dd class="col-sm-9">{{ \Carbon\Carbon::parse($orcamento->created_at)->format('d/m/Y H:i:s') }}</dd>

                <dt class="col-sm-3">Editado</dt>
                <dd class="col-sm-9">{{ \Carbon\Carbon::parse($orcamento->updated_at)->format('d/m/Y H:i:s') }}</dd>

            </dl>
            
        </div>
    </div>
@endsection
