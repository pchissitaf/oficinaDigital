@extends('layouts.admin')

@section('content')
    <div class="card mt-4 mb-4 border-light shadow">
        <div class="card-header d-flex justify-content-between">
            <span>Visualizar Servico</span>
            <span>
                <a href="{{ route('servicos.index') }}" class="btn btn-info btn-sm ">Listar</a>
                <a href="{{ route('servicos.edit', ['servico' => $servico->id]) }}" class="btn btn-warning btn-sm">Editar</a>
            </span>
        </div>

        {{-- Verificar se existe a sessão success e imprimir o valor --}}
        <x-alert />
        @if (session('success'))
            <div style="#ff000" class="alert alert-success m-3" role=""alert>
                {{session('success')}}
            </div>
        @endif

        <div class="card-body">

            <dl class="row">

                <dt class="col-sm-3">ID</dt>
                <dd class="col-sm-9">{{ $servico->id }}</dd>

                <dt class="col-sm-3">Nome</dt>
                <dd class="col-sm-9">{{ $servico->nome }}</dd>

                <dt class="col-sm-3">Valor</dt>
                <dd class="col-sm-9">{{ 'Akz ' . number_format($servico->valor, 2, ',', '.') }}</dd>

                <dt class="col-sm-3">Cadastrado</dt>
                <dd class="col-sm-9">{{ \Carbon\Carbon::parse($servico->created_at)->format('d/m/Y H:i:s') }}</dd>

                <dt class="col-sm-3">Editado</dt>
                <dd class="col-sm-9">{{ \Carbon\Carbon::parse($servico->updated_at)->format('d/m/Y H:i:s') }}</dd>

            </dl>
            
        </div>
    </div>
@endsection
